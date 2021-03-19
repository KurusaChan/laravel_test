<?php

namespace App\Searches\Concretes;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Searches\BaseSearchAndPaginate;
use Spatie\QueryBuilder\{AllowedFilter, QueryBuilder};
use Illuminate\Contracts\Pagination\{LengthAwarePaginator, Paginator};

class QuoteSearch extends BaseSearchAndPaginate
{
    /**
     * @param  Request $request
     *
     * @return LengthAwarePaginator|Paginator
     */
    public function searchFromRequest(Request $request)
    {
        return QueryBuilder::for(Quote::class)
            ->inRandomOrder()
            ->allowedSorts([
                'id',
                'episode_id',
                'character_id',
                'quote',
                'updated_at',
                'created_at',
            ])
            ->allowedFilters([
                AllowedFilter::exact('character.name'),
            ])
            ->with(['episode', 'character'])
            ->paginate($request->get('per_page'))
            ->appends($request->query());
    }
}
