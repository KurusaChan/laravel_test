<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Http\Resources\CharacterResource;
use App\Searches\Concretes\CharacterSearch;
use Illuminate\Http\{JsonResponse, Request};

class CharacterController extends Controller
{

    /**
     * Get information about all characters
     *
     * @param Request $request
     * @param CharacterSearch $characterSearch
     * @return JsonResponse
     */
    public function all(
        Request $request,
        CharacterSearch $characterSearch
    ): JsonResponse {
        return response()->json($characterSearch->searchFromRequest($request));
    }

    /**
     * Get information about random character
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function random(
        Request $request
    ): JsonResponse {
        return response()->json(CharacterResource::make(Character::inRandomOrder()->first()));
    }

}
