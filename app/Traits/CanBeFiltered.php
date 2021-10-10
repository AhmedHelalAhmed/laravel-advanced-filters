<?php

namespace App\Traits;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CanBeFiltered
 * @package App\Traits
 */
trait CanBeFiltered
{
    /**
     * @param Builder $builder
     * @param $filters
     * @param $frontendQuery
     * @return Builder
     */
    public function scopeFilter(Builder $builder, $filters, $frontendQuery): Builder
    {
        return (new BaseFilter($frontendQuery))->apply($builder, $filters);
    }
}
