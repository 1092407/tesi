<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Incluso extends Model
{
    protected $table = 'incluso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['alloggio','servizio_vincolo'];      //abbiamo bisogno di poter inserire massivamente questi attributi
}
