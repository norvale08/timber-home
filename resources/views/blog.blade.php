@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/blog.css">

<div class="blog-page">
    <div class="container">
        <h1 class="blog-title">Блог</h1>

        <div class="blog-grid">
            @foreach($blogPosts as $post)
            <x-blog-card :post="$post" :link="'/blog/' . $post['id']" />
            @endforeach
        </div>

        <div class="pagination">
            @if($currentPage > 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}" class="pagination-btn pagination-prev">
                <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
            </a>
            @else
            <button class="pagination-btn pagination-prev" disabled>
                <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
            </button>
            @endif

            @foreach($pages as $page)
                @if($page === '...')
                    <span class="pagination-ellipsis">...</span>
                @elseif($page == $currentPage)
                    <button class="pagination-btn active">{{ $page }}</button>
                @else
                    <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}" class="pagination-btn">{{ $page }}</a>
                @endif
            @endforeach

            @if($currentPage < $totalPages)
            <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}" class="pagination-btn pagination-next">
                <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
            </a>
            @else
            <button class="pagination-btn pagination-next" disabled>
                <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
            </button>
            @endif
        </div>
    </div>
</div>
@endsection
