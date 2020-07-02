<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Sort extends Filter
{
    protected function applyFilter(Builder $builder)
    {
        return $builder->orderBy('title', request($this->filterName()));
    }
}
