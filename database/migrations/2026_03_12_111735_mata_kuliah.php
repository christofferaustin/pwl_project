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
        Schema::create('table_mata_kuliah', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('Jurusan_Id');
            $table->foreign('Jurusan_Id')
                ->references('id')
                ->on('table_jurusan');

            $table->string('Kode_Mata_Kuliah')->unique();
            $table->string('Nama_Mata_Kuliah');
            $table->integer('SKS');

            $table->unsignedBigInteger('Dosen_Id');
            $table->foreign('Dosen_Id')
                ->references('id')
                ->on('table_dosen'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_mata_kuliah');
    }
};