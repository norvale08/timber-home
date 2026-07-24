<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $categories = [
            ['name' => 'Дома из бруса', 'description' => 'Описание категории', 'slug' => 'brus'],
            ['name' => 'Бани', 'description' => 'Описание категории', 'slug' => 'bani'],
            ['name' => 'Гаражи', 'description' => 'Описание категории', 'slug' => 'garazhi'],
            ['name' => 'Беседки', 'description' => 'Описание категории', 'slug' => 'besedki'],
        ];

        return view('catalog', [
            'title' => 'Каталог - Timber Home',
            'categories' => $categories,
        ]);
    }
}
