<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait CollectionMethods
{
    public function getCollectionData($value): Collection
    {
        switch ($value) {
            case 'all':
                return collect([1, 2, 3]);
                break;
            case 'avg':
                return collect([1, 2, 3, 4]);
                break;
            case 'chunk':
                return collect([1, 2, 3, 4, 5, 6, 7]);
                break;
            case 'collapse':
                return collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
                break;
            case 'combine':
                return collect(['name', 'age']);
                break;
            default:
                return collect([1,2]);
                break;
        }
    }

    public function all()
    {
        $collection = $this->getCollectionData('all');
        return $collection->all();
    }

    public function avg()
    {
        $collection = $this->getCollectionData('avg');
        return $collection->avg();
    }

    public function chunk()
    {
        $collection = $this->getCollectionData('chunk');
        $chunks = $collection->chunk(4);
        return $chunks->toArray();

//        @foreach ($products->chunk(3) as $chunk)
//        <div class="row">
//        @foreach ($chunk as $product)
//                <div class="col-xs-4">{{ $product->name }}</div>
//        @endforeach
//        </div>
//        @endforeach
    }

    public function collapse()
    {
        $collection = $this->getCollectionData('collapse');
        $collapsed = $collection->collapse();
        return $collapsed->all();
    }

    public function combine()
    {
        $collection = $this->getCollectionData('combine');
        $combined = $collection->combine(['George', 29]);
        return $combined->all();
    }
}
