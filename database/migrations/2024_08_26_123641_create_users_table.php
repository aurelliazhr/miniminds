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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 50);
            $table->string('password', 255);
            $table->enum('kelas', ['B1', 'B2', 'B3']);
            $table->enum('role', ['guru', 'murid']);
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('stiker_id')->nullable();
            $table->timestamps();

            $table->foreign('stiker_id')->references('id')->on('stiker')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
