<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class RoleTitleSorter
 * @package App\Sorts
 * @author Ahmed Helal Ahmed
 */
class RoleTitleSorter implements Sorter
{
    public function apply(Builder $builder, $value): Builder
    {
        if (!$value) {
            $value = 'asc';
        }

        return $builder
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->orderBy('roles.title', $value)
            ->select('users.*');
    }
}
