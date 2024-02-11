
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('shops.index') }}">Ciesto Solution</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <li class="nav-item rounded {{ $module_name == 'shop' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('shops.index') }}">Shops</a>
            </li>
            <li class="nav-item rounded {{ $module_name == 'product' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

