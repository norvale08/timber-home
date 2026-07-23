<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = [
            ['name' => 'Брус сосновый', 'price' => '1000'],
            ['name' => 'Брус дубовый', 'price' => '2500'],
            ['name' => 'Доска обрезная', 'price' => '800'],
            ['name' => 'Вагонка', 'price' => '450'],
            ['name' => 'Блокхаус', 'price' => '650'],
            ['name' => 'Имитация бруса', 'price' => '550'],
        ];

        $categories = [
            ['name' => 'Дома из бруса', 'description' => 'Описание категории', 'icon' => '🏠', 'slug' => 'brus'],
            ['name' => 'Бани', 'description' => 'Описание категории', 'icon' => '🛁', 'slug' => 'bani'],
            ['name' => 'Гаражи', 'description' => 'Описание категории', 'icon' => '🚗', 'slug' => 'garazhi'],
            ['name' => 'Беседки', 'description' => 'Описание категории', 'icon' => '🌳', 'slug' => 'besedki'],
        ];

        $news = [
            ['title' => 'Заголовок новости', 'description' => 'Краткое описание новости'],
            ['title' => 'Заголовок новости', 'description' => 'Краткое описание новости'],
            ['title' => 'Заголовок новости', 'description' => 'Краткое описание новости'],
        ];

        return view('home', [
            'title' => 'Timber Home - Деревянные дома',
            'products' => $products,
            'categories' => $categories,
            'news' => $news,
        ]);
    }
}
