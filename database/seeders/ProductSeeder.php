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
            [
                'title' => 'Брус сосновый',
                'slug' => 'brus-sosnovyy',
                'description' => 'Сосновый брус для строительства. Доступный и надежный материал.',
                'price' => 1600.00,
                'image' => null,
            ],
            [
                'title' => 'Брус кедровый',
                'slug' => 'brus-kedrovyy',
                'description' => 'Кедровый брус премиум класса. Прочность и природная красота.',
                'price' => 3500.00,
                'image' => null,
            ],
            [
                'title' => 'Брус лиственничный',
                'slug' => 'brus-listvennichnyy',
                'description' => 'Лиственничный брус с высокой устойчивостью к влаге.',
                'price' => 2100.00,
                'image' => null,
            ],
            [
                'title' => 'Доска обрезная хвойная',
                'slug' => 'doska-obreznaya-khvoynaya',
                'description' => 'Обрезная доска из хвойных пород первого сорта.',
                'price' => 750.00,
                'image' => null,
            ],
            [
                'title' => 'Доска обрезная лиственная',
                'slug' => 'doska-obreznaya-listvennaya',
                'description' => 'Обрезная доска из лиственных пород для отделки.',
                'price' => 950.00,
                'image' => null,
            ],
            [
                'title' => 'Вагонка сосновая',
                'slug' => 'vagonka-sosnovaya',
                'description' => 'Сосновая вагонка для внутренней отделки.',
                'price' => 380.00,
                'image' => null,
            ],
            [
                'title' => 'Вагонка липовая',
                'slug' => 'vagonka-lipovaya',
                'description' => 'Липовая вагонка для бани и сауны.',
                'price' => 520.00,
                'image' => null,
            ],
            [
                'title' => 'Блокхаус сосновый',
                'slug' => 'blokhaus-sosnovyy',
                'description' => 'Блокхаус из сосны для фасадной отделки.',
                'price' => 580.00,
                'image' => null,
            ],
            [
                'title' => 'Имитация бруса дубовая',
                'slug' => 'imitatsiya-brusa-dubovaya',
                'description' => 'Имитация бруса из дуба для премиальной отделки.',
                'price' => 680.00,
                'image' => null,
            ],
            [
                'title' => 'Планкен лиственничный',
                'slug' => 'planken-listvennichnyy',
                'description' => 'Планкен из лиственницы для фасадов.',
                'price' => 780.00,
                'image' => null,
            ],
            [
                'title' => 'Евровагонка дубовая',
                'slug' => 'evrovagonka-dubovaya',
                'description' => 'Евровагонка из дуба высшего качества.',
                'price' => 550.00,
                'image' => null,
            ],
            [
                'title' => 'Профилированный брус клееный',
                'slug' => 'profilirovannyy-brus-kleenyy',
                'description' => 'Клееный профилированный брус с идеальной геометрией.',
                'price' => 4500.00,
                'image' => null,
            ],
            [
                'title' => 'Брус строганый',
                'slug' => 'brus-stroganyy',
                'description' => 'Строганый брус для точных строительных работ.',
                'price' => 2200.00,
                'image' => null,
            ],
            [
                'title' => 'Доска пола сосновая',
                'slug' => 'doska-pola-sosnovaya',
                'description' => 'Шпунтованная доска пола из сосны.',
                'price' => 850.00,
                'image' => null,
            ],
            [
                'title' => 'Бревно оцилиндрованное сосновое',
                'slug' => 'brevno-otsilindrovannoe-sosnovoe',
                'description' => 'Сосновое оцилиндрованное бревно для срубов.',
                'price' => 2400.00,
                'image' => null,
            ],
            [
                'title' => 'Брусок',
                'slug' => 'brusok',
                'description' => 'Брусок для мелких строительных работ.',
                'price' => 420.00,
                'image' => null,
            ],
            [
                'title' => 'Рейка',
                'slug' => 'reika',
                'description' => 'Рейка для отделочных работ.',
                'price' => 350.00,
                'image' => null,
            ],
            [
                'title' => 'Плинтус деревянный',
                'slug' => 'plintus-derevyannyy',
                'description' => 'Деревянный плинтус для отделки полов.',
                'price' => 280.00,
                'image' => null,
            ],
            [
                'title' => 'Наличник',
                'slug' => 'nalichnik',
                'description' => 'Наличник для оформления дверных и оконных проемов.',
                'price' => 320.00,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
