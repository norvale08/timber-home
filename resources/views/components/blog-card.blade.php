@props(['post', 'link' => null])

@if($link)
<a href="{{ $link }}" class="blog-card-link">
@endif
    <div class="news-card">
        <div class="news-content">
            <div class="news-title">{{ $post['title'] }}</div>
            <div class="news-description">{{ $post['description'] }}</div>
        </div>
    </div>
@if($link)
</a>
@endif
