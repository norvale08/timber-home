@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/article.css">

<div class="article-page">
    <div class="container">
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Блог', 'url' => '/blog'],
            ['label' => $article['title']],
        ]" />

        <h1 class="article-title">{{ $article['title'] }}</h1>

        <article class="article-content">
            <p class="article-intro">{{ $article['content'] }}</p>

            <div class="article-image-placeholder"></div>
            <p class="image-caption">Подпись к фотографии</p>

            @foreach($article['sections'] as $section)
                @if($section['type'] === 'text')
                    <p class="article-text">{{ $section['content'] }}</p>
                @elseif($section['type'] === 'heading2')
                    <h2 class="article-heading2">{{ $section['content'] }}</h2>
                @elseif($section['type'] === 'heading3')
                    <h3 class="article-heading3">{{ $section['content'] }}</h3>
                @elseif($section['type'] === 'list')
                    <ul class="article-list">
                        @foreach($section['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @elseif($section['type'] === 'bullet-list')
                    <ul class="article-bullet-list">
                        @foreach($section['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </article>
    </div>
</div>
@endsection
