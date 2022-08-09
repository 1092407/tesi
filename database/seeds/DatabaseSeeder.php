<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('alloggi')->insert([
            ['titolo'=>'Bellissimo appartamento','regione' => 'Marche','citta' => 'Ancona', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','02')],
            ['titolo'=>'Stupendo posto letto','regione' => 'Marche','citta' => 'Ancona', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => 2,'letti_ap' => 2,'n_camere' => 1,'opzionato' => 1,'tipologia'=> 1,'locatore' => 2,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 6,'eta_max'=>70, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Favoloso appartamento','regione' => 'Marche','citta' => 'Ancona', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 2,'opzionato' => 1,'tipologia'=> 0,'locatore' => 2,'foto'=>'AM1506.jpg','periodo_locazione' => 12,'eta_max'=>30, 'created_at' => Carbon::create('2022','06','03'), 'updated_at' => Carbon::create('2022','06','05')],
            ['titolo'=>'Bellissimo appartamento','regione' => 'Marche','citta' => 'Ancona', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 6,'eta_max'=>45, 'created_at' => Carbon::create('2022','06','01'), 'updated_at' => Carbon::create('2022','06','01')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Sardegna','citta' => 'Cagliari', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' =>NULL,'letti_ap' => 2,'n_camere' => 2,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 3,'eta_max'=>27, 'created_at' => Carbon::create('2022','06','03'), 'updated_at' => Carbon::create('2022','06','03')],
            ['titolo'=>'Favoloso appartamento','regione' => 'Sicilia','citta' => 'Palermo', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'AM1506.jpg','periodo_locazione' => 3,'eta_max'=>25, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Bellissimo appartamento','regione' => 'Basilicata','citta' => 'Potenza', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 12,'eta_max'=>30, 'created_at' => Carbon::create('2022','06','04'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Calabria','citta' => 'Catanzaro', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => NULL,'letti_ap' => 2,'n_camere' => 2,'opzionato' => 1,'tipologia'=> 0,'locatore' => 2,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','03'), 'updated_at' => Carbon::create('2022','06','05')],
            ['titolo'=>'Favoloso appartamento','regione' => 'Puglia','citta' => 'Bari', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 1,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'AM1506.jpg','periodo_locazione' => 3,'eta_max'=>50, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','02')],
            ['titolo'=>'Bellissimo posto letto','regione' => 'Campania','citta' => 'Napoli', 'cap' => 63900, 'indirizzo' => 'Via Ludovio Einaudi', 'numero' => 10, 'prezzo' => 320.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => 2,'letti_ap' => 3,'n_camere' => 2,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 12,'eta_max'=>35, 'created_at' => Carbon::create('2022','06','05'), 'updated_at' => Carbon::create('2022','06','05')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Abruzzo','citta' => 'Pescara', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => NULL,'letti_ap' => 2,'n_camere' => 1,'opzionato' => 1,'tipologia'=> 0,'locatore' => 2, 'foto' => NULL, 'periodo_locazione' =>6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','04'), 'updated_at' => Carbon::create('2022','06','06')],
            ['titolo'=>'Stupendo posto letto','regione' => 'Lazio','citta' => 'Roma', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => 2, 'letti_ap' => 5,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2, 'foto' => NULL, 'periodo_locazione' =>6,'eta_max'=>45, 'created_at' => Carbon::create('2022','06','07'), 'updated_at' => Carbon::create('2022','06','07')],

            ['titolo'=>'Bellissimo appartamento','regione' => 'Puglia','citta' => 'Bari', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 0,'locatore' => 5,'foto'=>'77561779.jpg','periodo_locazione' => 6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','04'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Stupendo posto letto','regione' => 'Valle d\'Aosta','citta' => 'Aosta', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => 2,'letti_ap' => 2,'n_camere' => 1,'opzionato' => 1,'tipologia'=> 1,'locatore' => 5,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 6,'eta_max'=>70, 'created_at' => Carbon::create('2022','06','04'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Favoloso posto letto','regione' => 'Piemonte','citta' => 'Torino', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => 1,'letti_ap' => 3,'n_camere' => 2,'opzionato' => 1,'tipologia'=> 1,'locatore' => 5,'foto'=>'AM1506.jpg','periodo_locazione' => 12,'eta_max'=>30, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','02')],
            ['titolo'=>'Bellissimo posto letto','regione' => 'Lombardia','citta' => 'Milano', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => 1,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 6,'eta_max'=>45, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','02')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Trentino-Alto Adige','citta' => 'Trento', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' =>NULL,'letti_ap' => 2,'n_camere' => 2,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 3,'eta_max'=>27, 'created_at' => Carbon::create('2022','06','08'), 'updated_at' => Carbon::create('2022','06','08')],
            ['titolo'=>'Favoloso posto letto','regione' => 'Friuli-Venezia Giulia','citta' => 'Udine', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => 2,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 1,'locatore' => 5,'foto'=>'AM1506.jpg','periodo_locazione' => 3,'eta_max'=>25, 'created_at' => Carbon::create('2022','06','07'), 'updated_at' => Carbon::create('2022','06','07')],
            ['titolo'=>'Bellissimo posto letto','regione' => 'Veneto','citta' => 'Venezia', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 21, 'prezzo' => 270.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => 1,'letti_ap' => 3,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 12,'eta_max'=>30, 'created_at' => Carbon::create('2022','06','06'), 'updated_at' => Carbon::create('2022','06','06')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Liguria','citta' => 'Genova', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => NULL,'letti_ap' => 2,'n_camere' => 2,'opzionato' => 1,'tipologia'=> 0,'locatore' => 5,'foto'=>'20210505102417-4.jpg','periodo_locazione' => 6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','05'), 'updated_at' => Carbon::create('2022','06','05')],
            ['titolo'=>'Favoloso appartamento','regione' => 'Emilia-Romagna','citta' => 'Bologna', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 23, 'prezzo' => 265.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 58,'letti_pl' => NULL,'letti_ap' => 3,'n_camere' => 1,'opzionato' => 0,'tipologia'=> 0,'locatore' => 2,'foto'=>'AM1506.jpg','periodo_locazione' => 3,'eta_max'=>50, 'created_at' => Carbon::create('2022','06','04'), 'updated_at' => Carbon::create('2022','06','04')],
            ['titolo'=>'Bellissimo posto letto','regione' => 'Toscana','citta' => 'Firenze', 'cap' => 63900, 'indirizzo' => 'Via Ludovio Einaudi', 'numero' => 10, 'prezzo' => 320.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 60,'letti_pl' => 2,'letti_ap' => 3,'n_camere' => 2,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2,'foto'=>'77561779.jpg','periodo_locazione' => 12,'eta_max'=>35, 'created_at' => Carbon::create('2022','06','03'), 'updated_at' => Carbon::create('2022','06','03')],
            ['titolo'=>'Stupendo appartamento','regione' => 'Umbria','citta' => 'Perugia', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => NULL,'letti_ap' => 2,'n_camere' => 1,'opzionato' => 1,'tipologia'=> 0,'locatore' => 5, 'foto' => NULL, 'periodo_locazione' =>6,'eta_max'=>NULL, 'created_at' => Carbon::create('2022','06','02'), 'updated_at' => Carbon::create('2022','06','02')],
            ['titolo'=>'Stupendo posto letto','regione' => 'Molise','citta' => 'Campobasso', 'cap' => 60121, 'indirizzo' => 'Via Brecce Bianche', 'numero' => 22, 'prezzo' => 260.00 , 'descrizione' => 'Ampio appartamento a due passi dall\'università' ,'superficie' => 55,'letti_pl' => 2, 'letti_ap' => 5,'n_camere' => 3,'opzionato' => 0,'tipologia'=> 1,'locatore' => 2, 'foto' => NULL, 'periodo_locazione' =>6,'eta_max'=>45, 'created_at' => Carbon::create('2022','06','01'), 'updated_at' => Carbon::create('2022','06','01')]

        ]);
        

        DB::table('servizi_vincoli')->insert([
            ['nome' => 'Parcheggio', 'tipologia' => 0],
            ['nome' => 'Piscina', 'tipologia' => 0],
            ['nome' => 'Cucina_Completa', 'tipologia' => 0],
            ['nome' => 'Lavatrice', 'tipologia' => 0],
            ['nome' => 'Asciugatrice', 'tipologia' => 0],
            ['nome' => 'Animali_Domestici', 'tipologia' => 0],
            ['nome' => 'Riscladamento', 'tipologia' => 0],
            ['nome' => 'Cortile', 'tipologia' => 0],
            ['nome' => 'WI-FI', 'tipologia' => 0],
            ['nome' => 'TV', 'tipologia' => 0],
            ['nome' => 'Ferro_da_Stiro', 'tipologia' => 0],
            ['nome' => 'Allarme_Antincendio', 'tipologia' => 0],
            ['nome' => 'Rilevatore_Monossido_Di_Carbonio', 'tipologia' => 0],
            ['nome' => 'Aria_Condizionata', 'tipologia' => 0],
            ['nome' => 'Locale_Ricreativo', 'tipologia' => 0],
            ['nome' => 'Angolo_Studio', 'tipologia' => 0],
            ['nome'=>'Solo Ragazzi', 'tipologia' => 1],
            ['nome'=>'Solo Ragazze', 'tipologia' => 1],
            ['nome'=>'Solo Matricole', 'tipologia' => 1],
            ['nome'=>'No Matricole', 'tipologia' => 1]
        ]);
       
        DB::table('messaggi')->insert([
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','02','19','30','00') , 'mittente' => 3 , 'destinatario' => 2,'id_alloggio'=>2],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','03','19','30','00') , 'mittente' => 3 , 'destinatario' => 2,'id_alloggio'=>3],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','04','19','30','00') , 'mittente' => 4 , 'destinatario' => 2,'id_alloggio'=>11],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','03','19','30','00') , 'mittente' => 3 , 'destinatario' => 2,'id_alloggio'=>8],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','04','19','30','00') , 'mittente' => 6 , 'destinatario' => 2,'id_alloggio'=>8],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','04','19','30','00') , 'mittente' => 6 , 'destinatario' => 2,'id_alloggio'=>11],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','02','19','30','00') , 'mittente' => 3 , 'destinatario' => 2,'id_alloggio'=>1],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','03','19','30','00') , 'mittente' => 4 , 'destinatario' => 2,'id_alloggio'=>1],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','03','19','30','00') , 'mittente' => 4 , 'destinatario' => 2,'id_alloggio'=>5],
            ['contenuto' => 'Ciao sono interessato ed ho richiesto questo alloggio' , 'data' => Carbon::create('2022','06','04','19','30','00') , 'mittente' => 6 , 'destinatario' => 2,'id_alloggio'=>1],
            ['contenuto' => 'Ciao cosa vorresti sapere di preciso?' , 'data' => Carbon::create('2022','06','02','19','40','00') , 'mittente' => 2 , 'destinatario' => 4,'id_alloggio'=>1],
            ['contenuto' => 'Mi piacerebbe sapere se è possibile visitarlo domani nel pomeriggio' , 'data' => Carbon::create('2022','06','02','19','45','00') , 'mittente' => 4 , 'destinatario' => 2,'id_alloggio'=>1]
        ]);
        
        DB::table('faq')->insert([
            ['domanda' => 'Come posso effettuare la registrazione al sito?', 'risposta' => 'In alto a destra nella home page troverai diversi pulsanti, clicca su quello che riporta la parola \'Registrati\'.'],
            ['domanda' => 'Come posso mettere in affitto un appartamento?', 'risposta' => 'Per mettere in affitto un appartamneto devi prima registrarti al sito come locatore e compilare una semplice form.'],
            ['domanda' => 'Posso accordarmi direttamente con il locatore tramite il sito?', 'risposta' => 'Sì, effettuando l\'accesso e selezionando l\'appartamento interessato, sarà possibile avviare una chat con il locatore in questione attraverso il sito stesso.'],
            ['domanda' => 'Perché dovrei affidarmi a UniRent?', 'risposta' => 'Trovare casa in una nuova città non è mai facile. UniRent seleziona le migliori soluzioni, evitando il rischio di brutte esperienze e garantendo sempre un regolare contratto.'],  
            ['domanda' => 'Come funziona?', 'risposta' => 'Scegli tra le nostre offerte a seconda delle tue preferenze e delle tue necessità. '],
            ['domanda' => 'Quanto costa?', 'risposta' => 'Il servizio è completamente gratuito.'],
            ['domanda' => 'Posso offrire in affitto una sola stanza?', 'risposta' => 'Assecondiamo le tue richieste: puoi offrire in affitto tutta la casa o una sola camera. Un intero immobile o più appartamenti.'],
            ['domanda' => 'Dove vi trovo? Come vi contatto?', 'risposta' => 'Siamo raggiungibili via e-mail scrivendo a \'info@unirent.it\' oppure ai recapiti indicati nella pagina \'Contatti\' di questo sito.'],
            ['domanda' => 'Come posso effettuare un ricerca più adatta alle mie esigenze?', 'risposta' => 'Per usufruire del filtraggio nella ricerca dell\'appartamento/posto letto bisogna registrarsi al sito.']
            ]);
        
                
        DB::table('incluso')->insert([
            ['alloggio' => 1, 'servizio_vincolo' =>1],
            ['alloggio' => 1, 'servizio_vincolo' =>3],
            ['alloggio' => 1, 'servizio_vincolo' =>2],
            ['alloggio' => 1, 'servizio_vincolo' =>4],
            ['alloggio' => 1, 'servizio_vincolo' =>5],
            ['alloggio' => 2, 'servizio_vincolo' =>7],
            ['alloggio' => 2, 'servizio_vincolo' =>2],
            ['alloggio' => 3, 'servizio_vincolo' =>8],
            ['alloggio' => 1, 'servizio_vincolo' =>19],
            ['alloggio' => 1, 'servizio_vincolo' =>21],
            ['alloggio' => 1, 'servizio_vincolo' =>15],
            ['alloggio' => 1, 'servizio_vincolo' =>14],
            ['alloggio' => 1, 'servizio_vincolo' =>13],
            ['alloggio' => 2, 'servizio_vincolo' =>12],
            ['alloggio' => 2, 'servizio_vincolo' =>11],
            ['alloggio' => 2, 'servizio_vincolo' =>16],
            ['alloggio' => 3, 'servizio_vincolo' =>10],
        ]);
           

        DB::table('users')->insert([
            ['foto_profilo' => NULL, 'name' => 'Admin', 'cognome' => 'Admin', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','01','01'), 'email' => 'admin.admin@unirent.it', 'username' => 'adminadmin', 'password' => Hash::make('noRX6VyF'), 'cellulare' => "3661147223", 'livello' => 0,'descrizione'=>'Admin del sito', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['foto_profilo' => NULL, 'name' => 'Locatore', 'cognome' => 'Locatore', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','02','01'), 'email' => 'lore.locre@unirent.it', 'username' => 'lorelore', 'password' => Hash::make('noRX6VyF'), 'cellulare' => "3678823475", 'livello' => 1,'descrizione'=>'Locatore', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['foto_profilo' => NULL, 'name' => 'Locatario', 'cognome' => 'Locatario', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','03','01'), 'email' => 'lario.lario@unirent.it', 'username' => 'lariolario', 'password' => Hash::make('noRX6VyF'), 'cellulare' => "3776640989", 'livello' => 2,'descrizione'=>'Locatario', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['foto_profilo' => NULL, 'name' => 'Pippo', 'cognome' => 'Baudo', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','03','01'), 'email' => 'dario.dario@unirent.it', 'username' => 'pippobaudo', 'password' => Hash::make('pippobaudo'), 'cellulare' => "3776455849", 'livello' => 2,'descrizione'=>'racazzo carino', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['foto_profilo' => NULL, 'name' => 'Federico', 'cognome' => 'Pretini', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','07','06'), 'email' => 'federico.pretini@unirent.it', 'username' => 'fede_loca', 'password' => Hash::make('fede_loca'), 'cellulare' => "3661147561", 'livello' => 1,'descrizione'=>'racazzo carino', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['foto_profilo' => NULL, 'name' => 'Federico', 'cognome' => 'Pretini', 'sesso' => 'Maschio', 'data_nascita' => Carbon::create('2000','07','06'), 'email' => 'federico.pretini@unirent.it', 'username' => 'fede_lario', 'password' => Hash::make('fede_lario'), 'cellulare' => "3661147562", 'livello' => 2,'descrizione'=>'racazzo carino', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

        ]);

        DB::table('richieste')->insert([            
            ['data_richiesta' => Carbon::create('2022','06','02'), 'data_risposta'=> Carbon::create('2022','06','04') ,  'stato'=> 2  , 'locatario'=>  3, 'id_alloggio'=>2],
            ['data_richiesta' => Carbon::create('2022','06','03'), 'data_risposta'=> Carbon::create('2022','06','05') ,  'stato'=> 2  , 'locatario'=>  3, 'id_alloggio'=>3],
            ['data_richiesta' => Carbon::create('2022','06','04'), 'data_risposta'=> Carbon::create('2022','06','06') ,  'stato'=> 2  , 'locatario'=>  4, 'id_alloggio'=>11],
            ['data_richiesta' => Carbon::create('2022','06','03'), 'data_risposta'=> Carbon::create('2022','06','05') ,  'stato'=> 2  , 'locatario'=>  3, 'id_alloggio'=>8],
            ['data_richiesta' => Carbon::create('2022','06','04'), 'data_risposta'=> Carbon::create('2022','06','05') ,  'stato'=> 0  , 'locatario'=>  6, 'id_alloggio'=>8],
            ['data_richiesta' => Carbon::create('2022','06','04'), 'data_risposta'=> Carbon::create('2022','06','06') ,  'stato'=> 0  , 'locatario'=>  6, 'id_alloggio'=>11],
            ['data_richiesta' => Carbon::create('2022','06','02'), 'data_risposta'=> NULL ,  'stato'=> 1  , 'locatario'=>  3, 'id_alloggio'=>1],
            ['data_richiesta' => Carbon::create('2022','06','03'), 'data_risposta'=> NULL ,  'stato'=> 1  , 'locatario'=>  4, 'id_alloggio'=>1],
            ['data_richiesta' => Carbon::create('2022','06','03'), 'data_risposta'=> NULL ,  'stato'=> 1  , 'locatario'=>  4, 'id_alloggio'=>5],
            ['data_richiesta' => Carbon::create('2022','06','04'), 'data_risposta'=> NULL ,  'stato'=> 1  , 'locatario'=>  6, 'id_alloggio'=>1]
        ]);
    }

}