<?php

namespace Tests\Feature;

use App\Models\Episode;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Tests\ApiTestCase;

/**
 * Class EpisodeApiTest
 * @package Tests\Feature
 */
class EpisodeApiTest extends ApiTestCase
{

    public function testItSearchesForAllEpisodes(): void
    {
        /** PREPARE */
        $this->actingAsUserWithJWT();
        Episode::factory()->count(100)->create();

        /** EXECUTE */
        $response = $this->get(route('api.episodes.all'), array_merge($this->authHeaders, [
            'Accept' => 'application/json'
        ]));

        /** ASSERT */
        $this->assertEquals(1, Arr::get($response, 'total'));
        $this->assertEquals(1, Arr::get($response, 'to'));
        $this->assertCount(1, Arr::get($response, 'data'));
        $this->assertEquals(100, Episode::all()->count());
    }

    public function testItSearchesForEpisodeById(): void
    {
        /** PREPARE */
        $this->actingAsUserWithJWT();
        Episode::factory()->count(100)->create();
        $myEpisode = Episode::factory([
            'title'    => 'I\'ve been looking for you all my life',
            'air_date' => Carbon::now(),
        ])->create();

        /** EXECUTE */
        $response = $this->get(route('api.episodes.singleEpisode', [
            'episode_id' => $myEpisode->id,
        ]), array_merge($this->authHeaders, [
            'Accept' => 'application/json'
        ]));

        /** ASSERT */
        $this->assertEquals(1, Arr::get($response, 'total'));
        $this->assertEquals($myEpisode->title, Arr::get($response, 'data')[0]['title']);
        $this->assertEquals($myEpisode->air_date, Arr::get($response, 'data')[0]['air_date']);
    }

}
