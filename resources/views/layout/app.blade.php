<html>
    <head>
        <title>@yield('title','部落格')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layout.style')
    </head>
    <body>
        @include('layout.header')

        <div>
            @yield('content')
        </div>

        @include('layout.footer')
        
        @include('layout.script')
    </body>
</html>