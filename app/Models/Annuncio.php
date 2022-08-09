<?php

namespace App\Models;

use App\Models\Resources\Alloggi;
use App\User;
use App\Models\Resources\Incluso;
use App\Models\Resources\Richieste;
use App\Models\Resources\Messaggi;

class Annuncio {

    public function getLocatore($id){
        $locatore= User::find($id);
        return $locatore;
    }

    public function deleteServiziVincoli($id_alloggio){
        Incluso::where('alloggio',$id_alloggio)->delete();
    }

    public function getAlloggioServiziVincoli($id_alloggio){
        
        $alloggio_servizi = Incluso::join('servizi_vincoli','incluso.servizio_vincolo','=', 'servizi_vincoli.id')
                                   ->where('incluso.alloggio', $id_alloggio)
                                   ->where('servizi_vincoli.tipologia', 0)
                                   ->get(['servizi_vincoli.*']);
        
        $alloggio_vincoli = Incluso::join('servizi_vincoli','incluso.servizio_vincolo','=', 'servizi_vincoli.id')
                                   ->where('incluso.alloggio', $id_alloggio)
                                   ->where('servizi_vincoli.tipologia', 1)
                                   ->get(['servizi_vincoli.*']);
                                   
        return [$alloggio_servizi, $alloggio_vincoli];
    }

    public function deleteAnnuncio($id){
        $alloggio = Alloggi::where('id',$id);
        $incluso = Incluso::where('alloggio', $id);
        $messaggi = Messaggi::where('id_alloggio', $id);
        $richieste = Richieste::where('id_alloggio',$id);
        $alloggio->delete();
        $incluso->delete();
        $messaggi->delete();
        $richieste->delete();
    }

    public function getRichiesta($id){
        $richiesta= Richieste::find($id);
        return $richiesta;
    }

    public function getLocatarioRichieste($id){
        $richieste= Richieste::where('locatario','=',$id)->get();
        for($i=0;$i<count($richieste);$i++){
            $richieste[$i] = Richieste::join('alloggi','richieste.id_alloggio','=','alloggi.id')->where('richieste.id','=',$richieste[$i]->id)->select('richieste.id','richieste.id_alloggio','richieste.data_richiesta','richieste.data_risposta','richieste.stato','alloggi.titolo','alloggi.prezzo','alloggi.tipologia','alloggi.periodo_locazione')->get();         
        }
        return $richieste;

    }

    public function getRichiestaAccettata($id_alloggio){
        $richiesta= Richieste::where('richieste.id_alloggio','=', $id_alloggio)
            ->where('stato','=',2)->get();                       
        return $richiesta;
    }

    public function getAlloggioRichieste($id_alloggio){
        $richieste_alloggio = Richieste::join('users','richieste.locatario','=','users.id')
            ->where('richieste.id_alloggio', $id_alloggio)
            ->where('stato','=',1)
            ->select('richieste.id','richieste.data_richiesta','richieste.stato','richieste.locatario','richieste.id_alloggio','users.name','users.cognome','users.sesso','users.data_nascita','users.email','users.cellulare')
            ->get();                         
        return $richieste_alloggio;
    }

    public function getAlloggioLocatarioRichiesteAttesa($id_locatario,$id_alloggio){
        $richieste_alloggio_locatario= Richieste::where('richieste.id_alloggio','=', $id_alloggio)
            ->where('richieste.locatario','=', $id_locatario)
            ->where('stato','=',1)->get();
        $flag=true;
        foreach($richieste_alloggio_locatario as $richiesta){
            
            if(($richiesta->stato)==1){
                $flag=false;
            }
        }
        if($flag==true){
            $richieste_alloggio_locatario=NULL; 
        }
        return $richieste_alloggio_locatario;
    }
}