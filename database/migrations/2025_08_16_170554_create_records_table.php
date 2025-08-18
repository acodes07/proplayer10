<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->string('player_name');
            $table->string('opponent');
            $table->decimal('overall_rating', 3, 1); // 3 digits total, 1 decimal place (e.g., 8.5)
            $table->integer('goals_scored');
            $table->integer('total_fouls');
            $table->integer('match_time_played'); // in minutes
            $table->integer('assists');
            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->string('match_date');
            $table->string('venue');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('player_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
