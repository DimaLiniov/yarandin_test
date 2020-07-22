<?php

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
        DB::table('projects')->insert([
            'name' => str_random(10),
            'description' => str_random(20),
            'deadline' => mt_rand(2010,2030).'-'.mt_rand(1,12).'-'.mt_rand(1,28),
        ]);
        $this->call(UsersTableSeeder::class);
    }
}
