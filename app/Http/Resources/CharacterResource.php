<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'nickname'      => $this->nickname,
            'portrayed'     => $this->portrayed,
            'img'           => $this->img,
            'birthday_date' => $this->birthday_date,
            'occupations'   => $this->occupations,
            'quotes'   => QuoteResource::collection(
                $this->whenLoaded(
                    'quotes',
                    $this->quotes,
                    [],
                )
            ),
            'episodes'   => EpisodeResource::collection(
                $this->whenLoaded(
                    'episodes',
                    $this->episodes,
                    [],
                )
            ),
        ];
    }

}
