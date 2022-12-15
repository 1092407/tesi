<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto', function (Blueprint $table) {
            //tabella auto serve solo in home per far vedere marca e modello di alcune auto che ipoteticamente il concessionario vende
            //non uso targa perche voglio solo dire le varie auto disponibili. Targa poi la metto solo nel cliente che ha comprato auto
            $table->bigIncrements('id')->index();
            $table->string('marca'); //esempio fiat
            $table->string('modello'); //500 e la uso anche per inserire anno del modello
            $table->longText('descrizione'); //per scrivere alcune funzionalità
             $table->string('foto')->nullable();  //metto nullable perche non so se poi la uso effettivamente
            $table->rememberToken();//Definisce nella tabella una colonna per gestire la condizione di remember
            $table->timestamps();// Definisce due colonne che indicano la data di creazione della tupla e di ultima modifica
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto');
    }
}
