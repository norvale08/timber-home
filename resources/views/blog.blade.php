@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/blog.css">

<div class="blog-page">
    <div class="container">
        <h1 class="blog-title">Блог</h1>

        <div class="blog-grid">
            @foreach($blogPosts as $post)
            <a href="/blog/{{ $post['id'] }}" class="blog-card-link">
                <div class="blog-card">
                    <div class="blog-image"></div>
                    <div class="blog-content">
                        <div class="blog-date">{{ $post['date'] }}</div>
                        <h3 class="blog-post-title">{{ $post['title'] }}</h3>
                        <p class="blog-description">{{ $post['description'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="pagination">
            <button class="pagination-btn pagination-prev">
                <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">4</button>
            <button class="pagination-btn">5</button>
            <span class="pagination-ellipsis">...</span>
            <button class="pagination-btn">12</button>
            <button class="pagination-btn pagination-next">
                <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
            </button>
        </div>
    </div>
</div>
@endsection
