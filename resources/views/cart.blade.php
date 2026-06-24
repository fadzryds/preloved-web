@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="/">Landing Page</a>
        <span>></span>
        <span>Cart</span>
    </div>

    <h1 class="cart-title">
        YOUR CART
    </h1>

    <div class="cart-wrapper">

        <!-- LEFT SIDE -->
        <div class="cart-items">
    
            @forelse(session('cart', []) as $item)
    
            <div class="cart-item">
    
                <div class="cart-check">
                    <input type="checkbox"
                           class="cart-checkbox"
                           checked
                           data-price="{{ $item['price'] * $item['qty'] }}">
                </div>
    
                <img src="{{ asset('images/'.$item['image']) }}">
    
                <div class="cart-info">
    
                    <h3>{{ $item['name'] }}</h3>
    
                    <p>Size : {{ $item['size'] }}</p>
    
                    <h4>
                        Rp{{ number_format($item['price'],0,',','.') }}
                    </h4>
    
                </div>
    
                <div class="cart-actions">
    
                    <form action="{{ route('cart.remove',$item['id']) }}"
                          method="POST">
                        @csrf
                        <button type="submit" class="delete-btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
    
                    <div class="qty-box">
    
                        <form action="{{ route('cart.decrease',$item['id']) }}"
                              method="POST">
                            @csrf
                            <button type="submit">-</button>
                        </form>
    
                        <span>{{ $item['qty'] }}</span>
    
                        <form action="{{ route('cart.increase',$item['id']) }}"
                              method="POST">
                            @csrf
                            <button type="submit">+</button>
                        </form>
    
                    </div>
    
                </div>
    
            </div>
    
            @empty
    
            <div class="empty-cart">
                <h3>Your cart is empty</h3>
            </div>
    
            @endforelse
    
        </div>
    
        <!-- RIGHT SIDE -->
        <div class="order-summary">
    
            <h2>Order Summary</h2>
    
            <div class="summary-row">
                <span>Selected Items</span>
                <span id="selected-count">
                    {{ count(session('cart', [])) }}
                </span>
            </div>
    
            <div class="summary-row">
                <span>Subtotal</span>
                <span id="subtotal-price">
                    Rp0
                </span>
            </div>
    
            <div class="summary-row">
                <span>Shipping</span>
                <span>Rp15.000</span>
            </div>
    
            <hr>
    
            <div class="summary-row total-row">
                <span>Total</span>
                <span id="total-price">
                    Rp0
                </span>
            </div>
    
            <a href="{{ route('checkout') }}"
               class="checkout-btn">
                Proceed to Checkout
                <i class="fa-solid fa-arrow-right"></i>
            </a>
    
        </div>
    
    </div>

</div>

<script>

    function updateCartTotal()
    {
        let subtotal = 0;
        let count = 0;
    
        document.querySelectorAll('.cart-checkbox').forEach(item => {
    
            if(item.checked)
            {
                subtotal += Number(item.dataset.price);
                count++;
            }
    
        });
    
        let shipping = count > 0 ? 15000 : 0;
    
        let total = subtotal + shipping;
    
        document.getElementById('selected-count').innerText = count;
    
        document.getElementById('subtotal-price').innerText =
            'Rp' + subtotal.toLocaleString('id-ID');
    
        document.getElementById('total-price').innerText =
            'Rp' + total.toLocaleString('id-ID');
    }
    
    document.querySelectorAll('.cart-checkbox')
        .forEach(item => {
            item.addEventListener('change', updateCartTotal);
        });
    
    updateCartTotal();
    
    </script>
    
@endsection