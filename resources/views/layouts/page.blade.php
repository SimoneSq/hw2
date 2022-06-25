<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        @yield('script')
    </head>
    <body>

        <header>
            <nav>
                <div id="logo">TysonLover</div>
                <div id="links">
                    @yield('menu')
                </div>

                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
            <div id='view' class='hidden'>
                    @yield('menu_t')
                </div>
        </header>

        <section>
            @yield('contenuto')
        </section>
        
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>