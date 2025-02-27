<!doctype html>
<html>
<head>
    <title>@yield('naslovStranice')</title>
</head>
<body>
     @include('navigation')
        @yield('sadrzajStranice')
     @include('footer')
</body>
</html>
