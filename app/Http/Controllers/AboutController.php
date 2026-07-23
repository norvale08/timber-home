<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('about', [
            'title' => 'About Us',
            'description' => 'Learn more about our Laravel project.'
        ]);
    }
}
