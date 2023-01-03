<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources\Users;
use App\Models\Resources\Misurazioni;
use App\Charts\examplechart;
use App\Models\Resources\Auto;
use App\User;

class ClienteController extends Controller
{
    //per vedere la home page cliente quando ha fatto il login
    public function index(){
        return view('home_cliente');
    }

    //ora funzioni per visualizzare dati della prorpia auto


    //questa mi fa vedere i dati del profilo nome,cognome,ecc...

    public function ShowMyData(){
     return  view('profilo');
          //  i dati personali li estraggo dalla view direttamente tramite la facade auth
    }


    //questa mi porta a vedere pagina con i dati della mia batteria (inteso come clinete che vede dati della sua batteria )
    //vedo i dati più recenti che indicano lo stato attuale della batteria

    public function DatiMiaBatteria(){
    $loggato=auth()->user()->id; //estraggo id utente attualmente loggato

    //devo recuperare i dati dell'ultima misurazione perchè è quella che rappresenta lo stato attuale
    //della batteria. quindi tra tutte le misurazioni che riguardano la batteria dell'utente loggato
    //devo anadare poi a cercare la più recente
    $tutteledate=Misurazioni::where("cliente",$loggato)->select("data")->get()->toArray();
    $recente=max($tutteledate);  //mi prende la data più grande e quindi la più recente

    $dati=Misurazioni::where("cliente",$loggato)->where("data",$recente)->get(); //recupero tutte le misurazioni dell'ultima data

    return view('dati_mia_batteria')
                ->with('dati',$dati);

    }


}//chiude classe
