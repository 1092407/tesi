<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  //Componente che gestisce l'autenticazione
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * Attributi definibili mediante una form
     * @var array
     */
    protected $fillable = [
        'foto_profilo', 'name', 'cognome', 'sesso', 'data_nascita', 'email', 'username', 'password', 'cellulare', 'livello', 'descrizione'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * Attributi che non devono essere visualizzati il remembre_token consente di amntenere un utente autenticato all'interno del sito
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * Fa il casting del dato indipendentemente da come questo viene rappresetnato nel db
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasLivello($livello){
        $livello = (array)$livello;
        return in_array($this->livello, $livello);
        
    }
}
