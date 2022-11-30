<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Person;
use App\Models\Sport;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SportSeeder::class,
        ]);

        Person::factory(10)->create();

        $sportsId = Sport::all(['id']);
        Person::All()->each(function ($person) use ($sportsId) {
            $person->sports()->attach(
                $sportsId->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
