<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\TravelPackage;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari model ArticleNews
        $articles = ArticleNews::latest()->get();

        $items = TravelPackage::with(['galleries', 'testimonials'])->get();
        return view('pages.home', [
            'items' => $items,
            'articles' => $articles
        ]);
    }
}
