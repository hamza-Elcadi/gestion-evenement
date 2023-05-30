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
            $table->unsignedBigInteger('id_event')->primary();
            $table->string('title_event');
            $table->text('description_event');
            $table->date('date_start');
            $table->integer('duration');
            $table->string('location');
            $table->integer('nbr_place');
            $table->boolean('status');
            $table->timestamps();
            //foreign keys
            $table->unsignedBigInteger('id_organizer');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('cascade');
            $table->foreign('id_organizer')->references('id_organizer')->on('organizers')->onDelete('cascade');

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
