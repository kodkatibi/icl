<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_team_id');
            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('away_team_id');
            $table->foreign('away_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->dateTime('game_date')->nullable();
            $table->integer('week')->nullable();
            $table->unique(['home_team_id', 'away_team_id']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
