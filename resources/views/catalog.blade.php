@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/catalog.css">

<div class="catalog-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Каталог'],
        ]" />

        <!-- Page Title -->
        <h1 class="catalog-page-title">Каталог</h1>

        <!-- Catalog Grid -->
        <div class="catalog-grid">
            @foreach($categories as $category)
            <x-catalog-card :category="$category" />
            @endforeach
        </div>
    </div>
</div>
@endsection
