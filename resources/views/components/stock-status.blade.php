@props(['inStock' => true])

@if($inStock)
<div class="product-stock">В наличии</div>
@else
<div class="product-stock out-of-stock">Нет в наличии</div>
@endif
