@extends('layouts.app')

@section('content')

<div class="container">

    <div class="payment-wrapper">

        <div class="payment-card">

            <div class="payment-header">

                <div class="payment-icon">
                    💳
                </div>

                <h1>
                    Complete Your Payment
                </h1>

                <p>
                    Order Number:
                    <strong>{{ $order->order_number }}</strong>
                </p>

            </div>

            <div class="payment-method-badge">

                @if($method == 'qris')
                    QRIS Payment
                @elseif($method == 'transfer')
                    Bank Transfer
                @else
                    Cash On Delivery
                @endif

            </div>

            {{-- QRIS --}}
            @if($method == 'qris')

                <div class="payment-content">

                    <h3>
                        Scan QR Code
                    </h3>

                    <img
                        src="{{ asset('images/qris.png') }}"
                        class="qris-image"
                        alt="QRIS">

                    <div class="amount-box">

                        Total Payment

                        <strong>
                            Rp{{ number_format($total,0,',','.') }}
                        </strong>

                    </div>

                    <p class="payment-note">
                        Scan the QRIS code using any banking or e-wallet application.
                    </p>

                </div>

            @endif

            {{-- TRANSFER --}}
            @if($method == 'transfer')

                @php
                    $va = '8808' . rand(10000000,99999999);
                @endphp

                <div class="payment-content">

                    <h3>
                        Virtual Account Number
                    </h3>

                    <div class="va-box">

                        {{ $va }}

                    </div>

                    <div class="amount-box">

                        Total Payment

                        <strong>
                            Rp{{ number_format($total,0,',','.') }}
                        </strong>

                    </div>

                    <p class="payment-note">
                        Transfer exactly according to the amount above.
                    </p>

                </div>

            @endif

            {{-- COD --}}
            @if($method == 'cod')

                <div class="payment-content">

                    <div class="cod-success">

                        ✅

                    </div>

                    <h3>
                        Order Successfully Created
                    </h3>

                    <p>
                        Your order is being processed.
                    </p>

                    <div class="amount-box">

                        Prepare Cash

                        <strong>
                            Rp{{ number_format($total,0,',','.') }}
                        </strong>

                    </div>

                </div>

            @endif

            <div class="payment-summary">

                <h3>Order Summary</h3>

                <div class="summary-row">
                    <span>Order Number</span>
                    <span>{{ $order->order_number }}</span>
                </div>

                <div class="summary-row">
                    <span>Status</span>
                    <span class="status-badge">
                        {{ strtoupper($order->status) }}
                    </span>
                </div>

                <div class="summary-row">
                    <span>Total</span>
                    <span>
                        Rp{{ number_format($order->total,0,',','.') }}
                    </span>
                </div>

            </div>

            <a
                href="{{ route('home') }}"
                class="payment-btn">

                Back To Home

            </a>

        </div>

    </div>

</div>

@endsection