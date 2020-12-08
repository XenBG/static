<!DOCTYPE html>
<html>
    <head>
        <title>{{ $pageData['title'] }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" value="{{ $pageData['description'] }}">

        @assets('fonts-as-link')

        <style>@assets('fonts-as-style')

            body {
                font-size: 20px;
                color: #000000;
                font-family: 'Roboto', sans-serif;
                font-weight: 400;
                font-style: normal;
                font-feature-settings: "locl" off;
                line-height: 1;
            }
        </style>

        <link rel="stylesheet" type="text/css" href="@page('public/css/{{ $pageData['name'] }}.css')">
    </head>
    <body>
        @include('_partials.general.header')

        <main class="page-{{ $pageData['name'] }}">
            @yield('content')
        </main>

        @include('_partials.general.footer')
    </body>
</html>
