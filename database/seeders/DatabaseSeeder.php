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
//            PersonSeeder::class,
            SportSeeder::class,
        ]);
        Person::factory(10)->create();
        $sports = Sport::all(['id']);

        Person::All()->each(function ($person) use ($sports) {
            $person->sports()->attach(
                $sports->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
