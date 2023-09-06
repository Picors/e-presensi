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
        Schema::create('jam_kerja', function (Blueprint $table) {
            $table->string('kode_jam_kerja', 4);
            $table->string('nama_jam_kerja', 15);
            $table->time('awal_jam_masuk')->nullable(true);
            $table->time('jam_masuk')->nullable(true);
            $table->time('akhir_jam_masuk')->nullable(true);
            $table->time('jam_pulang')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_kerja');
    }
};
