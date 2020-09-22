<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_lab', function (Blueprint $table) {
            $table->increments('id_pinjamL');
            $table->string('nama_lab', 30);
            $table->string('nama_peminjam', 40);
            $table->string('nim', 35);
            $table->string('keperluan', 30);
            $table->string('status', 20);
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->time('jam_pinjam');
            $table->time('jam_kembali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_lab');
    }
}
