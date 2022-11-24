<?php

namespace App\Providers;

use Illuminate\Database\Query\Grammars\MySqlGrammar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setQueryGrammar();

        $namespaces = [
            'cards',
        ];

        foreach ($namespaces as $namespace) {
            Blade::anonymousComponentNamespace(
                "$namespace.components",
                str($namespace)->camel()->kebab()
            );
        }
    }

    public function setQueryGrammar()
    {
        DB::connection()->setQueryGrammar(new class() extends MySqlGrammar
        {
            public function getDateFormat()
            {
                if (config('database.default') === 'sqlite')
                    return 'Y-m-d H:i:s';
                return 'Y-m-d H:i:s.u';
            }
        });
    }
}
