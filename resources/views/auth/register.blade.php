@extends('layouts.app')

@section('content')

<div class="auth-container">

    <div class="auth-card">

        <h2>Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    required>
            </div>

            <button type="submit" class="auth-btn">
                Register
            </button>

            <p class="auth-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Login
                </a>
            </p>

        </form>

    </div>

</div>

@endsection