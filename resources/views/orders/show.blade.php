@extends('layouts.app')

@section('content')

<div class="order-detail-page">

    <div class="container">

        <div class="detail-header">

            <div>

                <p class="detail-label">
                    Order Number
                </p>

                <h1>
                    {{ $order->order_number }}
                </h1>

            </div>

            @php

                $statusClass = match($order->status){

                    'pending' => 'status-pending',

                    'paid' => 'status-paid',

                    'shipped' => 'status-shipped',

                    'completed' => 'status-completed',

                    'cancelled' => 'status-cancelled',

                    default => ''

                };

            @endphp

            <span class="status-badge {{ $statusClass }}">
                {{ strtoupper($order->status) }}
            </span>

        </div>

        <div class="detail-grid">

            <!-- SHIPPING -->

            <div class="detail-card">

                <h2>
                    📦 Shipping Address
                </h2>

                <div class="info-line">
                    <span>Name</span>
                    <strong>{{ $order->full_name }}</strong>
                </div>

                <div class="info-line">
                    <span>Phone</span>
                    <strong>{{ $order->phone }}</strong>
                </div>

                <div class="info-line">
                    <span>City</span>
                    <strong>{{ $order->city }}</strong>
                </div>

                <div class="info-line">
                    <span>Postal Code</span>
                    <strong>{{ $order->postal_code }}</strong>
                </div>

                <div class="info-line">
                    <span>Address</span>
                    <strong>{{ $order->address }}</strong>
                </div>

            </div>

            <!-- PAYMENT -->

            <div class="detail-card">

                <h2>
                    💳 Payment Info
                </h2>

                <div class="info-line">
                    <span>Method</span>
                    <strong>
                        {{ strtoupper($order->payment_method) }}
                    </strong>
                </div>

                <div class="info-line">
                    <span>Order Date</span>
                    <strong>
                        {{ $order->created_at->format('d M Y H:i') }}
                    </strong>
                </div>

                <div class="info-line">
                    <span>Total Payment</span>
                    <strong class="price-highlight">
                        Rp{{ number_format($order->total,0,',','.') }}
                    </strong>
                </div>

            </div>

        </div>

        <!-- PRODUCTS -->

        <div class="detail-card mt-30">

            <h2>
                🛍 Ordered Products
            </h2>

            @foreach($order->items as $item)

            <div class="product-row">

                <div class="product-left">

                    <img
                        src="{{ asset('storage/' . $item->product->image) }}"
                        alt="{{ $item->product->name }}">

                    <div>

                        <h4>
                            {{ $item->product->name }}
                        </h4>

                        <p>
                            Qty :
                            {{ $item->quantity }}
                        </p>

                    </div>

                </div>

                <div class="product-price">

                    Rp{{ number_format($item->price,0,',','.') }}

                </div>

            </div>

            @endforeach

        </div>

        <!-- SUMMARY -->

        <div class="detail-card mt-30">

            <h2>
                📄 Payment Summary
            </h2>

            <div class="summary-row">
                <span>Subtotal</span>
                <span>
                    Rp{{ number_format($order->subtotal,0,',','.') }}
                </span>
            </div>

            <div class="summary-row">
                <span>Shipping Fee</span>
                <span>
                    Rp{{ number_format($order->shipping_fee,0,',','.') }}
                </span>
            </div>

            <div class="summary-row">
                <span>Discount</span>
                <span>
                    Rp{{ number_format($order->discount,0,',','.') }}
                </span>
            </div>

            <hr>

            <div class="summary-row grand-total">

                <span>Total Payment</span>

                <span>
                    Rp{{ number_format($order->total,0,',','.') }}
                </span>

            </div>

        </div>

        <div class="back-area">

            <a
                href="{{ route('orders.index') }}"
                class="back-btn">

                ← Back to Orders

            </a>

        </div>

    </div>

</div>

@endsection