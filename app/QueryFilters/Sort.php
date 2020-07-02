<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class Sort
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('sort')) {
            return $next($request);
        }

        /** @var Builder $builder */
        $builder = $next($request);

        return $builder->orderBy('title', request('sort'));
    }
}
