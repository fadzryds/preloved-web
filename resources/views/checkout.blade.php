@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="checkout-title">
        CHECKOUT
    </h1>

    <form action="{{ route('payment') }}" method="POST">

        @csrf

        <div class="checkout-wrapper">

            <div class="checkout-form">

                <div class="checkout-card">

                    <h2>📦 Shipping Address</h2>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input
                            type="text"
                            name="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input
                            type="text"
                            name="phone"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea
                            name="address"
                            rows="4"
                            required></textarea>
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label>City</label>
                            <input
                                type="text"
                                name="city"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Postal Code</label>
                            <input
                                type="text"
                                name="postal_code"
                                required>
                        </div>

                    </div>

                </div>

                <div class="checkout-card">

                    <h2>💳 Payment Method</h2>

                    <div class="payment-methods">

                        <label class="payment-box">
                            <input
                                type="radio"
                                name="payment_method"
                                value="qris"
                                onchange="showPaymentInfo()"
                                required>

                            QRIS
                        </label>

                        <label class="payment-box">
                            <input
                                type="radio"
                                name="payment_method"
                                value="bank_transfer"
                                onchange="showPaymentInfo()">

                            Transfer Bank
                        </label>

                        <label class="payment-box">
                            <input
                                type="radio"
                                name="payment_method"
                                value="cod"
                                onchange="showPaymentInfo()">

                            Cash On Delivery
                        </label>

                    </div>

                    <div
                        id="payment-info"
                        style="margin-top:20px;">
                    </div>

                </div>

            </div>

            <div class="summary-card">

                <h2>Order Summary</h2>

                @foreach($cart as $item)

                    <div class="checkout-product">

                        <img
                            src="{{ asset('storage/' . $item['image']) }}"
                            width="80">

                        <div>

                            <h4>{{ $item['name'] }}</h4>

                            <p>Qty : {{ $item['qty'] }}</p>

                            <p>
                                Rp{{ number_format($item['price'],0,',','.') }}
                            </p>

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

                <div class="summary-row total-payment">
                    <strong>Total</strong>
                    <strong>
                        Rp{{ number_format($total,0,',','.') }}
                    </strong>
                </div>

                <button
                    type="submit"
                    class="place-order-btn">

                    Place Order

                </button>

            </div>

        </div>

    </form>

</div>

<script>

function showPaymentInfo()
{
    const method =
        document.querySelector(
            'input[name="payment_method"]:checked'
        ).value;

    const total =
        "Rp{{ number_format($total,0,',','.') }}";

    let html = '';

    if(method === 'qris')
    {
        html = `
            <div class="payment-preview">

                <h3>QRIS Payment</h3>

                <p>
                    QRIS akan ditampilkan
                    setelah order dibuat.
                </p>

            </div>
        `;
    }

    if(method === 'bank_transfer')
    {
        html = `
            <div class="payment-preview">

                <h3>Transfer Bank</h3>

                <p>
                    Virtual Account akan dibuat
                    otomatis setelah checkout.
                </p>

            </div>
        `;
    }

    if(method === 'cod')
    {
        html = `
            <div class="payment-preview">

                <h3>Cash On Delivery</h3>

                <p>
                    Siapkan uang tunai sebesar
                    <strong>${total}</strong>
                </p>

            </div>
        `;
    }

    document
        .getElementById('payment-info')
        .innerHTML = html;
}

</script>

@endsection