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
            $table->bigInteger('no_kk')->unique();
            $table->text('alamat')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('desa')->default('Ciomas')->nullable();
            $table->string('kecamatan')->default('Panjalu')->nullable();
            $table->string('kabupaten')->default('Ciamis')->nullable();
            $table->integer('kode_pos')->default(46264)->nullable();
            $table->string('provinsi')->default('Jawa Barat')->nullable();
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
