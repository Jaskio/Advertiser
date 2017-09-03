<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.head')
    
    <body>
        <nav class="navbar">
            @include('partials.nav')
        </nav>

        <div class="mainContainer">
            <aside class="sidebar">
                @include('partials.sidebar')
            </aside>

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="footer">
            @include('partials.footer')
        </footer>

        <!-- Scripts -->
        @include('partials.javascript')

    </body>
</html>
