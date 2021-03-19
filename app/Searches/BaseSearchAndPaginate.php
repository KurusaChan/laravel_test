<?php

namespace App\Searches;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

/**
 * Class BaseSearch
 *
 * Handles pagination and search for the data
 */
abstract class BaseSearchAndPaginate
{
    /**
     * @param  Request $request
     *
     * @return Paginator
     */
    abstract public function searchFromRequest(Request $request);
}
