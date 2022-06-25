<!doctype html>
<html>
    <head>
        <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        @yield('script')
    </head>
    
    <body>

        <header>
                <div id="logo">TysonLover</div>
        </header>

        <section>
            @yield('contenuto')
        </section>

        <footer>
        <div id="logo-footer">TysonLover account</div>
        <div id="footer-info">O46001862 Squillaci Simone</div>
        </footer>
    </body>
</html>