<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudiobooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiobooks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('author');
            $table->string('title');
            $table->string('book_series');
            $table->string('series_nr');
            $table->string('genre');
            $table->text('description_short');
            $table->text('description_large');
            $table->string('cover_image');
            $table->string('audio_file');








        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audiobooks');
    }
}
