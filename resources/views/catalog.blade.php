@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/components/breadcrumbs.css?v=2">
<link rel="stylesheet" href="/css/components/catalog-card.css?v=2">
<link rel="stylesheet" href="/css/catalog.css?v=2">

<div class="catalog-page">
    <div class="container">
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Каталог'],
        ]" />

        <h1 class="catalog-page-title">Каталог</h1>

        <div class="catalog-grid">
            @foreach($categories as $category)
            <x-catalog-card :category="$category" />
            @endforeach
        </div>
    </div>
</div>
@endsection
