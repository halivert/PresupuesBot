<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Presupues-Bot') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=actor:400" rel="stylesheet" />

        @vite(['resources/css/app.scss', 'resources/ts/app.ts'])
    </head>
    <body>
        <div id="app">
            <x-navbar></x-navbar>

            {{ $slot }}
        </div>
    </body>
</html>
