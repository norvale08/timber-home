<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug): View
    {
        $categoryNames = Config::get('catalog.category_names');
        $categoryName = $categoryNames[$slug] ?? 'Категория';

        $query = Product::query();

        $priceMin = (int) $request->query('price_min', 0);
        $priceMax = (int) $request->query('price_max', 100000);
        $priceMin = max(0, $priceMin);
        $priceMax = max($priceMin, $priceMax);
        $query->whereBetween('price', [$priceMin, $priceMax]);

        $sort = $request->query('sort', 'default');
        if ($sort === 'price' || $sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'name') {
            $query->orderBy('title', 'asc');
        }

        $perPage = (int) $request->query('per_page', 6);
        $perPage = in_array($perPage, [3, 6, 9, 12]) ? $perPage : 6;

        $products = $query->paginate($perPage, ['*'], 'page', $request->query('page', 1));

        $paginatedProducts = $products->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->title,
                'price' => number_format($p->price, 0, '', ' '),
                'old_price' => null,
                'in_stock' => true,
                'new' => false,
            ];
        })->toArray();

        $totalPages = $products->lastPage();
        $currentPage = $products->currentPage();
        $total = $products->total();

        $pages = [];
        if ($totalPages <= 7) {
            for ($i = 1; $i <= $totalPages; $i++) {
                $pages[] = $i;
            }
        } else {
            $pages[] = 1;
            if ($currentPage > 4) {
                $pages[] = '...';
            }
            $start = max(2, $currentPage - 2);
            $end = min($totalPages - 1, $currentPage + 2);
            for ($i = $start; $i <= $end; $i++) {
                $pages[] = $i;
            }
            if ($currentPage < $totalPages - 3) {
                $pages[] = '...';
            }
            $pages[] = $totalPages;
        }

        $filters = [
            [
                'title' => 'Цена',
                'type' => 'range',
                'min' => 0,
                'max' => 100000,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'checkbox',
                'options' => [
                    ['label' => 'Земляничный нектар', 'checked' => true],
                    ['label' => 'Хвойный экстракт', 'checked' => false],
                    ['label' => 'Кленовый сироп', 'checked' => false],
                    ['label' => 'Берёзовый сок', 'checked' => false],
                    ['label' => 'Облепиховый морс', 'checked' => false],
                    ['label' => 'Рябиновый настой', 'checked' => false],
                    ['label' => 'Черничный кисель', 'checked' => false],
                    ['label' => 'Брусничный компот', 'checked' => false],
                ],
                'show_all' => true,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'radio',
                'name' => 'taste',
                'options' => [
                    ['label' => 'Вишнёвый нектар', 'selected' => true],
                    ['label' => 'Сосновый сироп', 'selected' => false],
                    ['label' => 'Липовый нектар', 'selected' => false],
                    ['label' => 'Осиновый экстракт', 'selected' => false],
                    ['label' => 'Можжевёловый морс', 'selected' => false],
                    ['label' => 'Клюквенный настой', 'selected' => false],
                    ['label' => 'Ежевичный кисель', 'selected' => false],
                    ['label' => 'Малиновый компот', 'selected' => false],
                ],
                'show_all' => true,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'radio',
                'name' => 'type',
                'options' => [
                    ['label' => 'Опция 1', 'selected' => false],
                    ['label' => 'Опция 2', 'selected' => false],
                    ['label' => 'Опция 3', 'selected' => false],
                ],
                'show_all' => false,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'radio',
                'name' => 'size',
                'options' => [
                    ['label' => 'Опция 1', 'selected' => false],
                    ['label' => 'Опция 2', 'selected' => false],
                    ['label' => 'Опция 3', 'selected' => false],
                ],
                'show_all' => false,
            ],
            [
                'title' => 'Фильтр',
                'type' => 'radio',
                'name' => 'color',
                'options' => [
                    ['label' => 'Опция 1', 'selected' => false],
                    ['label' => 'Опция 2', 'selected' => false],
                    ['label' => 'Опция 3', 'selected' => false],
                ],
                'show_all' => false,
            ],
        ];

        return view('category', [
            'title' => "$categoryName - Timber Home",
            'categoryName' => $categoryName,
            'slug' => $slug,
            'products' => $paginatedProducts,
            'filters' => $filters,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'total' => $total,
            'sort' => $sort,
            'pages' => $pages,
            'priceMin' => $priceMin,
            'priceMax' => $priceMax,
        ]);
    }
}
