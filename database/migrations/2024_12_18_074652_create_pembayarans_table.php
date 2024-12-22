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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')->constrained('pemesanans')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->enum('metode_pembayaran', ['transfer', 'cash']);
            $table->decimal('jumlah_bayar', 10, 2);
            $table->enum('status_pembayaran', ['belum lunas', 'lunas'])->default('belum lunas'); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};