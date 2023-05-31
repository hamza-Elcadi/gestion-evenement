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
        Schema::create('role__users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');

            $table->primary(['id_role','id_user']);
        });
        Schema::rename('role__users', 'role_users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role__users');
    }
};
