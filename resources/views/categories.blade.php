@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="page-title">
        ALL CATEGORIES
    </h1>

    <div class="category-grid">

        @foreach($categories ?? [] as $category)

        <div class="category-item">

            <img
                src="{{ asset('images/' . $category->image) }}"
                alt="{{ $category->name }}">

            <span>
                {{ $category->name }}
            </span>

        </div>

        @endforeach

    </div>

</div>

@endsection