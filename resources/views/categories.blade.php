@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="container">

    <h1 class="page-title">
        ALL CATEGORIES
    </h1>

    <div class="category-grid">

        @forelse($categories as $category)

            <div class="category-item">

                <img
                    src="{{ Storage::url($category->image) }}"
                    alt="{{ $category->name }}">

                <span>
                    {{ $category->name }}
                </span>

            </div>

        @empty

            <p>Tidak ada kategori.</p>

        @endforelse

    </div>

</div>

@endsection