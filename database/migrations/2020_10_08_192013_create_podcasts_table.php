<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // following https://help.apple.com/itc/podcasts_connect/#/itcb54353390
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            // required things
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('language');
            $table->longText('categories');
            $table->boolean('explicit')->default(0);

            // recommended things
            $table->text('link')->nullable();
            $table->longText('author')->nullable();
            $table->longText('owner')->nullable();

            // situational things
            $table->string('itunes_title')->nullable();
            $table->boolean('itunes_type')->default(0);
            $table->string('copyright')->nullable();
            $table->text('new_feed_url')->nullable();
            $table->boolean('itunes_block')->default(0);
            $table->boolean('itunes_complete')->default(0);

            // spotify things
            $table->longText('spotify_restriction')->nullable();
            $table->integer('spotify_limit')->nullable();
            $table->string('spotify_country_of_origin')->nullable();

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
        Schema::dropIfExists('podcasts');
    }
}
