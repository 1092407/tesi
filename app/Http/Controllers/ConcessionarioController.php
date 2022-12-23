<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewClienteRequest;
use App\Models\Resources\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Resources\Auto;
use App\Http\Requests\NewAutoRequest;
use Illuminate\Support\Facades\File;

use App\Models\Resources\Messaggi;

class ConcessionarioController extends Controller{

 protected $users;   // sarebbe users model
    public function __construct(){
        $this->middleware('can:isConcessionario');
        $this->users = new Users;// creo istanza di users per chiamre delle funzioni piu avanti per gestire clienti
        $this->auto = new Auto; //creo istanza di auto
    }


    public function index(){
        return view('homeconcessionario');  //per andare alla home concessionario
    }


  //GESTIONE CLIENTI

   public function registraclienti(){  //porta alla vista per form registrazione clienti
        return view('registracliente');
    }

  //serve per registrare un nuovo cliente
  public function storecliente (NewClienteRequest $request){
        $cliente= new Users;  //con la s sta sotto package model/resources
        $cliente->fill($request->validated());  //serve per la validazione dei dati inseriti
       $appoggio1=$cliente['password'];        // devo utilizzare questo vecchio trucchetto per criptare la
        $appoggio2=Hash::make($appoggio1);    // password affinchè poi il login abbia successo
        $cliente['password']=$appoggio2;        // per il nuovo cliente che crea il concessionario  con questa funzione
        $cliente->save();  //salva dati nel db


        //vedo se qui riesco a creare messaggio automatico quando creo un cliente nuovo

       $messaggio = new Messaggi([
            'contenuto' => "Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ",
            'data' => Carbon::now()->addHours(2),
            'mittente' => auth()->user()->id,
            'destinatario' => $cliente->id

        ]);

        $messaggio->save();
         //funziona correttamente

        return redirect()->route('concessionario')
            ->with('status', 'Cliente inserito correttamente!');  //gli segnalo che è andato tutto correttamente secondo i piani
    }

    //vado alla pagina dove ci sono dati di tutti i clienti
    public function showclienti(){
        $clienti = $this->users->getclienti();  // funzione definita in Users model e lanciata qui
        return view('gestioneclienti')
                ->with('clienti',$clienti);
    }

  //per eliminare un cliente
   public function deletecliente($id) {
        $cliente = $this->users->getThisCliente($id);
        $cliente->delete();
        return  redirect()->route('gestisciclienti')
            ->with('status', 'cliente eliminato correttamente!');
    }


   public function showClienteToUpdate($id){
        $cliente = $this->users->getThis($id);
        return view('modifica_cliente')
                ->with('cliente',$cliente);
    }

    //per modificare dati di un cliente
    public function updatecliente(Request $request,$id) {
        $data = $request->validate([  //stessi validatori della from per inserire un nuovo cliente
        //su username e targa però non metto unique  perchè se apro la pagina e non modifico
        //username o targa con unique si crea conflitto nel db anche se non li tocco e non va bene
        //questa logica di controllo la devo gestire in altro modo: se mette dati non compatibili con vincoli db in automatico
        //viene generato un messaggio di errore ----> va bene anche così
         'name' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'username' => ['required', 'string', 'min:8', ],
              'auto' => ['required', 'string','max:25'], // serve per indicare il modello e la marca  auto
              'targa' => ['required', 'string','max:7','min:7'],
             'datavendita' => ['required', 'date']
        ]);
        $cliente = $this->users->getThisCliente($id); //recupera dati di un certo utente tramite il suo id
        $cliente->update($data);//aggiorna effettivamente i dati nel db
        return redirect()->route('gestisciclienti')
            ->with('status', 'Dati cliente aggiornati correttamente!');
    }

//GESTIONE AUTO

  public function inserisciauto(){  //porta alla vista per form per inserire auto
        return view('inserisci_auto_conc');
    }



    //per inserire una nuova auto
    public function storeauto (NewAutoRequest $request){

    if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName(); //chiama il file allo stesso modom di come è salvato sulla macchina client
        } else {
            $imageName = NULL;
        }   //mi serve per come chiamare file foto se una foto viene effettivamente inserita

        $auto= new Auto;
        $auto->fill($request->validated());  //serve per la validazione dei dati inseriti
        $auto->foto = $imageName; //setta il campo foto dell'auto a quella variabile
        $auto->save();  //salva dati nel db
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/alloggi';
            $image->move($destinationPath, $imageName);
        };
        return redirect()->route('concessionario')
            ->with('status', 'Auto inserita correttamente!');  //gli segnalo che è andato tutto correttamente secondo i piani
    }


   public function showauto(){
        $auto = $this->auto->getauto();  // funzione definita in Users model e lanciata qui
        return view('gestione_auto_conc')
                ->with('auto',$auto);
    }


    public function ShowThisAuto($auto){
        $auto = $this->auto->getthisauto($auto);  // funzione definita in Users model e lanciata qui
        return view('auto_conc')
                ->with('auto',$auto);
    }


    //per eliminare un'auto
   public function deleteauto($id) {
        $auto = $this->auto->getthisauto($id);
        $auto->delete();
        return  redirect()->route('concessionario')
            ->with('status', 'auto eliminata correttamente!');
    }


   //serve per prendere dati presenti e mostrarli prima di fare modifiche dell'auto
   public function showAutoToUpdate($id){
        $auto = $this->auto->getAutotoUpdate($id);
        return view('modifica_auto')
                ->with('auto',$auto);
    }

  //serve per aggiornare dati di un'auto
   public function updateauto(Request $request,$id) {

        $data = $request->validate([  //stessi validatori della from per inserire una nuova auto
            'marca' => 'required|string|max:30',
            'modello' => 'required|string|max:30',
            'foto' => 'sometimes|file|max:5000',
            'descrizione' => 'required|string|max:2000' //qui mettere più lunga
        ]);
     //adesso questo mi serve per vedere se era presente già una foto per questa auto e quale era presente
        $auto = $this->auto->getthisauto($id);  // recupero info su questa auto

             if ($request->hasFile('foto')) {  //se inserisco una nuova foto nella form di modifica prendo questa nuova
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/alloggi';
            $oldImage = $destinationPath . '/' . $auto->foto;
            File::delete($oldImage);
            $image->move($destinationPath, $imageName);
            } else {
            $imageName = $auto->foto;  //altrimenti prendo quella che era già presente nel db
            }
         $data['foto'] = $imageName;  //nei dati nuovi setto la foto in base a quello che è successo nel blocco condizionale precedente

         $auto->update($data);//aggiorna effettivamente i dati nel db

          return redirect()->route('concessionario')
            ->with('status', 'Dati auto aggiornati correttamente!');
         }


}//chiude la classe
