<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Messaggi;
use App\User;
use App\Models\Resources\Users;

class Messaggistica extends Model{



   public function getChat($id){       // questa funzione serve per recuperare TUTTE LE CHAT  dell'utente attualmente loggato che è identificato da $id

        //dove $id é il mittente
        $idlist1 = Messaggi::where("mittente",$id)->select("destinatario")->distinct()->get()->toArray(); //prendo i destinatari dei miei messaggi

        //dove $id è destinatario
        $idlist2 = Messaggi::where("destinatario",$id)->select("mittente")->distinct()->get()->toArray();//prendo i mittenti dei messaggi che mi arrivano

      //ora li unisco
      $idunici=array_merge($idlist1,$idlist2); //funziona

      for($i=0;$i<count($idunici);$i++){
            $app1= Users:: where('id','=',$idunici[$i])->value( "name");
            $amico[$i]=[$app1];
        }  // teoricamente ora amico è un array con indici numerici



    $result=[];
     for($y=0;$y<count($idunici);$y++){
            $app1= Users:: where('id','=',$idunici[$y])->value( "username");
            $app2= Users:: where('id','=',$idunici[$y])->value( "id");

             $result[$y]=[$app1,$app2];   //result[0] è username     mentre  [1] è id: li uso poi nella view messaggi
        }//fine for




        $ridotto=[];
          $numero=0; // numero di valori che rimangono non doppiati

         for($a=0;$a<count($result);$a++){

               $trovato=0;

               for($b=0;$b<$numero && $trovato==0;$b++){

               if($ridotto[$b]==$result[$a]){
                  $trovato=1;
                  }

               }

                   if($trovato==0){
                     $ridotto[$numero]=$result[$a];
                     $numero=$numero+1;
                   }



         }// for esterno



    return $ridotto;
    }




   //sotto sistemata

    /*Destinatario in questo caso è quello che è loggato nel sito, mentre il mittente è colui del quale ci interessa
    vedere la conversazione, questo metodo ritorna i messaggi salvati dell'utente loggato */
    public function getConversazione($destinatario,$mittente){

        $messaggi = Messaggi::select("contenuto","data","mittente","destinatario")
        ->whereIn("destinatario",[$destinatario,$mittente])->whereIn("mittente",[$destinatario,$mittente])
        ->orderBy("data","asc")->get();
        $mittente = User::where("id", $mittente)->get();

        return ["messaggi"=>$messaggi,"mittente"=>$mittente];

    }

}//chiude la classe
