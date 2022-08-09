<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    protected $table = 'faq';
    protected $primaryKey = 'id';
    protected $fillable = ['domanda','risposta'];
    public $timestamps = false; #Ci consente di evitare che vengano aggiunte le due colonne per tracciare la data di inserimento equella di ultima modifica
}