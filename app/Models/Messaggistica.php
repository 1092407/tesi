<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Messaggi;
use App\User;
use App\Models\Resources\Alloggi;

class Messaggistica extends Model
{
    public function getChat($id){
        //tabella delle chat dove $id é il mittente
        $chatMittente = Messaggi::where("mittente",$id)->select("destinatario","id_alloggio")->get();
        //tabella delle chat dove $id è destinatario
        $chatDestinatario = Messaggi::where("destinatario",$id)->select("mittente","id_alloggio")->get();
        //unisco le due tabelle in unico array
        //
        $contatti = [];
        foreach([$chatMittente,$chatDestinatario] as $chat){
            foreach ($chat as $message){
                if(isset($message->destinatario)){
                    $contatti[$message->destinatario][$message->id_alloggio]=0;
                } else {
                    $contatti[$message->mittente][$message->id_alloggio]=0;
                }
            }
        }
        
        $result = [];
        $i = 1;
        foreach(array_keys($contatti) as $key_user){
            foreach(array_keys($contatti[$key_user]) as $key_alloggio){
                $result[$i]=[
                    "alloggio"=>Alloggi::where("id",$key_alloggio)->get(),
                    "utente"=>User::where("id",$key_user)->get()
                ];
                $i++;

            }
        }
        
        return $result;
    }

    /*Destinatario in questo caso è quello che è loggato nel sito, mentre il mittente è colui del quale ci interessa
    vedere la conversazione, questo metodo ritorna i messaggi/conversazioni salvati dell'utente loggato */
    public function getConversazione($destinatario, $mittente, $alloggio){

        $messaggi = Messaggi::select("contenuto","data","mittente","destinatario")->where("id_alloggio", $alloggio)
        ->whereIn("destinatario",[$destinatario,$mittente])->whereIn("mittente",[$destinatario,$mittente])
        ->orderBy("data","asc")->get();
        $mittente = User::where("id", $mittente)->get();
        $alloggio = Alloggi::where("id",$alloggio)->get();
        return ["messaggi"=>$messaggi,"mittente"=>$mittente,"alloggio"=>$alloggio];

    }
}
