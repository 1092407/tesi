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
use App\Models\Resources\Misurazioni;


use App\Charts\examplechart;  //questo mi serve per plottare i dati su grafici di laravel charts

class CasaAutoController extends Controller{

 protected $users;   // sarebbe users model
    public function __construct(){
        $this->middleware('can:isCasaAuto');
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

        //devo anche eliminare TUTTI i messaggi dove era presente il cliente eliminato perchè altrimenti la parte dei clienti va in tilt
        //se prova a leggere dal db dove non c'è più id corrispondente al cliente eliminato

        //quindi vedo quelli dove è destinatario e quelli dove è mittente e poi li elimino tutti

        //recupero id dei messaggi dove $id è destinatario
        $dest=Messaggi::where('destinatario', '=', $id)->select("id")->get()->toArray();
        //recupero id dei messaggi dove $id  è mittente
        $mitt=Messaggi::where('mittente', '=', $id)->select("id")->get()->toArray();

       //ora unisco tutti gli id di questi messaggi in un unico array li unisco
       $MessToDelete=array_merge($dest,$mitt);

       //ora li elimino

       for($i=0;$i<count($MessToDelete);$i++){
            $appoggio= Messaggi:: where('id','=',$MessToDelete[$i])->first(); //recupero ogni messaggio tramite il suo id
            $appoggio->delete();
        }

        //forse dovrei andare ad eliminare anche tutte le misurazioni inerenti la batteria del cliente eliminato
        /*
        //estraggo gli id di tutte le misurazioni che coinvolgono questo cliente
        $dataToDelete=Misurazioni::where('cliente', '=', $id)->select("id")->get()->toArray();

        for($j=0;$j<count($dataToDelete);$j++){
            $app= Misurazioni:: where('id','=',$dataToDelete[$j])->first(); //recupero ogni misurazione tramite il suo id
            $app->delete();
        }
       */

        //adesso posso attivare il redirect

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





//PER ANDARE A VEDERE DATI DELLE BATTERIE MONTATE SULLE AUTO DEI CLIENTI

//IDEA PER GESTIRE DATI
// sulla migration "misurazioni"  il cliente fa riferimento all'id di un cliente --->ogni cliente vede dati della sua batteria
//qui il concessionario prende tutti gli id dei clienti e poi lui può vedere dati di TUTTE le batterie dei suoi clienti
//quindi recupero id dei clienti che poi li passo come parametro nei bottoni della tabella presente nella view lista_batterie_auto per
//cercare tutte le misurazioni dove cliente==id passato


  //mi porta alla pagina con tabella di tutti i clienti e bottoni per vedere dati specifici della sua batteria
        public function ShowListBatterie(){
        //il where mi serve senno prendo anche il concessionario
        $dati =Users::where("livello","cliente")->select("id","username")->get(); //id lo passo come parametro e username per capire di chi vedo i dati
        return view('lista_batterie_auto')
                ->with('dati',$dati);
     }


     //funzioni per vedere dati sulla TEMPERATURA  della batteria

     //questa mi fa vedere lo storico dei dati in tabella
     public function ShowStoricoTemp($cliente){
     //il parametro che ricevo è id del cliente che mi serve da ricercare du 'cliente' all'interno di misurazioni (intesa come nella migration)
     $datiTemp=Misurazioni::where("cliente",$cliente)->select( "temperatura","data")->orderBy("data", "desc")->get(); //recupero dati su temperatura e datamisurazione
                                                                                           //sulla batteria di questo determinato cliente
     return view('storico_dati')  //questa view è solo per la temperatura
                ->with('datiTemp',$datiTemp);

     }

     //questa mi fa vedere il grafico dei dati
     public function ShowChartTemp($cliente) {

      $chart = new examplechart;

        $allid=Misurazioni::where("cliente",$cliente)->select("id")->orderBy("data", "asc")->get()->toArray();  //sono id delle misurazioni delle batteria di $cliente
        $valori=[];                                                                                      //li metto già ordinati per data
                                                                                                        //così vedo tutto dal più vecchio al più recente

        for ($i=0;$i<count($allid);$i++){
        $app=Misurazioni::where("id",$allid[$i])->value("temperatura"); //uso una variabile di appoggio
        $valori[$i]=$app;
        }

        $lab=[];
        for ($i=0;$i<count($allid);$i++){
        $appoggio=Misurazioni::where("id",$allid[$i])->value("data");
        $lab[$i]=$appoggio;
        }

        $chart->labels(array_values($lab));
        $chart->dataset('Temperature [°C]', 'line', array_values($valori))->options(['borderColor'=>'black','fill'=> 'false']);

           return view('sample_view', compact('chart'));

     }



     //funzioni per vedere dati sul VOLTAGGIO della batteria

    //questa per vedere dati sullo storico del voltaggio
     public function ShowStoricoVolt($cliente){
     //il parametro che ricevo è id del cliente che mi serve da ricercare du 'cliente' all'interno di misurazioni (intesa come nella migration)
     $datiVolt=Misurazioni::where("cliente",$cliente)->select( "voltaggio","data")->orderBy("data", "desc")->get(); //recupero dati su temperatura e datamisurazione
                                                                                           //sulla batteria di questo determinato cliente
     return view('storico_voltaggio')
                ->with('datiVolt',$datiVolt);

     }



     //questa mi fa vedere il grafico dei dati
     public function ShowChartVolt($cliente) {

      $chart = new examplechart;

        $allid=Misurazioni::where("cliente",$cliente)->select("id")->orderBy("data", "asc")->get()->toArray();  //sono id delle misurazioni delle batteria di $cliente
        $valori=[];                                                                                      //li metto già ordinati per data
                                                                                                        //così vedo tutto dal più vecchio al più recente

        for ($i=0;$i<count($allid);$i++){
        $app=Misurazioni::where("id",$allid[$i])->value("voltaggio"); //uso una variabile di appoggio
        $valori[$i]=$app;
        }

        $lab=[];
        for ($i=0;$i<count($allid);$i++){
        $appoggio=Misurazioni::where("id",$allid[$i])->value("data");
        $lab[$i]=$appoggio;
        }

        $chart->labels(array_values($lab));
        $chart->dataset('Battery Voltage [V]', 'line', array_values($valori))->options(['borderColor'=>'red','fill'=> 'false']); //così funziona

           return view('sample_view', compact('chart'));

     }




    //funzioni per vedere dati su AMPERAGGIO della batteria

    //questa per vedere dati sullo storico del voltaggio
     public function ShowStoricoAmp($cliente){
     //il parametro che ricevo è id del cliente che mi serve da ricercare du 'cliente' all'interno di misurazioni (intesa come nella migration)
     $datiAmp=Misurazioni::where("cliente",$cliente)->select( "amperaggio","data")->orderBy("data", "desc")->get(); //recupero dati su temperatura e datamisurazione
                                                                                           //sulla batteria di questo determinato cliente
     return view('storico_amperaggio')
                ->with('datiAmp',$datiAmp);

     }



     //questa mi fa vedere il grafico dei dati
     public function ShowChartAmp($cliente) {

      $chart = new examplechart;

        $allid=Misurazioni::where("cliente",$cliente)->select("id")->orderBy("data", "asc")->get()->toArray();  //sono id delle misurazioni delle batteria di $cliente
        $valori=[];                                                                                      //li metto già ordinati per data
                                                                                                        //così vedo tutto dal più vecchio al più recente

        for ($i=0;$i<count($allid);$i++){
        $app=Misurazioni::where("id",$allid[$i])->value("amperaggio"); //uso una variabile di appoggio
        $valori[$i]=$app;
        }

        $lab=[];
        for ($i=0;$i<count($allid);$i++){
        $appoggio=Misurazioni::where("id",$allid[$i])->value("data");
        $lab[$i]=$appoggio;
        }

        $chart->labels(array_values($lab));
        $chart->dataset('Battery Current [A]', 'line', array_values($valori))->options(['borderColor'=>'green','fill'=> 'false']); //così funziona

           return view('sample_view', compact('chart'));

     }


     //questa per vedere lo storico di tutti dati insieme nella tabella
      public function ShowStoricoAll($cliente){
     //il parametro che ricevo è id del cliente che mi serve da ricercare du 'cliente' all'interno di misurazioni (intesa come nella migration)
     $datiAll=Misurazioni::where("cliente",$cliente)->select("temperatura","voltaggio","soc","amperaggio","data")->orderBy("data", "desc")->get(); //recupero dati su temperatura e datamisurazione
                                                                                           //sulla batteria di questo determinato cliente
     return view('storico_alldata')
                ->with('datiAll',$datiAll);

     }


     //questa per vedere dati di tutte le misurazioni
     public function ShowChartAll($cliente){
     $chart = new examplechart;
        $allid=Misurazioni::where("cliente",$cliente)->select("id")->orderBy("data", "asc")->get()->toArray();  //sono id delle misurazioni delle batteria di $cliente
        $valoriTemp=[]; //una per  ogni tipo di dato
        $valoriVolt=[];
        $valoriAmp=[];
        $valoriSoc=[];  //ora popolo i vettori con i dati del db per poi passarli al grafico

        for ($i=0;$i<count($allid);$i++){
        $app1=Misurazioni::where("id",$allid[$i])->value("temperatura"); //uso una variabile di appoggio
        $valoriTemp[$i]=$app1;
        }

        for ($i=0;$i<count($allid);$i++){
        $app2=Misurazioni::where("id",$allid[$i])->value("voltaggio");
        $valoriVolt[$i]=$app2;
        }

        for ($i=0;$i<count($allid);$i++){
        $app3=Misurazioni::where("id",$allid[$i])->value("amperaggio");
        $valoriAmp[$i]=$app3;
        }

        for ($i=0;$i<count($allid);$i++){
        $app4=Misurazioni::where("id",$allid[$i])->value("soc");
        $valoriSoc[$i]=$app4;
        }

        $lab=[];  //questa per segnare le date sulle label:ne uso una sola perchè sono uguali per i vari tipi di dati che recupero
        for ($i=0;$i<count($allid);$i++){
        $appoggio=Misurazioni::where("id",$allid[$i])->value("data");
        $lab[$i]=$appoggio;
        }

        $chart->labels(array_values($lab));
        $chart->dataset('Temperature [°C]', 'line', array_values($valoriTemp))->options(['borderColor'=>'black','fill'=> 'false']);
        $chart->dataset('Battery Voltage [V]', 'line', array_values($valoriVolt))->options(['borderColor'=>'red','fill'=> 'false']);
        $chart->dataset('Battery Current [A]', 'line', array_values($valoriAmp))->options(['borderColor'=>'green','fill'=> 'false']); //fill false non mi colora area tra asse x e la linea
        $chart->dataset('SOC [%]', 'line', array_values($valoriSoc))->options(['borderColor'=>'blue','fill'=> 'false']);
      return view('sample_view', compact('chart'));
     }




     //questa fa vedere lo stato attuale della batteria:è la stessa cosa di quello che può vedere un cliente dalla propria area riservata
     //SE NON CI SONO MISURAZIONI PER UN CERTO CLIENTE ALLORA HO UN ERRORE PERCHE LA FUNZIONE MAX VUOLE ALMENO UN ELEMENTO
     //quindi la riga   if (count($tutteledate)==0) {$tutteledate=["niente1","niente2"];}  serve solo ad evitare un errore
     //perchè se $tutteledate non recupera niente dal db allora la popolo io a caso evitando che ci sia un errore

     public function DatiAttualiBatteria($cliente){
    //devo recuperare i dati dell'ultima misurazione perchè è quella che rappresenta lo stato attuale
    //della batteria. quindi tra tutte le misurazioni che riguardano la batteria del clinete in questione
    //devo anadare poi a cercare la più recente
    $tutteledate=Misurazioni::where("cliente",$cliente)->select("data")->get()->toArray();

    if (count($tutteledate)==0) {$tutteledate=["niente1","niente2"];}

    $recente=max($tutteledate);  //mi prende la data più grande e quindi la più recente
    $dati=Misurazioni::where("cliente",$cliente)->where("data",$recente)->get(); //recupero tutte le misurazioni dell'ultima data

   //dal voltaggio io mi ricavo la batteria residua in percentuale
   //dalla view ho priblemi con @php a prendere il dato e a farci una divisione
   //quindi tento di accedere a $dati e settare voltaggio già a % dividendo per la capacità max della batteria che è 400V


    return view('stato_attaule_batteria_Conc')
                ->with('dati',$dati);

    }



//questa per vedere dati sullo storico della soc
     public function ShowStoricoSoc($cliente){
     //il parametro che ricevo è id del cliente che mi serve da ricercare du 'cliente' all'interno di misurazioni (intesa come nella migration)
     $datiSoc=Misurazioni::where("cliente",$cliente)->select( "soc","data")->orderBy("data", "desc")->get(); //recupero dati su temperatura e datamisurazione
                                                                                           //sulla batteria di questo determinato cliente
     return view('storico_soc')
                ->with('datiSoc',$datiSoc);

     }

//questa mi fa vedere il grafico dei dati SOC
     public function ShowChartSoc($cliente) {

      $chart = new examplechart;

        $allid=Misurazioni::where("cliente",$cliente)->select("id")->orderBy("data", "asc")->get()->toArray();  //sono id delle misurazioni delle batteria di $cliente
        $valori=[];                                                                                      //li metto già ordinati per data
                                                                                                        //così vedo tutto dal più vecchio al più recente

        for ($i=0;$i<count($allid);$i++){
        $app=Misurazioni::where("id",$allid[$i])->value("soc"); //uso una variabile di appoggio
        $valori[$i]=$app;
        }

        $lab=[];
        for ($i=0;$i<count($allid);$i++){
        $appoggio=Misurazioni::where("id",$allid[$i])->value("data");
        $lab[$i]=$appoggio;
        }

        $chart->labels(array_values($lab));
        $chart->dataset('SOC %', 'line', array_values($valori))->options(['borderColor'=>'blue','fill'=> 'false']);

           return view('sample_view', compact('chart'));

     }



}//chiude la classe
