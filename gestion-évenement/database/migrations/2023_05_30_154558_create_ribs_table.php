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
        Schema::create('ribs', function (Blueprint $table) {
            $table->bigIncrements('id_rib');
            $table->string('name_rib');
            $table->timestamps();
            //foreign keys
            $table->unsignedBigInteger('id_organizer');
            $table->foreign('id_organizer')->references('id_organizer')->on('organizers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ribs');
    }
};
