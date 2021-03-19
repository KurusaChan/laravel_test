<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Resources\EpisodeResource;
use App\Searches\Concretes\EpisodeSearch;
use Illuminate\{Http\JsonResponse, Http\Request};

class EpisodeController extends Controller
{

    /**
     * Get information about all episodes
     *
     * @param Request $request
     * @param EpisodeSearch $episodeSearch
     * @return JsonResponse
     */
    public function all(
        Request $request,
        EpisodeSearch $episodeSearch
    ): JsonResponse {
        return response()->json($episodeSearch->searchFromRequest($request));
    }

    /**
     * Get information about specific episode
     *
     * @param int $episodeId
     * @return JsonResponse
     */
    public function singleEpisode(
        int $episodeId
    ): JsonResponse {
        return response()->json(EpisodeResource::make(Episode::findOrFail($episodeId)));
    }

}
