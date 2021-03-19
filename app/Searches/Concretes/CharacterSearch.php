<?php

namespace App\Searches\Concretes;

use App\Models\Character;
use Illuminate\Http\Request;
use App\Searches\BaseSearchAndPaginate;
use Spatie\QueryBuilder\{AllowedFilter, QueryBuilder};
use Illuminate\Contracts\Pagination\{LengthAwarePaginator, Paginator};

class CharacterSearch extends BaseSearchAndPaginate
{
    /**
     * @param  Request $request
     *
     * @return LengthAwarePaginator|Paginator
     */
    public function searchFromRequest(Request $request)
    {
        return QueryBuilder::for(Character::class)
            ->defaultSort('id')
            ->allowedSorts([
                'id',
                'name',
                'nickname',
                'portrayed',
                'img',
                'birthday_date',
                'occupations',
                'updated_at',
                'created_at',
            ])
            ->allowedFilters([
                AllowedFilter::exact('name'),
                'nickname',
                'portrayed',
                'img',
                'birthday_date',
                'occupations',
            ])
            ->with(['quotes', 'episodes'])
            ->paginate($request->get('per_page'))
            ->appends($request->query());
    }
}
