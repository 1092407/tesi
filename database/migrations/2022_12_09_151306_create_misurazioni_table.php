<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisurazioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misurazioni', function (Blueprint $table) { //qui ci metto dati riferiti alle batterie montate sulle auto
        //questi dati sono presi da dataset reali che la web app legge e li plotta su dei grafici


            $table->bigIncrements('id')->index();
            $table->string('cliente')->references('id')->on('users'); //così associo ogni batteria auto alle rispettive misurazioni

            $table->dateTime('data'); //data della misurazione che indica giorno e orario perchè idea è che posso prendere più rilevazioni nello stesso giorno e voglio vedere cose diverse
                                    //senno potrei solo mettere una data e orario non importa perche poi so che nel db
                                    //sono tutte ordinate secondo id crescenti: stessa data ma con id minore significa che è stato fatto prima
                                    //questa parte da rivedere meglio
            $table->float('temperatura');
            $table->float('voltaggio');
            $table->float('amperaggio');
            $table->float('soc');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('misurazioni');
    }
}
