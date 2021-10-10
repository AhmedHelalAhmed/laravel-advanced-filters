<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class GenderFilter implements Filter
{
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('gender', 'like',  $value);
    }
}
