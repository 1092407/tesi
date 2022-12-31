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
    //poi tramite id del loggato cerco di ritrovare altre info riguardo la batteria di
    //ogni cliente autenticato
    public function ShowMyData(){
     return  view('profilo');
          //  i dati personali li estraggo dalla view direttamente tramite la facade auth
    }


}//chiude classe
