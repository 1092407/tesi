<?php

namespace App\Http\Controllers;
use App\Models\Resources\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller{


    protected $auto;

    public function __construct(){
        $this->auto = new Auto;
    }


    //per vedere tutte le auto del catalogo
    public function showAuto(){
        $auto = $this->auto->getauto(); //funzione che ritorna tutte le auto
        return view('lista_auto')
                ->with('auto',$auto);
    }


   public function ShowThisAuto($auto){
        $auto = $this->auto->getthisauto($auto);  // funzione definita in Users model e lanciata qui
        return view('auto_dettaglio_public')
                ->with('auto',$auto);
    }


//serve per vedere la homepage
    public function showHomepage(){
    return view('homepage');
    }


//ricerco auto in base al nome della marca
     public function CercaAuto(Request $ricerca)  {

     $nomeinserito=$ricerca->name; //prendo il nome che ho inserito per poi  confrontarlo con quelli nel db
     $nomeinserito=trim( $nomeinserito);  //elimino gli spazi se ci sono

   // estraggo da tutte le auto che corrispondono alla ricerca
    $auto = Auto::where(function($nome) use ($nomeinserito){
            $nome->where('marca','LIKE', $nomeinserito.'%');
        })->select("id","marca","modello","foto")->get();


        return view('lista_auto')
           ->with('auto',$auto) ;

    }


  //non so a cosa serve ma per ora la lascio
    public static function urlPreviousTwice(){
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session

        return session(['links']);
    }


}//chiude la classe
