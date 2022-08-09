<?php

namespace App\Http\Controllers;

use App\Models\Locatore;
use App\Models\Resources\Alloggi;
use App\Models\Resources\Richieste;
use App\Http\Requests\NewHomeRequest;
use App\Models\Catalogo;
use App\Models\Annuncio;
use App\User;
use Illuminate\Http\Request;
use App\Models\Resources\Incluso;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class LocatoreController extends Controller
{

    protected $_locatoreModel;
    protected $_catalogModel;
    protected $_annuncioModel;

    public function __construct()
    {
        $this->_locatoreModel = new Locatore;
        $this->_catalogModel = new Catalogo;
        $this->_annuncioModel = new Annuncio;
    }
    public function index_loca()
    {
        $alloggi = $this->_locatoreModel->getCatalogo();
        return view('dashboard')
            ->with('alloggi', $alloggi);
    }
    public function showProfilo()
    {
        return view('profilo');
    }
    public function index_lario()
    {
        $alloggi = $this->_catalogModel->getCatalog();
        $servizi_vincoli = $this->_catalogModel->getServiziVincoli();
        return view('dashboard')
            ->with('alloggi', $alloggi)
            ->with('servizi', $servizi_vincoli[0]);
    }
    public function addHome()
    {
        $servizi_vincoli = $this->_catalogModel->getServiziVincoli();
        return view('inserisci_offerta')
            ->with('servizi', $servizi_vincoli[0])
            ->with('vincoli', $servizi_vincoli[1]);
    }

    //Funzione che viene attivata una volta che i dati sono stati validati
    public function storeHome(NewHomeRequest $request)
    {
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }
        if ($request->eta_max == 90)
            $vincolo_eta = NULL;
        else
            $vincolo_eta = $request->eta_max;

        if ($request->letti_pl == 0)
            $posto_letto = NULL;
        else
            $posto_letto = $request->letti_pl;


        $alloggio = new Alloggi;

        //Associa alle proprietà all'oggetto alloggio i dati validati
        $alloggio->fill($request->validated());
        $alloggio->locatore = auth()->user()->id;
        $alloggio->foto = $imageName;
        $alloggio->eta_max = $vincolo_eta;
        $alloggio->letti_pl = $posto_letto;
        $alloggio->created_at = Carbon::now()->addHours(2);
        $alloggio->save();

        if (!is_null($request->get('servizi'))) {
            foreach ($request->get('servizi') as $servizio) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $servizio
                ]);
                $incluso->save();
            }
        };


        if ($request->vuoiVincoli === 'Si') {
            if ($request->has('sesso')) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $request->sesso
                ]);
                $incluso->save();
            };
            if ($request->has('matricola')) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $request->matricola
                ]);
                $incluso->save();
            };
        };

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/alloggi';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('locatore')]);
    }

    public function updateProfilo(Request $request)
    {
        $data = $request->validate([
            'foto_profilo' => 'file|mimes:jpeg,png|max:5000',
            'name' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'sesso' => 'required|string',
            'data_nascita' => 'required|date',
            'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'cellulare' => 'required|min:10|max:10',
            'descrizione' => 'string|max:2500'
        ]);


        if ($request->hasFile('foto_profilo')) {
            $image = $request->file('foto_profilo');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/foto_profilo';
            $oldImage = $destinationPath . '/' . auth()->user()->foto_profilo;
            File::delete($oldImage);
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = auth()->user()->foto_profilo;
        }

        $data['foto_profilo'] = $imageName;
        User::find(auth()->user()->id)->update($data);

        return redirect()->route('profilo')
            ->with('status', 'Profilo aggiornato correttamente!');
    }

    public function deleteAnnuncio($id)
    {
        $this->_annuncioModel->deleteAnnuncio($id);

        return  redirect()->route('locatore')
            ->with('status', 'Alloggio eliminato correttamente!');
    }

    public function updateAnnuncio(Request $request, $id)
    {
        $data_alloggio = $request->validate([
            'titolo' => 'required|string|max:30',
            'regione' => 'required|string',
            'citta' => 'required|string',
            'cap' => 'required|integer',
            'indirizzo' => 'required|string',
            'numero' => 'required|integer',
            'prezzo' => 'required|numeric|min:0',
            'descrizione' => 'required|string|max:2500',
            'superficie' => 'required|integer|min:0',
            'letti_pl' => 'exclude_if:tipologia,0|integer|min:1',
            'letti_ap' => 'required|integer|min:0',
            'n_camere' => 'required|integer|min:0',
            'tipologia' => 'required|boolean',
            'foto' => 'sometimes|file|mimes:jpeg,png|max:1024',
            'periodo_locazione' => 'required|integer|min:3|max:12',
            'eta_max' => 'sometimes|integer|max:90|min:18'
        ]);

        $data_incluso = $request->validate([
            'servizi'    => "sometimes|array",
            'servizi.*'  => "sometimes|integer|distinct",
            'vuoiVincoli' => "sometimes|string",
            'matricola' => "sometimes|integer",
            'sesso' => "sometimes|integer"
        ]);

        $alloggio = $this->_catalogModel->getAlloggio($id);


        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/alloggi';
            $oldImage = $destinationPath . '/' . $alloggio->foto;
            File::delete($oldImage);
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $alloggio->foto;
        }

        $data_alloggio['foto'] = $imageName;

        if ($data_alloggio['eta_max'] == 90) {
            $data_alloggio['eta_max'] = NULL;
        }

        if ($data_alloggio['tipologia'] == 0) {
            $data_alloggio['letti_pl'] = NULL;
        }


        $alloggio->updated_at = Carbon::now()->addHours(2);
        $alloggio->update($data_alloggio);

        $this->_annuncioModel->deleteServiziVincoli($id);

        if (array_key_exists('servizi', $data_incluso)) {
            foreach ($data_incluso['servizi'] as $servizio) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $servizio
                ]);
                $incluso->save();
            }
        };


        if ($data_incluso['vuoiVincoli'] === 'Si') {
            if ($request->has('sesso')) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $request->sesso
                ]);
                $incluso->save();
            };
            if ($request->has('matricola')) {
                $incluso = new Incluso([
                    'alloggio' => $alloggio->id,
                    'servizio_vincolo' => $request->matricola
                ]);
                $incluso->save();
            };
        };



        return redirect()->route('annuncio', $id)
            ->with('status', 'Annuncio aggiornato correttamente!');
    }

    public function richiestaRisposta($id, $risposta)
    {

        $richiesta = $this->_annuncioModel->getRichiesta($id);
        $richiesta->data_risposta = Carbon::now();
        $richiesta->stato = $risposta;
        $richiesta->update();

        if ($risposta == 2) {
            $alloggio = $this->_catalogModel->getAlloggio($richiesta->id_alloggio);
            $alloggio->opzionato = 1;
            $alloggio->update();
            $richieste = $this->_annuncioModel->getAlloggioRichieste($richiesta->id_alloggio);
            foreach ($richieste as $ric) {
                $ric->data_risposta = Carbon::now();
                $ric->stato = 0;
                $ric->update();
            }
            return redirect()->route('contratto', $id);
        } elseif ($risposta == 0) {
            return redirect()->route('annuncio', $richiesta->id_alloggio)
                ->with('status', 'Richiesta rifiutata correttamente!');
        }
    }

    public function showContratto($id){
        $result = $this->_locatoreModel->getContratto($id);
        if($result != null){
            $locatore = $result['locatore'];
            $locatario = $result['locatario'];
            $alloggio = $result['alloggio'];
            if((auth()->user()->id == $locatore[0]->user_id or auth()->user()->id == $locatario[0]->user_id) and $alloggio[0]->stato == 2){
                return view('contratto')
                    ->with('alloggio', $alloggio)
                    ->with('locatore', $locatore)
                    ->with('locatario', $locatario);
            }
        }
        return redirect()->route('home');
        
        
    }
}
