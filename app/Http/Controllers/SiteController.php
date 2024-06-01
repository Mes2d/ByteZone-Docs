<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Space;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category', compact('category'));
    }

    public function space($space)
    {
        $space = Space::where('slug', $space)->first();
        return view('docs', compact('space'));
    }
}
