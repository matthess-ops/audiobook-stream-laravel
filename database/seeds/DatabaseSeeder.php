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
        // User::factory()->create();
        factory(App\User::class)->create(['is_admin'=>true,'name' => 'isadmin', 'email' => 'isadmin@gmail.com', 'password' => bcrypt('password')]);
        factory(App\User::class)->create(['is_admin'=>false,'name' => 'isnotadmin', 'email' => 'isnotadmin@gmail.com', 'password' => bcrypt('password')]);
        $this->call([
            AudioBookSeeder::class,
            PlayListSeeder::class,

        ]);




    }
}
