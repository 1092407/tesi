<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->index();

            $table->string('name'); //Non modifico il nome della colonna perchè potrei avere problemi di funzionamento di processi che ne fanno uso
            $table->string('cognome');

            //idea è di avere utente==auto   cioè un cliente può avere un'auto

            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');

            $table->string('livello');//serve per capire se è cliente o altro e andare ad alcune autorizzazzioni
             $table->string('auto');  //mi serve per scrivere marca e modello auto che ha comprato
            $table->string('targa')->unique(); //mi serve per identificare auto

            $table->date('datavendita');  //data in cui cliente ha comprato auto

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
        Schema::dropIfExists('users');
    }
}
