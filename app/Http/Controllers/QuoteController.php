<?php

namespace App\Http\Controllers;

use App\Searches\Concretes\QuoteSearch;
use Illuminate\Http\{JsonResponse, Request};

class QuoteController extends Controller
{

    /**
     * Get information about all quotes
     *
     * @param Request $request
     * @param QuoteSearch $quoteSearch
     * @return JsonResponse
     */
    public function all(
        Request $request,
        QuoteSearch $quoteSearch
    ): JsonResponse {
        return response()->json($quoteSearch->searchFromRequest($request));
    }

    /**
     * Get information about random quote
     *
     * @param Request $request
     * @param QuoteSearch $quoteSearch
     * @return JsonResponse
     */
    public function random(
        Request $request,
        QuoteSearch $quoteSearch
    ): JsonResponse {
        return response()->json($quoteSearch->searchFromRequest($request));
    }

}
