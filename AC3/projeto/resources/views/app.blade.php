<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--importa script para a app-->
        @vite(['resources/js/app.js'])
        <!--serve para chamar o titulo usando inertia-->
        @inertiaHead
    </head>
    <body>
        <!--serve para chamar o conteudo usando inertia-->
        @inertia
    </body>
</html>
