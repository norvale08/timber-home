<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug): View
    {
        $categoryName = match($slug) {
            'brus' => 'Дома из бруса',
            'bani' => 'Бани',
            'garazhi' => 'Гаражи',
            'besedki' => 'Беседки',
            default => 'Категория',
        };

        $baseProducts = [
            ['name' => 'Брус сосновый', 'price' => '1000', 'old_price' => '1200', 'in_stock' => true, 'new' => true],
            ['name' => 'Брус дубовый', 'price' => '2500', 'old_price' => '3000', 'in_stock' => true, 'new' => false],
            ['name' => 'Доска обрезная', 'price' => '800', 'old_price' => null, 'in_stock' => true, 'new' => false],
            ['name' => 'Вагонка', 'price' => '450', 'old_price' => '500', 'in_stock' => true, 'new' => true],
            ['name' => 'Блокхаус', 'price' => '650', 'old_price' => null, 'in_stock' => true, 'new' => false],
            ['name' => 'Имитация бруса', 'price' => '550', 'old_price' => '600', 'in_stock' => true, 'new' => false],
            ['name' => 'Брус еловый', 'price' => '900', 'old_price' => '1100', 'in_stock' => true, 'new' => false],
            ['name' => 'Доска пола', 'price' => '750', 'old_price' => null, 'in_stock' => true, 'new' => true],
        ];

        $products = [];
        for ($i = 1; $i <= 32; $i++) {
            $base = $baseProducts[($i - 1) % count($baseProducts)];
            $products[] = array_merge($base, ['id' => $i]);
        }

        $priceMin = (int) $request->query('price_min', 1200);
        $priceMax = (int) $request->query('price_max', 252000);
        $priceMin = max(0, $priceMin);
        $priceMax = max($priceMin, $priceMax);
        $products = array_values(array_filter($products, fn ($p) => (int) $p['price'] >= $priceMin && (int) $p['price'] <= $priceMax));

        $sort = $request->query('sort', 'default');
        if ($sort === 'price' || $sort === 'price_asc') {
            usort($products, fn ($a, $b) => (int) $a['price'] <=> (int) $b['price']);
        } elseif ($sort === 'price_desc') {
            usort($products, fn ($a, $b) => (int) $b['price'] <=> (int) $a['price']);
        } elseif ($sort === 'name') {
            usort($products, fn ($a, $b) => strcmp($a['name'], $b['name']));
        }

        $perPage = (int) $request->query('per_page', 12);
        $perPage = in_array($perPage, [12, 25, 50, 100]) ? $perPage : 12;

        $total = count($products);
        $totalPages = max(1, (int) ceil($total / $perPage));
        $currentPage = min(max((int) $request->query('page', 1), 1), $totalPages);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedProducts = array_slice($products, $offset, $perPage);

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
                'min' => 1200,
                'max' => 252000,
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
