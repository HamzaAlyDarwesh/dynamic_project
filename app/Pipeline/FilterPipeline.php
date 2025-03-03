<?php

namespace App\Pipeline;


use Illuminate\Database\Eloquent\Builder;

class FilterPipeline
{
    protected $filters = [];

    /**
     * @param $filter
     * @return $this
     */
    public function add($filter): self
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function apply(Builder $query, array $filters = []): Builder
    {
        return array_reduce(
            $this->filters,
            function ($query, $filter) use ($filters) {
                return $filter->handle($query, fn($query) => $query, $filters);
            },
            $query
        );
    }
}
