<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategories = \App\Category::where('parent_id',null)->get();
        return view('category.categoryTreeview', compact('parentCategories'));
    }
}
