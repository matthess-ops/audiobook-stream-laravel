<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class AudioBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // $table->timestamps();
    // $table->string('author');
    // $table->string('title');
    // $table->string('book_series');
    // $table->string('series_nr');
    // $table->string('genre');
    // $table->text('description_short');
    // $table->text('description_large');
    // $table->string('cover_image');
    // $table->string('audio_file');



    public function run()
    {
      for ($audioBook=1; $audioBook < 6; $audioBook++) {
        DB::table('audiobooks')->insert([
            'author' => "author-audiobook_".$audioBook,
            'title' => "title-audiobook_".$audioBook,
            'book_series' => "book_series-audiobook_".$audioBook,
            'series_nr' => "series_nr-audiobook_".$audioBook,
            'genre' => "genre_series-audiobook_".$audioBook,
            'description_short' => "description_short-audiobook_".$audioBook,
            'description_large' => "description_large-audiobook_".$audioBook,
            'cover_image' => "cover_image'-audiobook_".$audioBook,
            'audio_file' => "audio_file-audiobook_".$audioBook,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
      }



    }
}
