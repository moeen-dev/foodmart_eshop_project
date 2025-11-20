<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.partials.header')
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    @include('auth.partials.footer')
</body>

</html>