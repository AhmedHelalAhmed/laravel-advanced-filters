<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Filter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
interface Filter
{
    public function apply(Builder $builder, $value): Builder;
}
