<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class NameFilter extends Filter
{

    /**
     * @return string
     */
    protected function filterName(): string
    {
        return 'name';
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    protected function applyFilter(Builder $query, array $filters): Builder
    {
        $operator = $this->getOperator($filters);
        $value = $this->getValue($filters);

        if ($operator === 'LIKE') {
            $value = '%' . $value . '%';
        }

        return $query->where('name', $operator, $value);
    }
}
