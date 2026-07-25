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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paginationBtns = document.querySelectorAll('.pagination-btn:not(.pagination-prev):not(.pagination-next)');
    const prevBtn = document.querySelector('.pagination-prev');
    const nextBtn = document.querySelector('.pagination-next');

    function setActivePage(btn) {
        paginationBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }

    paginationBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            setActivePage(this);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            const activeBtn = document.querySelector('.pagination-btn.active');
            if (activeBtn && activeBtn.previousElementSibling && !activeBtn.previousElementSibling.classList.contains('pagination-prev')) {
                setActivePage(activeBtn.previousElementSibling);
            }
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            const activeBtn = document.querySelector('.pagination-btn.active');
            if (activeBtn && activeBtn.nextElementSibling && !activeBtn.nextElementSibling.classList.contains('pagination-next')) {
                setActivePage(activeBtn.nextElementSibling);
            }
        });
    }
});
</script>
@endsection
