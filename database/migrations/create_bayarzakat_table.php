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
        Schema::create('bayarzakat', function (Blueprint $table) {
            $table->id('id_zakat');
            $table->string('nama_kk');
            $table->integer('jumlah_tanggungan');
            $table->enum('jenis_bayar', ['beras', 'uang']);
            $table->float('bayar_beras')->nullable();
            $table->decimal('bayar_uang', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayarzakat');
    }
}; 