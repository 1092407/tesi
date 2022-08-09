<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Annuncio;
use App\Models\Locatore;
use Illuminate\Support\Facades\Log;
use App\Rules\GreaterThan;
use App\Models\Resources\Messaggi;
use Carbon\Carbon;
use App\Models\Messaggistica;
use App\Models\Resources\ServiziVincoli;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
    //
    public function searchCatalogo(Request $ricerca)
    {
        //Log::info($ricerca);

        
        $servizi_vincoli = $this->_catalogModel->getServiziVincoli();
        if ($this->checkRequest($ricerca)) {
            $prezzo = [];
            if (isset($ricerca->prezzo_min)) {
                $prezzo['min'] = $ricerca->prezzo_min;
                request()->validate([
                    'prezzo_min'=>'min:0'
                ]);
            }
            if (isset($ricerca->prezzo_max)) {
                $prezzo['max'] = $ricerca->prezzo_max;
                if(isset($ricerca->prezzo_min)){
                    request()->validate([
                        'prezzo_max'=>['min:0', new GreaterThan($ricerca->prezzo_min)]
                    ]);
                }else{
                    request()->validate([
                        'prezzo_max'=>'min:0'
                    ]);
                }
            }
            $periodo_locazione=null;
            if(isset($ricerca->periodo_locazione)){
                $periodo_locazione = $ricerca->periodo_locazione;
            }
            if (isset($ricerca->superficie)) {
                $superficie = $ricerca->superficie;
            }else{
                $superficie=null;
            }
            $letti_ap = null;
            if (isset($ricerca->letti_ap)) {
                $letti_ap = $ricerca->letti_ap;
            }
           
            $filtri_particolari = null;
            if ($ricerca->tipo_camera == 'appartamento') {
                if (isset($ricerca->n_camere)) {
                    $filtri_particolari = $ricerca->n_camere;
                }
            }
            if ($ricerca->tipo_camera == 'posto_letto') {
                    $filtri_particolari = $ricerca->letti_pl;
            }
            
            $servizi = $this->_catalogModel->getServizi();
            $alloggi = $this->_catalogModel->getCatalogSearch($ricerca->citta, $ricerca->tipo_camera,$periodo_locazione,$superficie,$letti_ap, $ricerca->only($servizi), $prezzo, $filtri_particolari);
        } else {
            $alloggi = $this->_catalogModel->getCatalog();
        }
        return view('dashboard')
            ->with('alloggi', $alloggi)
            ->with('servizi',  $servizi_vincoli[0])
            ->with('request', $ricerca);
    }
    public function getAnnuncio(int $id)
    {
        $richieste_locatario=NULL;
        $richieste_annuncio=NULL;
        $richiesta_accettata=NULL;
        if(Auth::check()){
            if((auth()->user()->livello)==2){
                $richieste_locatario=$this->_annuncioModel->getAlloggioLocatarioRichiesteAttesa(auth()->user()->id,$id);
            }
            if((auth()->user()->livello)==1){
                $richieste_annuncio=$this->_annuncioModel->getAlloggioRichieste($id);
                $richiesta_accettata=$this->_annuncioModel->getRichiestaAccettata($id);
            }
        }
        $alloggio = $this->_catalogModel->getAlloggio($id);
        $servizi_vincoli = $this->_catalogModel->getServiziVincoli();
        $locatore = $this->_annuncioModel->getLocatore($alloggio->locatore);
        $sv_alloggio = $this->_annuncioModel->getAlloggioServiziVincoli($id); //Questo array è più comodo degli altri due passa
        //in due array separati vincoli [1] e servizi [0] dell'alloggio in questione
        //inoltre sia vincoli che servizi sono associati al rispettivo nome 
        Log::info($sv_alloggio[0]);
        Log::info($sv_alloggio[1]);
        Log::info($servizi_vincoli);
        return view('annuncio')
            ->with('alloggio', $alloggio)
            ->with('servizi', $servizi_vincoli[0])
            ->with('vincoli', $servizi_vincoli[1])
            ->with('servizi_alloggio', $sv_alloggio[0])
            ->with('vincoli_alloggio', $sv_alloggio[1])
            ->with('locatore', $locatore)
            ->with('richieste_locatario',$richieste_locatario)
            ->with('richieste_annuncio',$richieste_annuncio)
            ->with('richiesta_accettata',$richiesta_accettata);
    }

    /**Visualizza la lista delle chat aperte */
    public function showMessaggi()
    {
        $chat = $this->_messaggisticaModel->getChat(auth()->user()->id);

        return view("message")
            ->with('chat', $chat);
    }

    /** Visualizza la conversazione intera */
    public function showChat($alloggio, $destinatario)
    {
        $chat = $this->_messaggisticaModel->getChat(auth()->user()->id);
        $messaggi = $this->_messaggisticaModel->getConversazione(auth()->user()->id, $destinatario, $alloggio);
        
        return view("message")
            ->with('chat', $chat)
            ->with('messaggi', $messaggi)
            ->with('id', auth()->user()->id);
    }

    private function checkRequest(Request $request)
    {
        if (count($request->all()) <= 2) {
            if ($request->citta == '' and $request->tipo_camera == 'tutte') {
                return false;
            }
        }
        return true;
    }



    public function sendMessaggio(Request $request, $id_alloggio, $id_destinatario)
    {
        $request->validate([
            'contenuto' => 'required|string|max:2500'
        ]);

        $messaggio = new Messaggi([
            'contenuto' => $request->get('contenuto'),
            'data' => Carbon::now()->addHours(2),
            'mittente' => auth()->user()->id,
            'destinatario' => $id_destinatario,
            'id_alloggio' => $id_alloggio
        ]);
        $messaggio->save();
        //return back()->withInput();
        return redirect()->route('annuncio', $id_alloggio)
            ->with('status', 'Messaggio inviato correttamente!');
    }


    public function rispondiMessaggio(Request $request, $id_alloggio, $id_destinatario)
    {
        $chat = $this->_messaggisticaModel->getChat(auth()->user()->id);
        $messaggi = $this->_messaggisticaModel->getConversazione(auth()->user()->id, $id_alloggio, $id_destinatario);

        $request->validate([
            'messaggio' => 'required|string|max:2500'
        ]);

        $messaggio = new Messaggi([
            'contenuto' => $request->get('messaggio'),
            'data' => Carbon::now()->addHours(2),
            'mittente' => auth()->user()->id,
            'destinatario' => $id_destinatario,
            'id_alloggio' => $id_alloggio
        ]);

        $messaggio->save();

        return redirect()->route('conversazione', [$id_alloggio, $id_destinatario])
            ->with('chat', $chat)
            ->with('messaggi', $messaggi)
            ->with('id', auth()->user()->id);
    }
    
}
