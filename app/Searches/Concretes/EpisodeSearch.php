<?php

namespace App\Searches\Concretes;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Searches\BaseSearchAndPaginate;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\{LengthAwarePaginator, Paginator};

class EpisodeSearch extends BaseSearchAndPaginate
{
    /**
     * @param  Request $request
     *
     * @return LengthAwarePaginator|Paginator
     */
    public function searchFromRequest(Request $request)
    {
        return QueryBuilder::for(Episode::class)
            ->defaultSort('title')
            ->allowedSorts([
                'id',
                'title',
                'air_date',
                'created_at',
                'updated_at',
            ])
            ->allowedFilters([
                'title',
                'air_date',
            ])
            ->with(['characters', 'quotes'])
            ->paginate($request->get('per_page'))
            ->appends($request->query());
    }
}
