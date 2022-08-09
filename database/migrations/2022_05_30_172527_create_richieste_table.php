<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRichiesteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('richieste', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->date('data_richiesta')->index();
            $table->date('data_risposta')->index()->nullable();
            $table->integer('stato')->index();
            $table->integer('locatario')->references('id')->on('users');
            $table->integer('id_alloggio')->references('id')->on('alloggi');
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
        Schema::dropIfExists('richieste');
    }
}
