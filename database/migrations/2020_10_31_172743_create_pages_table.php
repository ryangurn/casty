<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id')->nullable()->constrained('podcasts');
            $table->foreignId('episode_id')->nullable()->constrained('episodes');
            $table->foreignId('team_id')->constrained('teams');
            $table->foreignId('author_id')->constrained('users');
            $table->string('title');
            $table->string('slug');
            $table->longText('metadata')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
