<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Richieste extends Model {

    protected $table = 'richieste';
    protected $primaryKey = 'id';
    protected $fillable=['data_richiesta','data_risposta','stato','locatario','id_alloggio'];
    public $timestamps = false; #Ci consente di evitare che vengano aggiunte le due colonne per tracciare la data di inserimento equella di ultima modifica
}