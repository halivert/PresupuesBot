<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Form extends Component
{
    public bool $insideForm = true;
    public string $async;
    public string $files;

    public function __construct(
        public string $method = '',
        public string $action = '',
        public bool $isAsync = false,
        public ?Model $model = null,
        public bool $hasFiles = false,
    ) {
        if ($model) {
            $routePrefix = str($model->getTable())->camel()->kebab();
            if ($model->exists) {
                if ($method === 'DELETE') {
                    $this->method = "DELETE";
                    $this->action = $action ?: route("$routePrefix.destroy", $model);
                } else {
                    $this->method = $method ?: 'PATCH';
                    $this->action = $action ?: route("$routePrefix.update", $model);
                }
            } else {
                $this->method = $method ?: 'POST';
                $this->action = $action ?: route("$routePrefix.store");
            }
        }

        $this->method = str($this->method ?: 'GET')->upper();
        $this->async = $isAsync ? 'true' : 'false';
        $this->files = $hasFiles ? 'true' : 'false';
    }

    public function requireCsrf(): bool
    {
        return in_array($this->method, ['POST', 'PUT', 'PATCH', 'DELETE']);
    }

    public function render(): string
    {
        return 'components.form';
    }
}
