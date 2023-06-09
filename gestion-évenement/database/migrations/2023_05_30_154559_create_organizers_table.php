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
        Schema::create('organizers', function (Blueprint $table) {
            $table->bigIncrements('id_organizer');
            $table->string('name_organizer');
            $table->text('description_organizer');
            $table->string('tel_organizer');
            $table->string('logo_organizer');
            $table->timestamps();
            //foreign keys
            $table->unsignedBigInteger('id_rib');
            $table->foreign('id_rib')->references('id_rib')->on('ribs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
