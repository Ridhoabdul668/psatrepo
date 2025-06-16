<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Pegawai
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan'); // contoh: admin, pemberi_tugas, penerima_tugas
            $table->timestamps();
        });

        // Tabel Login (Autentikasi)
        Schema::create('tb_login', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('tb_pegawai')->onDelete('cascade');
            $table->string('kata_sandi'); // bisa diganti jadi hashed password
            $table->timestamps();
        });

        // Tabel To-Do
        Schema::create('tb_todo', function (Blueprint $table) {
            $table->id();
            $table->string('tugas');
            $table->dateTime('waktu_selesai');
            $table->foreignId('tugas_dari')->constrained('tb_pegawai')->onDelete('cascade');
            $table->foreignId('tugas_untuk')->constrained('tb_pegawai')->onDelete('cascade');
            $table->enum('status', ['Pending', 'Sedang Dikerjakan', 'Selesai'])->default('Pending');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Tabel Hasil Tugas
        Schema::create('tb_hasiltugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_id')->constrained('tb_todo')->onDelete('cascade');
            $table->text('tanggapan')->nullable();
            $table->date('tanggal_penanganan')->nullable();
            $table->enum('status_selesai', ['Pending', 'Sedang Dikerjakan', 'Selesai'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_hasiltugas');
        Schema::dropIfExists('tb_todo');
        Schema::dropIfExists('tb_login');
        Schema::dropIfExists('tb_pegawai');
    }
};
