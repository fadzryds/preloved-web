<nav class="navbar">
    <div class="container navbar-container">

        <!-- LOGO -->
        <a href="{{ route('home') }}" class="logo-link">
            <img
                src="{{ asset('images/Logo.png') }}"
                alt="Logo"
                class="logo">
        </a>

        <!-- MENU -->
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

        <!-- RIGHT SIDE -->
        <div class="nav-right">

            <!-- SEARCH -->
            <form action="{{ route('shop') }}" method="GET">
                <input
                    type="text"
                    name="search"
                    placeholder="Search products..."
                    class="search-box">
            </form>

            <!-- CART -->
            <a href="{{ route('cart') }}" class="icon-btn">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            @guest

                <a href="{{ route('login') }}" class="auth-btn">
                    Login
                </a>

                <a href="{{ route('register') }}" class="auth-btn register-btn">
                    Register
                </a>

            @endguest

            @auth

            <div class="user-dropdown">
            
                <button class="user-btn">
                
                    <i class="fa-regular fa-circle-user"></i>
                
                    <span>
                        {{ auth()->user()->name }}
                    </span>
                
                    <i class="fa-solid fa-chevron-down"></i>
                
                </button>
            
                <div class="dropdown-menu">
                
                    <a href="{{ route('profile') }}">
                        My Profile
                    </a>
                
                    <a href="{{ route('orders.index') }}">
                        My Orders
                    </a>
                
                    <form
                        method="POST"
                        action="{{ route('logout') }}">
                
                        @csrf
                
                        <button type="submit">
                            Logout
                        </button>
                    
                    </form>
                
                </div>
            
            </div>
            
            @endauth

        </div>

    </div>
</nav>