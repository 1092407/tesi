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
            $table->string('foto_profilo')->nullable();
            $table->string('name'); //Non modifico il nome della colonna perchè potrei avere problemi di funzionamento di processi che ne fanno uso
            $table->string('cognome');
            $table->string('sesso');
            $table->date('data_nascita');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('cellulare')->unique();
            $table->integer('livello');
            $table->string('descrizione')->nullable();
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
