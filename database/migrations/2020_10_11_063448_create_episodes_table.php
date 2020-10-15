<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id')->constrained('podcasts');
            $table->string('title');
            $table->text('enclosure');
            $table->string('guid')->nullable();
            $table->timestamp('publishing_date')->nullable();
            $table->text('description')->nullable();

            // calculate itunes:duration using file (https://stackoverflow.com/questions/46034586/how-to-get-duration-of-mp3-file-in-laravel-5-5)

            $table->text('link')->nullable();
            $table->string('image')->nullable();
            $table->boolean('explicit')->nullable();

            // itunes situational
            $table->string('itunes_title')->nullable();
            $table->integer('itunes_episode_number')->nullable();
            $table->integer('itunes_season_number')->nullable();
            $table->tinyInteger('itunes_episode_type')->default(0); // 0:full|1:trailer|2:bonus
            $table->boolean('itunes_block')->default(0);

            $table->longText('spotify_restriction')->nullable();
            $table->integer('order')->nullable();
            // part of dcterms:valid for spotify
            $table->timestamp('spotify_start')->nullable();
            $table->timestamp('spotify_end')->nullable();
            $table->longText('spotify_chapters')->nullable(); // include start (seconds), title (string), href (string), image (string)
            $table->longText('spotify_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
