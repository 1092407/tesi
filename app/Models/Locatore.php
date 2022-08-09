<?php

namespace App\Models;
use App\Models\Resources\Alloggi;
use Illuminate\Support\Facades\Auth;
use App\Models\Resources\Users;
use App\Models\Resources\Richieste;

class Locatore{

    public function getCatalogo(){
        $alloggi_user = Alloggi::where('locatore','=', Auth::id()); 
        return $alloggi_user->paginate(6);       
    }

    public function getContratto($id_richiesta){
        $max_richieste = Richieste::max('id');
        if($max_richieste >= $id_richiesta and $id_richiesta>0){
            $alloggio = Richieste::join('alloggi','richieste.id_alloggio','=','alloggi.id')->where('richieste.id','=',$id_richiesta)->select('alloggi.*','richieste.stato')->get();
            $locatore = Alloggi::join('users','alloggi.locatore','=','users.id')->join('richieste','richieste.id_alloggio','=','alloggi.id')->where('richieste.id','=',$id_richiesta)->select('users.id as user_id','users.name','users.cognome','users.data_nascita','users.sesso')->get();
            $locatario = Richieste::join('users','richieste.locatario','=','users.id')->where('richieste.id','=',$id_richiesta)->select('users.id as user_id','users.name','users.cognome','users.email','richieste.id as richieste_id','users.data_nascita','users.sesso')->get();
            //return dd($max_richieste);
            $result=[
                'alloggio'=>$alloggio,
                'locatore'=>$locatore,
                'locatario'=>$locatario
            ];
        }else{
            $result = null;
        }
        return $result;
    }
}