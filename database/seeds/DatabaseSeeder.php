<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(\SocialApp\Models\User::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
