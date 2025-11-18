<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Style Components --}}
    @include('backend.partials.style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar Content --}}
            @include('backend.partials.nav')
            {{-- Sidebar Content --}}
            @include('backend.partials.side')

            <!-- Main Content -->
            @yield('content')
            
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    {{-- Scripts --}}
    @include('backend.partials.scripts')
</body>

</html>