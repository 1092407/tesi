<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Annuncio;
use App\Models\Locatore;
use Illuminate\Support\Facades\Log;
use App\Rules\GreaterThan;
use App\Models\Resources\Richieste;
use Carbon\Carbon;
use App\Models\Messaggistica;
use App\Models\Resources\Messaggi;

class LocatarioController extends Controller
{
    protected $_catalogModel;
    protected $_annuncioModel;
    protected $_locatoreModel;
    protected $_messaggisticaModel;


    public function __construct()
    {
        $this->_catalogModel = new Catalogo;
        $this->_annuncioModel = new Annuncio;
        $this->_locatoreModel = new Locatore;
        $this->_messaggisticaModel = new Messaggistica;
        
    }

    public function showRichieste(){
        $richieste= $this->_annuncioModel->getLocatarioRichieste(auth()->user()->id);
        return view('richieste')
            ->with('richieste',$richieste);
    }



    //
    public function sendRichiesta(Request $request, $id_alloggio, $id_locatario)
    {
        $richieste_attive= $this->_annuncioModel->getAlloggioLocatarioRichiesteAttesa($id_locatario,$id_alloggio);
        if($richieste_attive== NULL){
            $richiesta = new Richieste([
                'data_richiesta' => Carbon::now()->addHours(2),
                'data_risposta' => NULL,
                'stato' => 1,
                'locatario'=> $id_locatario,
                'id_alloggio' => $id_alloggio
            ]);
            $richiesta->save();
            $alloggio = $this->_catalogModel->getAlloggio($id_alloggio);
            $messaggio = new Messaggi([
                'contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio',
                'data' => Carbon::now()->addHours(2),
                'mittente' => $id_locatario,
                'destinatario' => $alloggio->locatore,
                'id_alloggio' => $id_alloggio

            ]);
            $messaggio->save();
            return redirect()->route('annuncio', $id_alloggio)
                ->with('status', 'Richiesta inoltrata correttamente!');
        }else{
            return redirect()->route('annuncio', $id_alloggio)
                ->with('status', 'Richiesta non inoltrata, è gia presente una richiesta in attesa per questo annuncio!');
        }

    }
}
