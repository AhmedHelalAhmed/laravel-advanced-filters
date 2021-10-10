<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;

class SerialSorter implements Sorter
{
    public function apply(Builder $builder, $value): Builder
    {
        if (!$value) {
            $value = 'asc';
        }

        return $builder->orderBy('serial', $value);
    }
}
