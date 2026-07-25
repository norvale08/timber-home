<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $articles = Article::paginate(12);

        $blogPosts = $articles->map(function ($a) {
            return [
                'id' => $a->id,
                'title' => $a->title,
                'description' => substr($a->content, 0, 100) . '...',
                'date' => $a->created_at->format('d.m.Y'),
            ];
        })->toArray();

        $totalPages = $articles->lastPage();
        $currentPage = $articles->currentPage();

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

        return view('blog', [
            'title' => 'Блог - Timber Home',
            'blogPosts' => $blogPosts,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'pages' => $pages,
        ]);
    }
}
