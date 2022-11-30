<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $sports = ['football', 'basketball', 'hockey', 'box', 'chess', 'tennis', 'badminton', 'billiard', 'taekwondo'];

        foreach ($sports as $sport) {
            Sport::create([
                'name' => $sport
             ]);
        }
    }
}
