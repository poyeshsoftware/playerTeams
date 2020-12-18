<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
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
                'name' => 'FC Bayern Munich',
            ],
            [
                'id' => 2,
                'name' => 'Dortmund',
            ],
        ];

        foreach ($items as $item) {
            Team::create($item);
        }
    }
}
