<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogPosts = Article::take(12)->get()->map(function ($a, $index) {
            return [
                'id' => $a->id,
                'title' => $a->title,
                'description' => substr($a->content, 0, 100) . '...',
                'date' => $a->created_at->format('d.m.Y'),
            ];
        })->toArray();

        return view('blog', [
            'title' => 'Блог - Timber Home',
            'blogPosts' => $blogPosts,
        ]);
    }
}
