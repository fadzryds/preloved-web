@extends('layouts.app')

@section('content')

<div class="auth-container">

    <div class="auth-card">

        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required>
            </div>

            <button type="submit" class="auth-btn">
                Login
            </button>

            <p class="auth-link">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Register
                </a>
            </p>

        </form>

    </div>

</div>

@endsection