<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.style')
    @stack('styles')
</head>

<body>

    {{-- SVG file --}}
    @include('frontend.partials.svg')


    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>

    {{-- Header/Navigation and Tob Navbar --}}
    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.scripts')
    @stack('scripts')
</body>

</html>