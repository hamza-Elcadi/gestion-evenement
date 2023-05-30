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
        Schema::create('event__partners', function (Blueprint $table) {
            $table->unsignedBigInteger('id_event');
            $table->unsignedBigInteger('id_partner');

            $table->foreign('id_event')->references('id_event')->on('Event')->onDelete('cascade');
            $table->foreign('id_partner')->references('id_partner')->on('Partner')->onDelete('cascade');

            $table->primary(['id_event', 'id_partner']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event__partners');
    }
};
