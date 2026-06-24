@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="page-title">
        TOP SELLING
    </h1>

    <div class="product-grid">

        @foreach($topSelling ?? [] as $product)

            <div class="product-card">

                <div class="product-image">

                    <img
                        src="{{ asset('images/' . $product->image) }}">

                </div>

                <div class="product-info">

                    <h3>{{ $product->name }}</h3>

                    <div class="price">

                        Rp{{ number_format($product->price,0,',','.') }}

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection