<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            [
                'id' => 1,
                'name' => 'Thomas Müller',
                'team_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Oliver Kahn',
                'team_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Miroslav Klose',
                'team_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Marco Reus',
                'team_id' => 2,
            ],
            [
                'id' => 5,
                'name' => 'Marcel Schmelzer',
                'team_id' => 2,
            ],
        ];

        foreach ($items as $item) {
            Player::create($item);
        }
    }
}
