<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//ROTTE PUBBLICHE
Route::get('/', 'PublicController@showHomepage')->name('home');
Route::view('/Who','who')->name('who'); //pagina chi siamo
Route::view('/Where','where')->name('where'); // dove siamo
Route::view('/What','what')->name('what');  //cosa facciamo
Route::view('/Privacy','privacy_cookies')->name('privacy');  //pagina info privacy
Route::view('/Regolamento','termini_condizioni')->name('termini_condizioni'); //pagina info varie
Route::get('/Auto','PublicController@showAuto')->name('lista_auto'); //per vedere marca e modelli disponibili per acquisto
Route::get('/Auto/{auto}','PublicController@ShowThisAuto')->name('auto_dettaglio'); //per andare a vedere dettagli di un'auto
Route::get('/Search','PublicController@CercaAuto')->name('search');  //per cercare auto secondo la sua marca (es:fiat,audi,...)


//è una prova per vedere se funzionano charts
Route::get('/provachart','examplechartController@index')->name('prova'); //per fare una prova e vedere se funzionava cahrt, dopo da sistemare


//ROTTE CLIENTI
Route::view('/Cliente','homecliente')->name('cliente')->middleware('can:isCliente');  //per andare sulla home del cliente
Route::get('/Cliente/DatiPersonali','ClienteController@ShowMyData')->name('MyData'); //vede dati personali

Route::get('/Cliente/DatiMiaBatteria','ClienteController@DatiMiaBatteria')->name('MyBattery'); //vede dati della mia batteria

//ROTTE CONCESSIONARIO

Route::view('/Concessionario','homeconcessionario')->name('concessionario')->middleware('can:isConcessionario');  //per andare sulla home del concessionario

//per registrare nuovo cliente
Route::get('/Concessionario/RegistraCliente','ConcessionarioController@registraclienti')->name('registraclienti'); // mi genera la vista per inserire nuovi clienti
Route::post('/Concessionario/RegistraCliente','ConcessionarioController@storecliente')->name('registraclienti_post');  // va messa nella form nella view corrispondente per effettuare la registrazione nel db

// per modificare o eliminare un cliente
Route::get('Concessionario/GestioneClienti','ConcessionarioController@showclienti')->name('gestisciclienti'); // porta alla vista che mi fa gestire i clienti
Route::delete('/Concessionario/GestioneClienti/{cliente}','ConcessionarioController@deletecliente')->name('cliente.delete');  // per eliminare
Route::put('/Concessionario/GestioneClienti/{cliente}','ConcessionarioController@updatecliente')->name('cliente.update');// aggiorna dati
Route::get('/Concessionario/GestioneClienti/{cliente}','ConcessionarioController@showclienteToUpdate')->name('cliente.toupdate'); // va vedere i dati presenti nel db e che posso modificare

//per aggiungere una nuova auto nel catalogo
Route::get('/Concessionario/InserisciAuto','ConcessionarioController@inserisciauto')->name('inserisciauto'); // mi genera la vista per inserire nuova auto
Route::post('/Concessionario/InserisciAuto','ConcessionarioController@storeauto')->name('inserisciauto_post');  // va messa nella form nella view corrispondente per effettuare la salvataggio nel db

// per gestire modifica o eliminazione di auto
Route::get('/Concessionario/ListaAuto','ConcessionarioController@showauto')->name('listaauto');//per vedere lista di tutte le auto
Route::get('/Concessionario/Auto/{auto}','ConcessionarioController@ShowThisAuto')->name('auto');//per andare a vedere il dettaglio di una detrminata auto
Route::delete('/Concessionario/EliminaAuto/{auto}','ConcessionarioController@deleteauto')->name('auto.delete');  // per eliminare
Route::put('/Concessionario/ModificaAuto/{auto}','ConcessionarioController@updateauto')->name('auto.update');// aggiorna dati
Route::get('/Concessionario/ModificaAuto/{auto}','ConcessionarioController@showAutoToUpdate')->name('auto.toupdate'); //per vedere dati attualemte presenti prima di fare modifiche

//per vedere dati batterie
Route::get('Concessionario/ListaBatterieClienti','ConcessionarioController@ShowListBatterie')->name('listabatterieclienti');  //per anadare a vedere tabella generale con tutti clienti

Route::get('Concessionario/StoricoDatiBatteria/{cliente}','ConcessionarioController@ShowStoricoAll')->name('alldata.storico'); //tabella per tutti i dati
Route::get('Concessionario/ChartDatiBatteria/{cliente}','ConcessionarioController@ShowChartAll')->name('alldata.chart'); //tabella per tutti i dati


Route::get('Concessionario/StoricoTempeaturaBatteria/{cliente}','ConcessionarioController@ShowStoricoTemp')->name('temp.storico'); //vedere solo tabella dati batteria
Route::get('Concessionario/GraficoTempeaturaBatteria/{cliente}','ConcessionarioController@ShowChartTemp')->name('temp.chart');//vedere grafico solo dati temperatura

Route::get('Concessionario/StoricoVoltaggioBatteria/{cliente}','ConcessionarioController@ShowStoricoVolt')->name('volt.storico');  //alti dati sono meccanismi analoghi a quelli della temperatura
Route::get('Concessionario/GraficoVoltaggioBatteria/{cliente}','ConcessionarioController@ShowChartVolt')->name('volt.chart');

Route::get('Concessionario/StoricoAmperaggioBatteria/{cliente}','ConcessionarioController@ShowStoricoAmp')->name('amp.storico');
Route::get('Concessionario/GraficoAmperaggioBatteria/{cliente}','ConcessionarioController@ShowChartAmp')->name('amp.chart');






//ROTTE PER MESSAGGI : le usano tutti  e le funzioni chiamate sono nel MessaggiController
//il middleware pertanto è basato solo sulla semplice autentificazione dell'utente in fase di login
Route::get('/Messaggi', 'MessaggiController@showMessaggi')->name('messaggi')->middleware('auth'); //il loggato vede i suoi messaggi
Route::get('/Chat/{destinatario}', 'MessaggiController@showChat')->name('conversazione')->middleware('auth');  //il loggato vede la conversazione che ha con un certo destinatario
Route::post('/Send/{destinatario}','MessaggiController@rispondiMessaggio')->name('messaggio.send')->middleware('auth'); //serve,una volta aperta la conversazione con un certo destinatario, a rispondergli


//Sottoinsime di Auth::routes()
Route::get('login','Auth\LoginController@showLoginForm')->name('login'); //Rotta che genera la form GET
Route::post('login','Auth\LoginController@login');//Usata al submit della form che attiva il processo di autenticazione
Route::post('logout','Auth\LoginController@logout')->name('logout');

//queste non servono perchè gli utenti li registra solo lo concessionario  da area privata
//e il concessionario è pre registrato nel db quindi la fase di registrazione non la permettiamo come azione pubblica
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest');//Rotta che genera la form di registrazione
Route::post('register','Auth\RegisterController@register'); //Rotta che effettivamente registra l'utente nel db



//Route::get('/Contratto/{richiesta}','LocatoreController@showContratto')->name('contratto')->middleware('auth');
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
