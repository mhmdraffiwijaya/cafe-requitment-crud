<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapelamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapelamar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->text('nama');
            $table->text('email');
            $table->text('alamat');
            $table->text('agama');
            $table->text('jenisk');
            $table->text('fotopelamar');
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
        Schema::dropIfExists('datapelamars');
    }
}
