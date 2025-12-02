<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ Route::is('admin.dashboard') ? 'active' : ''}}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown {{ request()->routeIs('product-category.*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('product-category.index') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('product-category.index') }}">All Category</a></li>
                    <li class="{{ Route::is('product-category.create') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('product-category.create') }}">Create Category</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('product.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('product.index') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('product.index') }}">All Products</a></li>
                    <li class="{{ Route::is('product.create') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('product.create') }}">Create Product</a></li>
                </ul>
            </li>

            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>