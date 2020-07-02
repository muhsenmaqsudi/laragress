<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class Active
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('active')) {
            return $next($request);
        }

        /** @var Builder $builder */
        $builder = $next($request);

        return $builder->where('active', request('active'));
    }
}
