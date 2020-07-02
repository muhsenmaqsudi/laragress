<?php


namespace App\QueryFilters;


use Illuminate\Database\Eloquent\Builder;

class MaxCount extends Filter
{

    protected function applyFilter(Builder $builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
