<nav class="navbar">
    <div class="container navbar-container">

        <a> 
        <img src="{{ asset('images/Logo.png') }}"
        class="logo">
        </a>

        <ul class="nav-menu">

            <li>
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
            </li>
        
            <li>
                <a href="{{ route('shop') }}"
                   class="{{ request()->routeIs('shop') ? 'active' : '' }}">
                    Shop
                </a>
            </li>
        
            <li>
                <a href="{{ route('categories') }}"
                   class="{{ request()->routeIs('categories') ? 'active' : '' }}">
                    Categories
                </a>
            </li>
        
            <li>
                <a href="{{ route('new-arrivals') }}"
                   class="{{ request()->routeIs('new-arrivals') ? 'active' : '' }}">
                    New Arrivals
                </a>
            </li>
        
            <li>
                <a href="{{ route('top-selling') }}"
                   class="{{ request()->routeIs('top-selling') ? 'active' : '' }}">
                    Top Selling
                </a>
            </li>
        
        </ul>

        <div class="nav-right">

            <input
                type="text"
                placeholder="Search products..."
                class="search-box">
        
            <!-- CART -->
            <a href="{{ route('cart') }}" class="icon-btn">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        
            <!-- USER -->
            <a href="profile" class="icon-btn">
                <i class="fa-regular fa-circle-user"></i>
            </a>
        
        </div>

    </div>
</nav>