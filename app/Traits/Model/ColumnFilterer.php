<?php

namespace App\Traits\Model;

use Illuminate\Http\Request;

trait ColumnFilterer
{
    /**
     * Scope a query to only include based on a given columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, Request $request)
    {
        $query->filterByColumn($request);
        $query->filterByKeyword($request);

        return $query;
    }

    /**
     * Scope a query to only include based on a given columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByColumn($query, Request $request)
    {
        $attribute = $request->query();

        $columns = $this->fillable;

        foreach ($columns as $column) {
            if (isset($attribute[$column]) && empty($attribute[$column])==false) {
                $attribute[$column] == "null" ? $query->whereNull($column) : $query->where($column, $attribute[$column]);
            }
        }

        return $query;
    }

    /**
     * Scope a query to only include based on a given columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByKeyword($query, Request $request)
    {
        if ($keyword = $request->get('search')) {
            $query->where(function($query) use ($keyword) {
                if (isset($this->searchable)) {
                    $query->where($this->searchable[0], 'like', '%' . $keyword . '%');
                    for ($i=1; $i < count($this->searchable); $i++) {
                        $query->orWhere($this->searchable[$i], 'like', '%' . $keyword . '%');
                    }
                } else {
                    $query->where($this->searchable[0], 'like', '%' . $keyword . '%');
                    for ($i=1; $i < count($this->fillable); $i++) {
                        $query->orWhere($this->fillable[$i], 'like', '%' . $keyword . '%');
                    }
                }
            });
        }

        return $query;
    }
}
