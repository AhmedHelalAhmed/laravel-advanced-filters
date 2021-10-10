<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class NameFilter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
class NameFilter implements Filter
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('name', 'like', '%' . $value . '%');
    }
}
