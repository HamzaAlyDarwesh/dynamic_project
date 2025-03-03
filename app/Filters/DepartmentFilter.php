<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class DepartmentFilter extends Filter
{
    /**
     * @return string
     */
    protected function filterName(): string
    {
        return 'department';
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

        return $query->whereHas('attributeValues', function ($q) use ($operator, $value) {
            $q->where('value', $operator, $value)
                ->whereHas('attribute', function ($q) {
                    $q->where('name', 'department');
                });
        });
    }
}
