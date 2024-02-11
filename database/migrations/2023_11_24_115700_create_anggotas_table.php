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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->enum('jeniskelamin', ['L', 'P'])->nullable();
            $table->date('tgl')->nullable();
            $table->enum('jenis', ['Baru', 'Lama'])->nullable();
            $table->enum('kategori', ['Makanan', 'Minuman', 'Sembako', 'Jasa'])->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
