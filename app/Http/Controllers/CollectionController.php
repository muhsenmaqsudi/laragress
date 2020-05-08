<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class CollectionController extends Controller
{
    public function index()
    {

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $secondCollection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        $thirdCollection = collect(['name', 'age']);

        $average = $collection->avg();
        $chunks = $collection->chunk(4);

        $collapsed = $secondCollection->collapse();

        $combined = $thirdCollection->combine(['George', 29]);


        $lazyCollection = LazyCollection::make(function () {
            yield 1;
            yield 2;
            yield 3;
        });

        $collection = $lazyCollection->collect();
        get_class($collection);



        return view('collection.index');
    }
}
