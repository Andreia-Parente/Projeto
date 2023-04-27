<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--importa script-->
        @vite(['resources/js/app.js'])
        <!--serve para chamar o titulo usando inertia-->
        @inertiaHead
        <!--serve para chamar os routes-->
        @routes
    </head>
    <body>
        <!--serve para chamar o conteudo do inertia-->
        @inertia
    </body>
</html>
