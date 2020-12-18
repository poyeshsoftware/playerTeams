<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        $admin = User::first();
        $this->actingAs($admin);
    }

    /**
     * @test
     */
    public function testAdminCanUpdatePlayer()
    {
        $player = Player::where('id', 1)->first();

        $data = [
            'name' => 'Thomas Müller Updated',
            'team_id' => 1
        ];

        $this->patch(route('players.update', $player->id), $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('players', [
            'name' => 'Thomas Müller Updated',
        ]);
    }

    /**
     * @test
     */
    public function testAdminCanDeletePlayer()
    {
        $player = Player::where('name', 'Marcel Schmelzer')->first();

        $this->delete(route('players.destroy', $player->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('players', [
            'name' => 'Marcel Schmelzer',
        ]);
    }

    /**
     * @test
     */
    public function testAdminCanMakePlayer()
    {
        $team = Team::where('name', 'Dortmund')->first();

        $data = [
            'name' => 'Marcel Schmelzer New',
            'team_id' => $team->id
        ];

        $this->post(route('players.store'), $data)
            ->assertStatus(201);

        $this->assertDatabaseHas('players', [
            'name' => 'Marcel Schmelzer New',
        ]);
    }

    /**
     * @test
     */
    public function testTeamsJsonStructureIsTrue()
    {
        $response = $this->get('/api/players');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'team' => [
                        'id',
                        'name'
                    ],
                ]
            ]
        ]);
        $response->assertSee('Oliver Kahn');
        $response->assertSee('Miroslav Klose');
        $response->assertSee('Marco Reus');
        $response->assertSee('Marcel Schmelzer');
    }

}
