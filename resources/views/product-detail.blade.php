@extends('layouts.app')

@section('content')

<div class="container">

    <div class="breadcrumb">

        <a href="/">Home</a>

        <span>></span>

        <span>{{ $product->name }}</span>

    </div>

    <div class="product-detail">

        <!-- IMAGE -->
        <div class="detail-image">

            <img
                src="{{ asset('images/' . $product->image) }}"
                alt="{{ $product->name }}">

        </div>

        <!-- INFO -->
        <div class="detail-info">

            <h1>
                {{ $product->name }}
            </h1>

            <div class="detail-rating">
                ★★★★★ <span>4.8/5</span>
            </div>

            <div class="detail-price">

                Rp{{ number_format($product->price,0,',','.') }}

            </div>

            <p class="detail-description">

                {{ $product->description }}

            </p>

            <div class="detail-meta">

                <p>
                    <strong>Size:</strong>
                    {{ $product->size }}
                </p>

                <p>
                    <strong>Condition:</strong>
                    {{ $product->condition }}
                </p>

                <p>
                    <strong>Stock:</strong>
                    {{ $product->stock }}
                </p>

            </div>

            <div class="product-buttons">

                <form action="{{ route('cart.add',$product->id) }}"
                    method="POST">
            
                    @csrf
            
                    <button type="submit"
                            class="add-cart-btn">
                        Add To Cart
                    </button>
            
                </form>
            
                <form action="{{ route('buy.now',$product->id) }}"
                    method="POST">
            
                    @csrf
            
                    <button type="submit"
                            class="buy-now-btn">
                        Buy Now
                    </button>
            
                </form>
            
            </div>

            </div>

        </div>

    </div>

    <!-- RELATED -->

    <section class="related-section">

        <h2>
            You Might Also Like
        </h2>

        <div class="product-grid">

            @foreach($relatedProducts as $item)

                <a href="{{ route('product.show', $item->id) }}"
                   class="product-link">

                    <div class="product-card">

                        <div class="product-image">

                            <img
                                src="{{ asset('images/' . $item->image) }}">

                        </div>

                        <div class="product-info">

                            <h3>
                                {{ $item->name }}
                            </h3>

                            <div class="price">

                                Rp{{ number_format($item->price,0,',','.') }}

                            </div>

                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </section>

</div>

@endsection