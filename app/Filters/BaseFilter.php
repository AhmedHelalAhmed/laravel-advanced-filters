<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Class BaseFilter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
class BaseFilter
{
    /**
     * The data that comes from request
     * @var array
     */
    private $frontendQuery;

    /**
     * BaseFilter constructor.
     * @param array $frontendQuery
     */
    public function __construct(array $frontendQuery)
    {
        $this->frontendQuery = $frontendQuery;
    }

    /**
     * @param Builder $builder
     * @param array $filters
     * @return Builder
     */
    public function apply(Builder $builder, array $filters): Builder
    {
        $targetFilters = $this->getTargetFilters($filters);
        foreach ($targetFilters as $key => $filter) {
            if (!($filter instanceof $filter)) {
                continue;
            }
            $filter->apply($builder, $this->frontendQuery[$key]);
        }

        return $builder;
    }

    /**
     * @param array $filters
     * @return array
     */
    private function getTargetFilters(array $filters): array
    {
        return Arr::only($filters, array_keys($this->frontendQuery));
    }
}
