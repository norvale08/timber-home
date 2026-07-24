@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/catalog.css">

<div class="catalog-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">></span>
            <span class="breadcrumb-current">Каталог</span>
        </div>

        <!-- Page Title -->
        <h1 class="catalog-page-title">Каталог</h1>

        <!-- Catalog Grid -->
        <div class="catalog-grid">
            @foreach($categories as $category)
            <div class="catalog-item">
                <div class="catalog-content">
                    <div class="catalog-title">{{ $category['name'] }}</div>
                    <div class="catalog-description">{{ $category['description'] }}</div>
                    <a href="/catalog/{{ $category['slug'] }}" class="catalog-link">
                        Перейти
                        <img src="/images/arrow-right-fill.png" alt="Go" width="16" height="16">
                    </a>
                </div>
                <div class="catalog-image"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
