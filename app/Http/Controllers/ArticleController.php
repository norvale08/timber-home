<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ArticleController extends Controller
{
    public function show(int $id): View
    {
        $article = [
            'id' => $id,
            'category' => 'Категория',
            'title' => 'Категория',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'imageCaption' => 'Фотография',
            'sections' => [
                [
                    'type' => 'text',
                    'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                ],
                [
                    'type' => 'heading2',
                    'content' => 'Заголовок второго уровня'
                ],
                [
                    'type' => 'text',
                    'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'Первый пункт списка',
                        'Второй пункт списка',
                        'Третий пункт списка'
                    ]
                ],
                [
                    'type' => 'heading3',
                    'content' => 'Заголовок третьего уровня'
                ],
                [
                    'type' => 'text',
                    'content' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                ],
            ],
        ];

        return view('article', [
            'title' => "{$article['title']} - Timber Home",
            'article' => $article,
        ]);
    }
}
