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
                'А также элементы политического процесса, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут функционально разнесены на независимые элементы. Следует отметить, что разбавленное изрядной долей эмпатии, рациональное мышление требует определения и уточнения вывода текущих активов. Есть над чем задуматься: ключевые особенности структуры проекта призывают нас к новым свершениям, которые, в свою очередь, должны быть своевременно верифицированы.',
                'Равным образом, убеждённость некоторых оппонентов представляет собой интересный эксперимент проверки экспериментов, поражающих по своей масштабности и грандиозности. В своём стремлении повысить качество жизни, они забывают, что перспективное планирование не оставляет шанса для инновационных методов управления процессами. Предварительные выводы неутешительны: дальнейшее развитие различных форм деятельности позволяет оценить значение соответствующих условий активизации.',
                'Безусловно, выбранный нами инновационный путь, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для новых принципов формирования материально-технической и кадровой базы.',
            ],
            'characteristics' => [
                ['name' => 'Характеристика', 'value' => 'Значение'],
                ['name' => 'Характеристика', 'value' => 'Значение'],
                ['name' => 'Характеристика', 'value' => 'Значение'],
                ['name' => 'Характеристика', 'value' => 'Значение'],
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
