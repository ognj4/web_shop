<!doctype html>
<html>
<head>
    <title>@yield('naslovStranice')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     @include('navigation')
        @yield('sadrzajStranice')
     @include('footer')
</body>
</html>
