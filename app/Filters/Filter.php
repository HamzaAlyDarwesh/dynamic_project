<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    /**
     * Apply the filter to the query.
     */
    public function handle(Builder $query, $next, array $filters = [])
    {
        if (!$this->shouldFilter($filters)) {
            return $next($query);
        }

        $query = $this->applyFilter($query, $filters);

        return $next($query);
    }

    /**
     * Check if the filter should be applied.
     */
    protected function shouldFilter(array $filters)
    {
        return isset($filters[$this->filterName()]);
    }

    /**
     * Get the filter name (e.g., 'name', 'department').
     */
    abstract protected function filterName();

    /**
     * Apply the filter logic to the query.
     */
    abstract protected function applyFilter(Builder $query, array $filters);

    /**
     * Get the filter value from the request.
     */
    protected function getValue(array $filters)
    {
        return $filters[$this->filterName()];
    }

    /**
     * Get the filter operator from the request.
     */
    protected function getOperator(array $filters)
    {
        return $filters[$this->filterName() . '_operator'] ?? '=';
    }
}
