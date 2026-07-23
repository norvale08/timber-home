<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'title' => 'Welcome to Laravel',
            'message' => 'This is a Laravel project with Blade templates.'
        ]);
    }
}
