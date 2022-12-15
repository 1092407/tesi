<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';

     protected $fillable = [
         'name', 'cognome',   'username', 'password', 'livello', 'auto', 'targa','datavendita'
    ];


    public function getclienti(){  // mi recupera info su TUTTI i  clienti
        $clienti=Users::where("livello","cliente")->select( "id","name","cognome","auto","datavendita","targa","username")->get();
        return $clienti;
    }

  public function getThisCliente($id){  // mi recupera dati su un solo cliente grazie al suo id
  $cliente=Users::where("livello","cliente")->where("id",$id)->select( "id","name","cognome","datavendita","auto","username","targa")->first();
   return $cliente;
    }


  public function getThis($id){
//variabili di appoggio che uso per query facili e veloci   //numeri offest array  che mi servono nella view per passare dati da visualizzare
        $app1 = Users::where("id",$id)->value( "id");            //0
        $app2 = Users::where("id",$id)->value( 'name');   //1
        $app3 = Users::where("id",$id)->value( "cognome");  //2
        $app5 = Users::where("id",$id)->value( "datavendita");  //3
        $app6 = Users::where("id",$id)->value( "targa");    // 4
        $app7 = Users::where("id",$id)->value( "username");   // 5
       $app8 = Users::where("id",$id)->value( "auto");    // 6
       $cliente=[$app1,$app2,$app3,$app5,$app6,$app7,$app8];  //sul vettore mi ci salvo tutti questi dati
        return $cliente;
   }

}//chiude classe
