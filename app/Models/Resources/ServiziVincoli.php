<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class ServiziVincoli extends Model
{
    protected $table = 'servizi_vincoli';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
/*
    public function getServiziVincoli(){
        $servizi =  ServiziVincoli::where('tipologia', '=' ,0)->get();
        $vincoli = ServiziVincoli::where('tipologia', '=' ,1)->get();
        return [$servizi, $vincoli];
    } */
}
