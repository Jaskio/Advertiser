<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.head')
    
    <body>
        <header class="header">
            @include('partials.nav')
        </header>

        <div class="mainContainer">
            @if(Request::is('home'))
                <aside class="sidebar">
                    @include('partials.sidebar')
                </aside>
            @endif

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
