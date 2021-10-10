<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Class BaseSorter
 * @package App\Sorts
 * @author Ahmed Helal Ahmed
 */
class BaseSorter
{
    /**
     * The data that comes from request
     * @var array
     */
    private $frontendQuery;

    /**
     * BaseSorter constructor.
     * @param array $frontendQuery
     */
    public function __construct(array $frontendQuery)
    {
        $this->frontendQuery = $frontendQuery;
    }

    /**
     * @param Builder $builder
     * @param array $sorts
     * @return Builder
     */
    public function apply(Builder $builder, array $sorts): Builder
    {
        $targetSorters = $this->getTargetSorts($sorts);
        foreach ($targetSorters as $key => $sorter) {
            if (!($sorter instanceof Sorter)) {
                continue;
            }
            $sorter->apply($builder, $this->frontendQuery[$key]);
        }

        return $builder;
    }

    /**
     * @param array $sorters
     * @return array
     */
    private function getTargetSorts(array $sorters): array
    {
        return Arr::only($sorters, array_keys($this->frontendQuery));
    }
}
