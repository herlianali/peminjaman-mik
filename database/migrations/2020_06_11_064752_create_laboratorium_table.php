<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorium', function (Blueprint $table) {
            $table->increments('id_lab');
            $table->string('nama_lab', 30);
            $table->string('aslab', 45);
            $table->string('kapasitas', 20);
            $table->string('fasilitas', 40);
            $table->string('foto', 255);
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
        Schema::dropIfExists('laboratorium');
    }
}
