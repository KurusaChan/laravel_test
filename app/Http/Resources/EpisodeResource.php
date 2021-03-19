<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'       => $this->id,
            'title'    => $this->title,
            'air_date' => $this->air_date,
            'quotes'   => QuoteResource::collection(
                $this->whenLoaded(
                    'quotes',
                    $this->quotes,
                    [],
                )
            ),
            'characters'   => CharacterResource::collection(
                $this->whenLoaded(
                    'characters',
                    $this->characters,
                    [],
                )
            ),
        ];
    }

}
