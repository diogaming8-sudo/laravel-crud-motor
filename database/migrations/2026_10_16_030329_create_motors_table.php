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
    Schema::create('motors', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');
        $table->decimal('harga', 12, 2);
        $table->integer('qty');
        $table->string('gambar')->nullable(); // <-- Tambahan kolom gambar
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
