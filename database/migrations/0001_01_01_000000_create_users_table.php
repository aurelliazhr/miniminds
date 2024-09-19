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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('fullname', 50);
                $table->text('catatan')->nullable();
                $table->string('password', 10);
                $table->enum('kelas', ['B1', 'B2', 'B3']);
                $table->string('image')->nullable();
                $table->enum('role', ['guru', 'murid']); 
                $table->unsignedBigInteger('stiker_id')->nullable();
                $table->timestamps();

                $table->foreign('stiker_id')->references('id')->on('stiker')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
