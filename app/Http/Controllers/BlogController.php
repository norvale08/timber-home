<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogPosts = [];
        for ($i = 1; $i <= 12; $i++) {
            $blogPosts[] = [
                'id' => $i,
                'title' => 'Заголовок новости',
                'description' => 'Место под короткое описание. Очевидно, что эффективный диаметp астатически притягивает космический поперечник',
                'date' => '24.07.2025',
            ];
        }

        return view('blog', [
            'title' => 'Блог - Timber Home',
            'blogPosts' => $blogPosts,
        ]);
    }
}
