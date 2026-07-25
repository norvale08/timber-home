<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::take(6)->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->title,
                'price' => number_format($p->price, 0, '', ' '),
                'old_price' => $p->old_price ? number_format($p->old_price, 0, '', ' ') : null,
                'in_stock' => true,
                'new' => false,
            ];
        })->toArray();

        $categories = Config::get('catalog.categories');

        $news = Article::take(5)->get()->map(function ($a) {
            return [
                'title' => $a->title,
                'description' => mb_substr($a->content, 0, 100, 'UTF-8') . '...',
            ];
        })->toArray();

        return view('home', [
            'title' => 'Timber Home - Деревянные дома',
            'products' => $products,
            'categories' => $categories,
            'news' => $news,
        ]);
    }
}
