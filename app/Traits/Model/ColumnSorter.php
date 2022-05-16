<?php

namespace App\Traits\Model;

use Illuminate\Http\Request;

trait ColumnSorter
{
    /**
     * Scope a query to only include based on a given columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSort($query, Request $request)
    {
        $query->sortByColumn($request);

        return $query;
    }

    /**
     * Scope a query to sort based on a given columns and direction.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortByColumn($query, Request $request, $sort_type = 'asc')
    {
        if ($columns = $request->get('sort')) {
            $columns = explode(',', $columns);
            foreach ($columns as $column) {
                if (\Schema::connection($this->connection)->hasColumn($this->table, $column)) {
                    $sort_type = ($request->has('sort_type')) ? $request->get('sort_type') : $sort_type ;
                    if ($sort_type=='asc') {
                        $query->orderBy($column, $sort_type);
                    } else {
                        $query->orderByDesc($column, $sort_type);
                    }
                }
            }
        } else {
            $query->latest();
        }

        return $query;
    }
}
