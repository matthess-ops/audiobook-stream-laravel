<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PlayListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // $table->id();
    // $table->timestamps();
    // $table->string('user_id');
    // $table->string('audiobook_id');
    // $table->integer('current_time');

    //user_id 1 is currently listening to three audiobooks. Of which book 1 is the last listened to
    // user_id 2  is currently listening to three audiobooks
    public function run()
    {
            DB::table('playlists')->insert([
                'user_id' => "1",
                'audiobook_id' => "1",
                'current_time'=>5,
                'is_last_played'=>true,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

            DB::table('playlists')->insert([
                'user_id' => "1",
                'audiobook_id' => "2",
                'current_time'=>5,
                'is_last_played'=>false,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

            DB::table('playlists')->insert([
                'user_id' => "1",
                'audiobook_id' => "3",
                'current_time'=>5,
                'is_last_played'=>false,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

            DB::table('playlists')->insert([
                'user_id' => "2",
                'audiobook_id' => "1",
                'current_time'=>5,
                'is_last_played'=>false,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

            DB::table('playlists')->insert([
                'user_id' => "2",
                'audiobook_id' => "4",
                'current_time'=>5,
                'is_last_played'=>false,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

            DB::table('playlists')->insert([
                'user_id' => "2",
                'audiobook_id' => "5",
                'current_time'=>5,
                'is_last_played'=>false,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);

    }
}
