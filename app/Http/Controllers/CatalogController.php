<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $categories = Config::get('catalog.categories');

        return view('catalog', [
            'title' => 'Каталог - Timber Home',
            'categories' => $categories,
        ]);
    }
}
