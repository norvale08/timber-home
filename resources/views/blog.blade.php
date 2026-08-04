@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/components/breadcrumbs.css?v=2">
<link rel="stylesheet" href="/css/components/news-card.css?v=2">
<link rel="stylesheet" href="/css/components/pagination.css?v=2">
<link rel="stylesheet" href="/css/blog.css?v=2">

<div class="blog-page">
    <div class="container">
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Блог'],
        ]" />

        <h1 class="blog-title">Блог</h1>

        <div class="blog-grid">
            @foreach($blogPosts as $post)
            <x-blog-card :post="$post" :link="'/blog/' . $post['id']" />
            @endforeach
        </div>

        <x-pagination :currentPage="$currentPage" :totalPages="$totalPages" :pages="$pages" />
    </div>
</div>
@endsection
