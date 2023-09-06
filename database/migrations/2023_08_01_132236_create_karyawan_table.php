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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama_lengkap',100)->nullable(false);
            $table->string('jabatan',20)->nullable(false);
            $table->string('no_hp',13)->nullable(false);
            $table->string('foto',30)->nullable(true);
            $table->char('kode_dept',3)->nullable(false);
            $table->char('kode_cabang',3)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('remember_token')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
