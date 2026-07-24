<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $categoryName = match($slug) {
            'brus' => 'Дома из бруса',
            'bani' => 'Бани',
            'garazhi' => 'Гаражи',
            'besedki' => 'Беседки',
            default => 'Категория',
        };

        $products = [
            ['id' => 1, 'name' => 'Брус сосновый', 'price' => '1000', 'old_price' => '1200', 'in_stock' => true, 'new' => true],
            ['id' => 2, 'name' => 'Брус дубовый', 'price' => '2500', 'old_price' => '3000', 'in_stock' => true, 'new' => false],
            ['id' => 3, 'name' => 'Доска обрезная', 'price' => '800', 'old_price' => null, 'in_stock' => true, 'new' => false],
            ['id' => 4, 'name' => 'Вагонка', 'price' => '450', 'old_price' => '500', 'in_stock' => true, 'new' => true],
            ['id' => 5, 'name' => 'Блокхаус', 'price' => '650', 'old_price' => null, 'in_stock' => true, 'new' => false],
            ['id' => 6, 'name' => 'Имитация бруса', 'price' => '550', 'old_price' => '600', 'in_stock' => true, 'new' => false],
            ['id' => 7, 'name' => 'Брус еловый', 'price' => '900', 'old_price' => '1100', 'in_stock' => true, 'new' => false],
            ['id' => 8, 'name' => 'Доска пола', 'price' => '750', 'old_price' => null, 'in_stock' => true, 'new' => true],
        ];

        $filters = [
            [
                'title' => 'Цена',
                'type' => 'range',
                'min' => 1200,
                'max' => 252000,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'checkbox',
                'options' => [
                    'Земляничный нектар',
                    'Хвойный экстракт',
                    'Кленовый сироп',
                    'Ванильный аромат',
                ],
                'show_all' => true,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'checkbox',
                'options' => [
                    'Опция 1',
                    'Опция 2',
                    'Опция 3',
                ],
                'show_all' => false,
            ],
        ];

        return view('category', [
            'title' => "$categoryName - Timber Home",
            'categoryName' => $categoryName,
            'slug' => $slug,
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
