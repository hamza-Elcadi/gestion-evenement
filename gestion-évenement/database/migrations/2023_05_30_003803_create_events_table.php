<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id_event');
            $table->string('title_event');
            $table->text('description_event');
            $table->date('date_start');
            $table->integer('duration');
            $table->string('location');
            $table->integer('nbr_place');
            $table->boolean('status');
            $table->timestamps();
            //foreign keys
            $table->integer('id_organizer');
            $table->integer('id_category');
            $table->foreach('id_category')->references('id_category')->on('categories')->onDelete('cascade');
            $table->foreach('id_organizer')->references('id_organizer')->on('organizers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
