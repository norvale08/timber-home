<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'Брус дубовый',
                'slug' => 'brus-dubovyy',
                'description' => 'Высококачественный дубовый брус для строительства домов. Естественная влажность, камерная сушка.',
                'price' => 2500.00,
                'image' => null,
            ],
            [
                'title' => 'Доска обрезная',
                'slug' => 'doska-obreznaya',
                'description' => 'Обрезная доска из хвойных пород. Идеально подходит для отделки и строительства.',
                'price' => 800.00,
                'image' => null,
            ],
            [
                'title' => 'Вагонка',
                'slug' => 'vagonka',
                'description' => 'Вагонка из лиственницы для внутренней и внешней отделки. Экологически чистый материал.',
                'price' => 450.00,
                'image' => null,
            ],
            [
                'title' => 'Блокхаус',
                'slug' => 'blokhaus',
                'description' => 'Блокхаус имитирует бревенчатую стену. Прочный и долговечный материал для фасадов.',
                'price' => 650.00,
                'image' => null,
            ],
            [
                'title' => 'Имитация бруса',
                'slug' => 'imitatsiya-brusa',
                'description' => 'Имитация бруса для отделки помещений. Красивый внешний вид и простота монтажа.',
                'price' => 550.00,
                'image' => null,
            ],
            [
                'title' => 'Планкен',
                'slug' => 'planken',
                'description' => 'Планкен для фасадных работ. Защищает от влаги и придает зданию современный вид.',
                'price' => 720.00,
                'image' => null,
            ],
            [
                'title' => 'Евровагонка',
                'slug' => 'evrovagonka',
                'description' => 'Евровагонка премиум качества. Идеальная геометрия и гладкая поверхность.',
                'price' => 480.00,
                'image' => null,
            ],
            [
                'title' => 'Профилированный брус',
                'slug' => 'profilirovannyy-brus',
                'description' => 'Профилированный брус для строительства домов. Точное соединение и отличная теплоизоляция.',
                'price' => 3200.00,
                'image' => null,
            ],
            [
                'title' => 'Брус еловый',
                'slug' => 'brus-elovyy',
                'description' => 'Еловый брус для каркасного строительства. Легкий и прочный материал.',
                'price' => 1800.00,
                'image' => null,
            ],
            [
                'title' => 'Доска пола',
                'slug' => 'doska-pola',
                'description' => 'Шпунтованная доска пола из дуба. Долговечное и красивое напольное покрытие.',
                'price' => 1200.00,
                'image' => null,
            ],
            [
                'title' => 'Бревно оцилиндрованное',
                'slug' => 'brevno-otsilindrovannoe',
                'description' => 'Оцилиндрованное бревно для срубов. Идеальная форма и минимальная усадка.',
                'price' => 2800.00,
                'image' => null,
            ],
            [
                'title' => 'Лаги',
                'slug' => 'lagi',
                'description' => 'Лаги из хвойных пород для устройства полов. Высокая несущая способность.',
                'price' => 650.00,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
