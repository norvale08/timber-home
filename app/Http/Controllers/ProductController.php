<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(int $id): View
    {
        $productModel = Product::findOrFail($id);

        $product = [
            'id' => $productModel->id,
            'name' => $productModel->title,
            'article' => 'Арт: ' . str_pad($productModel->id, 4, '0', STR_PAD_LEFT),
            'price' => number_format($productModel->price, 0, '', ' '),
            'old_price' => null,
            'in_stock' => true,
            'new' => true,
            'hit' => false,
            'description' => $productModel->description,
            'full_description' => [
                'Высококачественный материал, прошедший камерную сушку до оптимальной влажности 12-18%. Обеспечивает минимальную усадку и долговечность конструкции. Идеально подходит для строительства домов в различных климатических условиях.',
                'Экологически чистый материал без использования химических обработок. Сохраняет естественную структуру древесины, обеспечивая здоровый микроклимат внутри помещений. Материал сертифицирован согласно стандартам качества.',
                'Универсальное применение в строительстве: от каркасных домов до бань и беседок. Отличная обрабатываемость позволяет реализовать любые архитектурные решения. Материал устойчив к деформации и растрескиванию.',
            ],
            'characteristics' => [
                ['name' => 'Порода древесины', 'value' => 'Хвойная (сосна/ель)'],
                ['name' => 'Влажность', 'value' => '12-18% (камерная сушка)'],
                ['name' => 'Сечение', 'value' => '100×100 мм / 150×150 мм'],
                ['name' => 'Длина', 'value' => 'до 6 метров'],
            ],
            'colors' => ['Темно-серый', 'Светло-коричневый', 'Натуральный'],
            'selected_color' => 'Темно-серый',
        ];

        $similarProductsModels = Product::where('id', '!=', $id)->take(8)->get();
        $similarProducts = $similarProductsModels->map(function ($p) {
            return [
                'name' => $p->title,
                'price' => number_format($p->price, 0, '', ' '),
                'old_price' => null,
                'in_stock' => true,
                'new' => false,
            ];
        })->toArray();

        return view('product', [
            'title' => "{$product['name']} - Timber Home",
            'product' => $product,
            'similarProducts' => $similarProducts,
        ]);
    }
}
