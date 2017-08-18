<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.head')
    
    <body>

        @include('partials.nav')

        @yield('content')

        <!-- Scripts -->
        @include('partials.javascript')

    </body>
</html>
