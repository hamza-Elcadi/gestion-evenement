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
        Schema::create('imageEvents', function (Blueprint $table) {
            $table->bigIncrements('id_image');
            $table->string('name_image');
            $table->timestamps();
            //foreign keys
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_events');
    }
};
