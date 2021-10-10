<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexingUserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itGetUsers()
    {
        $response = $this->getJson(route('api.users.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function itFilterByName()
    {

        User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'ahmed'
        ]);

        $response = $this->getJson(route('api.users.index') . '?' . http_build_query([
                'name' => 'ahm',
            ]));

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $user->id);

    }

    /**
     * @test
     */
    public function itFilterByGender()
    {
        $maleCount = 2;
        User::factory($maleCount)->create([
            'gender' => User::GENDER_MALE
        ]);
        User::factory(5)->create([
            'gender' => User::GENDER_FEMALE
        ]);

        $response = $this->getJson(route('api.users.index') . '?' . http_build_query([
                'gender' => User::GENDER_MALE,
            ]));

        $response->assertOk()
            ->assertJsonCount($maleCount, 'data');

    }




}
