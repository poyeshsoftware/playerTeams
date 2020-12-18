<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TeamControllerTest extends TestCase
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
    public function testAdminCanUpdateTeam()
    {
        $team = Team::where('id', 1)->first();

        $data = [
            'name' => 'FC Bayern Munich Updated',
        ];

        $this->patch(route('teams.update', $team->id), $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('teams', [
            'name' => 'FC Bayern Munich Updated',
        ]);
    }

    /**
     * @test
     */
    public function testAdminCanDeleteTeam()
    {
        $team = Team::where('name', 'Dortmund')->first();

        $this->delete(route('teams.destroy', $team->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('teams', [
            'name' => 'Dortmund',
        ]);
    }

    /**
     * @test
     */
    public function testAdminCanMakeTeam()
    {
        $data = [
            'name' => 'Dortmund New'
        ];

        $this->post(route('teams.store'), $data)
            ->assertStatus(201);

        $this->assertDatabaseHas('teams', [
            'name' => 'Dortmund New',
        ]);
    }

    /**
     * @test
     */
    public function testTeamsJsonStructureIsTrue()
    {
        $response = $this->get('/api/teams');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ]
            ]
        ]);
        $response->assertSee('FC Bayern Munich');
        $response->assertSee('Dortmund');
    }
}
