@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="container">

    <h1 class="page-title">
        TOP SELLING
    </h1>

    <div class="product-grid">

        @forelse($topSelling as $product)

            <a href="{{ route('product.show', $product->id) }}"
               class="product-link">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}">

                    </div>

                    <div class="product-info">

                        <h3>{{ $product->name }}</h3>

                        <div class="price">

                            Rp{{ number_format($product->price,0,',','.') }}

                        </div>

                    </div>

                </div>

            </a>

        @empty

            <p>Tidak ada produk unggulan.</p>

        @endforelse

    </div>

    {{ $topSelling->links() }}

</div>

@endsection