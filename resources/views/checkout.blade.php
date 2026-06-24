@extends('layouts.app')

@section('content')

@php

    $cart = session('cart', []);

    $subtotal = collect($cart)->sum(function($item){
        return $item['price'] * $item['qty'];
    });

    $shipping = 15000;

    $total = $subtotal + $shipping;

@endphp

<div class="container">

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Landing Page</a>
        <span>></span>
        <a href="{{ route('cart') }}">Cart</a>
        <span>></span>
        <span>Checkout</span>
    </div>

    <h1 class="checkout-title">
        CHECKOUT
    </h1>

    <div class="checkout-wrapper">

        <!-- LEFT SIDE -->
        <div class="checkout-form">

            <!-- SHIPPING -->
            <div class="checkout-card">

                <h2 class="checkout-heading">
                    📦 Shipping Address
                </h2>

                <div class="form-group">
                    <label>Full Name</label>
                    <input
                        type="text"
                        placeholder="e.g Sarah Parker">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input
                        type="text"
                        placeholder="+62 xxx xxxx xxxx">
                </div>

                <div class="form-group">
                    <label>Complete Address</label>
                    <textarea
                        rows="4"
                        placeholder="Street name, house number, apartment, etc."></textarea>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label>City</label>
                        <input
                            type="text"
                            placeholder="Jakarta">
                    </div>

                    <div class="form-group">
                        <label>Postal Code</label>
                        <input
                            type="text"
                            placeholder="12345">
                    </div>

                </div>

            </div>

            <!-- PAYMENT -->
            <div class="checkout-card">

                <h2 class="checkout-heading">
                    💳 Payment Method
                </h2>

                <div class="payment-methods">

                    <label class="payment-box active">
                        <input
                            type="radio"
                            name="payment"
                            checked>

                        <div>
                            🏦
                            <span>Bank Transfer</span>
                        </div>
                    </label>

                    <label class="payment-box">
                        <input
                            type="radio"
                            name="payment">

                        <div>
                            📱
                            <span>E-Wallet</span>
                        </div>
                    </label>

                    <label class="payment-box">
                        <input
                            type="radio"
                            name="payment">

                        <div>
                            💵
                            <span>Cash on Delivery</span>
                        </div>
                    </label>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="summary-card">

            <h2>Order Summary</h2>
        
            @foreach($cart as $item)
        
            <div class="checkout-product">
        
                <img
                    src="{{ asset('images/'.$item['image']) }}"
                    alt="{{ $item['name'] }}">
        
                <div>
        
                    <h4>{{ $item['name'] }}</h4>
        
                    <p>
                        Size : {{ $item['size'] }}
                    </p>
        
                    <p>
                        Qty : {{ $item['qty'] }}
                    </p>
        
                    <span>
                        Rp{{ number_format($item['price'],0,',','.') }}
                    </span>
        
                </div>
        
            </div>
        
            @endforeach
        
            <hr>
        
            <div class="summary-row">
                <span>Subtotal</span>
                <span>
                    Rp{{ number_format($subtotal,0,',','.') }}
                </span>
            </div>
        
            <div class="summary-row">
                <span>Shipping</span>
                <span>
                    Rp{{ number_format($shipping,0,',','.') }}
                </span>
            </div>
        
            <hr>
        
            <div class="summary-row total-payment">
                <span>Total Payment</span>
                <span>
                    Rp{{ number_format($total,0,',','.') }}
                </span>
            </div>
        
            <button class="place-order-btn">
                Place Order
            </button>
        
        </div>

    </div>

</div>

@endsection