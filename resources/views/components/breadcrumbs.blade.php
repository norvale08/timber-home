@props(['items', 'separator' => '•'])

<div class="breadcrumbs">
    @foreach($items as $item)
        @if($item['url'] ?? null)
        <a href="{{ $item['url'] }}" class="breadcrumb-link">{{ $item['label'] }}</a>
        @else
        <span class="breadcrumb-current">{{ $item['label'] }}</span>
        @endif
        @unless($loop->last)
        <span class="breadcrumb-separator">{{ $separator }}</span>
        @endunless
    @endforeach
</div>
