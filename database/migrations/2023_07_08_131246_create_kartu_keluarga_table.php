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
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('kepala_keluarga');
            $table->integer('no_kk')->unique();
            $table->text('alamat');
            $table->string('rt_rw');
            $table->string('desa')->default('Ciomas');
            $table->string('kecamatan')->default('Panjalu');
            $table->string('kabupaten')->default('Ciamis');
            $table->integer('kode_pos')->default(46264);
            $table->string('provinsi')->default('Jawa Barat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};
