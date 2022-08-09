<?php


namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

class Messaggi extends Model
{
    protected $table='messaggi';
    protected $primaryKey = 'id';
    protected $fillable=['destinatario','mittente','contenuto','data','id_alloggio'];
}


