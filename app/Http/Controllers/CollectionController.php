<?php

namespace App\Http\Controllers;

use App\Traits\CollectionMethods;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    use CollectionMethods;

    public function index()
    {
        return view('collection.index');
    }
}
