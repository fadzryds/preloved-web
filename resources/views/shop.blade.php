@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="container">

    <h1 class="page-title">
        SHOP
    </h1>

    <div class="product-grid">

        @forelse($products as $product)

            <a href="{{ route('product.show', $product->id) }}"
               class="product-link">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy">

                    </div>

                    <div class="product-info">

                        <h3>{{ $product->name }}</h3>

                        <div class="price">

                            <span class="current-price">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>

                            @if($product->discount_price)

                                <span class="old-price">
                                    Rp{{ number_format($product->discount_price, 0, ',', '.') }}
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </a>

        @empty

            <p class="text-center">
                Belum ada produk tersedia.
            </p>

        @endforelse

    </div>

    <div class="pagination-wrapper">

        {{ $products->links() }}

    </div>

</div>

@endsection