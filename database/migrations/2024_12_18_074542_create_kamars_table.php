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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_kamar', 100); 
            $table->text('deskripsi_kamar')->nullable();
            $table->text('fasilitas')->nullable();
            $table->decimal('harga_kamar', 10, 2);
            $table->enum('status_kamar', ['tersedia', 'tersewa'])->default('tersedia');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
