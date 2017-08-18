<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.head')
    
    <body>

        @yield('content')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @include('partials.javascript')

    </body>
</html>
