<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.head')
    
    <body>

        @yield('content')

        <!-- Scripts -->
        @include('partials.javascript')

    </body>
</html>
