<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{

    protected $table = 'auto';
    protected $primaryKey = 'id';

     protected $fillable = [
         'marca', 'modello','descrizione', 'foto'
    ];

  public function getauto(){  // mi recupera info su TUTTE le auto
        $auto=Auto::all();
        return $auto;
    }

    public function getthisauto($id){  // mi recupera info su una determinata auto
        $auto=Auto::where("id",$id)->select( "id","marca","modello","descrizione","foto")->first();
        return $auto;
    }




    public function getAutotoUpdate($id){  // mi recupera info su una determinata auto
      /*
        $app1 = Auto::where("id",$id)->value( "id");            //0
        $app2 = Auto::where("id",$id)->value( 'marca');   //1
        $app3 = Auto::where("id",$id)->value( "modello");  //2
        $app4 = Auto::where("id",$id)->value( "descrizione");  //3
        $app5 = Auto::where("id",$id)->value( "foto");    // 4

       $auto=[$app1,$app2,$app3,$app4,$app5];   */
      $auto=Auto::where("id",$id)->select( "id","marca","modello","descrizione","foto")->first();
        return $auto;
    }

}//chiude classe
