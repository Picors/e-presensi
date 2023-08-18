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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id()->primaryKey();
            $table->char('nik')->nullable(false);
            $table->date('tgl_presensi')->nullable(false);
            $table->time('jam_in')->nullable(false);
            $table->time('jam_out')->nullable(true);
            $table->string('foto_in')->nullable(false);
            $table->string('foto_out')->nullable(true);
            $table->text('lokasi_in')->nullable(false);
            $table->text('lokasi_out')->nullable(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
