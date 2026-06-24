@extends('layouts.app')

@section('content')

<div class="container profile-page">

    <h1 class="page-title">
        MY PROFILE
    </h1>

    <div class="profile-card">

        <div class="profile-avatar">

            <i class="fa-solid fa-user"></i>

        </div>

        <h3>
            {{ auth()->user()->name ?? 'Guest User' }}
        </h3>

        <p>
            {{ auth()->user()->email ?? '-' }}
        </p>

    </div>

</div>

@endsection