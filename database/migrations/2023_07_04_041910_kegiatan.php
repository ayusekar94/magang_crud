<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->date('tgl');
            $table->text('kegiatan');
            $table->timestamps();

            # Relasi
            $table->unsignedBigInteger('karyawan_nip');
            $table->foreign('karyawan_nip')->references('NIP')->on('karyawans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
};
