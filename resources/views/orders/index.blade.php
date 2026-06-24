@extends('layouts.app')

@section('content')

<div class="orders-page">

    <div class="container">

        <div class="orders-header">

            <h1>My Orders</h1>

            <p>
                Track and manage all your purchases
            </p>

        </div>

        @if($orders->count())

            <div class="orders-list">

                @foreach($orders as $order)

                <div class="order-card">

                    <div class="order-top">

                        <div>

                            <span class="order-label">
                                Order Number
                            </span>

                            <h3>
                                {{ $order->order_number }}
                            </h3>

                        </div>

                        <div>

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

                    </div>

                    <div class="order-info">

                        <div class="info-box">
                            <span>Date</span>
                            <strong>
                                {{ $order->created_at->format('d M Y') }}
                            </strong>
                        </div>

                        <div class="info-box">
                            <span>Payment</span>
                            <strong>
                                {{ strtoupper($order->payment_method) }}
                            </strong>
                        </div>

                        <div class="info-box">
                            <span>Total</span>
                            <strong>
                                Rp{{ number_format($order->total,0,',','.') }}
                            </strong>
                        </div>

                        <div class="info-box">
                            <span>Items</span>
                            <strong>
                                {{ $order->items->count() }}
                            </strong>
                        </div>

                    </div>

                    <div class="order-footer">

                        <a
                            href="{{ route('orders.show', $order) }}"
                            class="btn-detail">

                            View Details

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        @else

            <div class="empty-orders">

                <img
                    src="{{ asset('images/empty-order.png') }}"
                    alt="No Orders">

                <h2>
                    No Orders Yet
                </h2>

                <p>
                    Looks like you haven't purchased anything yet.
                </p>

                <a
                    href="{{ route('shop') }}"
                    class="shop-now-btn">

                    Start Shopping

                </a>

            </div>

        @endif

    </div>

</div>

@endsection