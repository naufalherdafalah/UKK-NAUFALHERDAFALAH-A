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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengaduan');
            $table->date('tgl_selesai')->nullable();
            $table->string('nik', 16);
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['0', 'Proses', 'Selesai']);
            $table->enum('akses', ['private', 'public']);
            $table->enum('kategori', ['lingkungan', 'sosial', 'agama']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
