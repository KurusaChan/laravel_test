<?php

namespace Tests\Feature;

use App\Models\Character;
use Illuminate\Support\Arr;
use Tests\ApiTestCase;

/**
 * Class CharacterApiTest
 * @package Tests\Feature
 */
class CharacterApiTest extends ApiTestCase
{

    public function testItSearchesForAllCharacters(): void
    {
        /** PREPARE */
        $this->actingAsUserWithJWT();
        Character::factory()->count(100)->create();

        /** EXECUTE */
        $response = $this->get(route('api.characters.all', [], false), array_merge($this->authHeaders, [
            'Accept' => 'application/json'
        ]));

        /** ASSERT */
        $this->assertEquals(1, Arr::get($response, 'total'));
        $this->assertEquals(1, Arr::get($response, 'to'));
        $this->assertCount(1, Arr::get($response, 'data'));
        $this->assertEquals(100, Character::all()->count());
    }

    public function testItSearchesForCharacterByName(): void
    {
        /** PREPARE */
        $this->actingAsUserWithJWT();
        Character::factory()->count(100)->create();
        $myCharacter = Character::factory([
            'name'        => 'I\'ve been looking for you all my life',
            'nickname'    => 'nickname',
            'portrayed'   => 'test',
            'occupations' => json_encode([
                'test'
            ]),
        ])->create();

        /** EXECUTE */
        $response = $this->get(route('api.characters.all', [
            'filter[name]' => $myCharacter->name,
        ]), array_merge($this->authHeaders, [
            'Accept' => 'application/json'
        ]));

        /** ASSERT */
        $this->assertEquals(1, Arr::get($response, 'total'));
        $this->assertEquals($myCharacter->name, Arr::get($response, 'data')[0]['name']);
        $this->assertEquals($myCharacter->portrayed, Arr::get($response, 'data')[0]['portrayed']);
    }

}
