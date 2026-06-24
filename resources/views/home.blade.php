@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero">

    <div class="container">

        <div class="hero-content">

            <!-- LEFT -->
            <div class="hero-left">

                <h1>
                    FIND CLOTHES <br>
                    THAT MATCH <br>
                    YOUR STYLE
                </h1>

                <p>
                    Explore unique and curated preloved fashion designed
                    to bring style and sustainability to your wardrobe.
                </p>

                <button class="shop-btn">
                    Shop Now
                </button>

                <div class="stats">

                    <div>
                        <h3>200+</h3>
                        <p>International Brands</p>
                    </div>

                    <div>
                        <h3>2,000+</h3>
                        <p>High Quality Products</p>
                    </div>

                    <div>
                        <h3>30,000+</h3>
                        <p>Happy Customers</p>
                    </div>

                </div>

            </div>

            </div>

        </div>

    </div>

</section>

<!-- CATEGORY -->
<section class="category-section">
    <div class="container">

        <h2 class="category-title">
            Shop by Aesthetic
        </h2>

        <p class="category-subtitle">
            Curated vibes for every mood
        </p>

        <div class="category-grid">

            @forelse($categories as $category)

                <div class="category-item">

                    <img
                        src="{{ Storage::url($category->image) }}"
                        alt="{{ $category->name }}"
                        onerror="this.src='{{ asset('images/no-image.png') }}'">

                    <span>{{ $category->name }}</span>

                </div>

            @empty

                <p>Tidak ada kategori.</p>

            @endforelse

        </div>

    </div>
</section>

<!-- PRODUCTS -->
<section class="products">

    <div class="container">

        <h2 class="section-title">
            NEW ARRIVALS
        </h2>

        <div class="product-grid">

            @forelse($newArrivals as $product)

                <a href="{{ route('product.show', $product->id) }}"
                    class="product-link">

                    <div class="product-card">

                        <div class="product-image">

                            <img
                                src="{{ Storage::url($product->image) }}"
                                alt="{{ $product->name }}"
                                onerror="this.src='{{ asset('images/no-image.png') }}'">

                        </div>

                        <div class="product-info">

                            <h3>{{ $product->name }}</h3>

                            <div class="rating">
                                ★★★★★
                            </div>

                            <div class="price">

                                <span class="current-price">
                                    Rp{{ number_format($product->price,0,',','.') }}
                                </span>

                                @if($product->discount_price)

                                    <span class="old-price">
                                        Rp{{ number_format($product->discount_price,0,',','.') }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </a>

            @empty

                <p>Tidak ada produk.</p>

            @endforelse

        </div>

    </div>

</section>

<section class="products">

    <div class="container">

        <h2 class="section-title">
            TOP SELLING
        </h2>

        <div class="product-grid">

            @forelse($topSelling as $product)

                <a href="{{ route('product.show', $product->id) }}"
                    class="product-link">

                    <div class="product-card">

                        <div class="product-image">

                            <img
                                src="{{ Storage::url($product->image) }}"
                                alt="{{ $product->name }}"
                                onerror="this.src='{{ asset('images/no-image.png') }}'">

                        </div>

                        <div class="product-info">

                            <h3>{{ $product->name }}</h3>

                            <div class="rating">
                                ★★★★★
                            </div>

                            <div class="price">

                                <span class="current-price">
                                    Rp{{ number_format($product->price,0,',','.') }}
                                </span>

                                @if($product->discount_price)

                                    <span class="old-price">
                                        Rp{{ number_format($product->discount_price,0,',','.') }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </a>

            @empty

                <p>Tidak ada produk unggulan.</p>

            @endforelse

        </div>

    </div>

</section>

<section class="customer-section">

    <div class="container">

        <div class="customer-header">

            <h2 class="section-title-left">
                OUR HAPPY CUSTOMERS
            </h2>

            <div class="slider-buttons">

                <button id="prevBtn">←</button>
                <button id="nextBtn">→</button>

            </div>

        </div>

        <div class="review-wrapper">

            <div class="review-slider" id="reviewSlider">

                <div class="review-card">

                    <div class="stars">★★★★★</div>

                    <h4>
                        Sarah M.
                        <span class="verified">✔</span>
                    </h4>

                    <p>
                        "Lovestained punya outfit yang lucu, manis,
                        dan super aesthetic. Cocok banget buat aku
                        yang suka gaya coquette dan Y2K."
                    </p>

                </div>

                <div class="review-card">

                    <div class="stars">★★★★★</div>

                    <h4>
                        Alexa K.
                        <span class="verified">✔</span>
                    </h4>

                    <p>
                        "Aku jatuh cinta sama koleksi Lovestained
                        karena semuanya feminin, trendy,
                        dan easy to style."
                    </p>

                </div>

                <div class="review-card">

                    <div class="stars">★★★★★</div>

                    <h4>
                        James L.
                        <span class="verified">✔</span>
                    </h4>

                    <p>
                        "Detail outfit-nya cantik, nyaman dipakai,
                        dan bikin penampilan jadi lebih stylish."
                    </p>

                </div>

                <div class="review-card">

                    <div class="stars">★★★★★</div>

                    <h4>
                        Moon H.
                        <span class="verified">✔</span>
                    </h4>

                    <p>
                        "Produknya sesuai foto dan kualitasnya bagus.
                        Pengiriman juga cepat."
                    </p>

                </div>

                <div class="review-card">

                    <div class="stars">★★★★★</div>

                    <h4>
                        Olivia T.
                        <span class="verified">✔</span>
                    </h4>

                    <p>
                        "Salah satu toko fashion favoritku sekarang.
                        Banyak item unik yang susah ditemukan."
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="newsletter-wrapper">

    <div class="container">

        <div class="newsletter-box">

            <div class="newsletter-left">

                <h2>
                    STAY UPTO DATE ABOUT OUR
                    LATEST OFFERS
                </h2>

            </div>

            <div class="newsletter-right">

                <input
                    type="email"
                    placeholder="Enter your email address">

                <button>
                    Subscribe to Newsletter
                </button>

            </div>

        </div>

    </div>

</section>
@endsection