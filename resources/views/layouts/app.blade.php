<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials._head')
    
    <body>

        @include('partials._nav')

        @yield('content')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @include('partials._javascript')

    </body>
</html>
