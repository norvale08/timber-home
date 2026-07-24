<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(int $id): View
    {
        $product = [
            'id' => $id,
            'name' => 'Брус сосновый',
            'article' => 'Артикул: 12345',
            'price' => '1000',
            'old_price' => '1200',
            'in_stock' => true,
            'new' => true,
            'hit' => true,
            'description' => 'Качественный сосновый брус для строительства домов и бань. Идеально подходит для возведения стен, перекрытий и других конструкций.',
            'characteristics' => [
                ['name' => 'Материал', 'value' => 'Сосна'],
                ['name' => 'Размер', 'value' => '100x100x6000 мм'],
                ['name' => 'Влажность', 'value' => '20%'],
                ['name' => 'Сорт', 'value' => 'А'],
            ],
            'colors' => ['Темно-серый', 'Светло-коричневый', 'Натуральный'],
            'selected_color' => 'Темно-серый',
        ];

        $similarProducts = [
            ['name' => 'Брус дубовый', 'price' => '2500', 'old_price' => '3000', 'in_stock' => true, 'new' => false],
            ['name' => 'Доска обрезная', 'price' => '800', 'old_price' => null, 'in_stock' => true, 'new' => true],
            ['name' => 'Вагонка', 'price' => '450', 'old_price' => '500', 'in_stock' => true, 'new' => false],
            ['name' => 'Блокхаус', 'price' => '650', 'old_price' => null, 'in_stock' => true, 'new' => false],
        ];

        return view('product', [
            'title' => "{$product['name']} - Timber Home",
            'product' => $product,
            'similarProducts' => $similarProducts,
        ]);
    }
}
