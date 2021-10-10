<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;


interface Sorter
{
    public function apply(Builder $builder, $value): Builder;
}
