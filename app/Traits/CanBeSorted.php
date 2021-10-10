<?php

namespace App\Traits;

use App\Sorts\BaseSorter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CanBeSorted
 * @package App\Traits
 */
trait CanBeSorted
{
    /**
     * @param Builder $builder
     * @param $sorters
     * @param $frontendQuery
     * @return Builder
     */
    public function scopeSorter(Builder $builder, $sorters, $frontendQuery): Builder
    {
        return (new BaseSorter($frontendQuery))->apply($builder, $sorters);
    }
}
