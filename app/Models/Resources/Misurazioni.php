<?php


namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

class Misurazioni extends Model
{
    protected $table='misurazioni';
    protected $primaryKey = 'id'; //è id della misurazione e NON del cliente associato

}
