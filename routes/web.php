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


//ROTTE CLIENTI
Route::get('/Cliente','ClienteController@index')->name('cliente')->middleware('can:isCliente');  //per andare sulla home del cliente



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

// per gestire modifica o eliminazione
Route::get('/Concessionario/ListaAuto','ConcessionarioController@showauto')->name('listaauto');//per vedere lista di tutte le auto
Route::get('/Concessionario/Auto/{auto}','ConcessionarioController@ShowThisAuto')->name('auto');//per andare a vedere il dettaglio di una detrminata auto
Route::delete('/Concessionario/EliminaAuto/{auto}','ConcessionarioController@deleteauto')->name('auto.delete');  // per eliminare
Route::put('/Concessionario/ModificaAuto/{auto}','ConcessionarioController@updateauto')->name('auto.update');// aggiorna dati
Route::get('/Concessionario/ModificaAuto/{auto}','ConcessionarioController@showAutoToUpdate')->name('auto.toupdate'); //per vedere dati attualemte presenti prima di fare modifiche


/*

//Route Admin
Route::get('/Admin','AdminController@index')->name('admin')->middleware('can:isAdmin');
Route::post('/Admin','AdminController@showStatistiche')->name('adminfilter');
Route::get('/Admin/Faq','AdminController@showFaq')->name('faqindex')->middleware('can:isAdmin');
Route::post('/Admin/Faq','AdminController@storeFaq')->name('faq.store');
Route::put('/Admin/Faq/{faq}','AdminController@updateFaq')->name('faq.update')->middleware('can:isAdmin');
Route::get('/Admin/Faq/{faq}','AdminController@showFaqToUpdate')->name('faq.toupdate')->middleware('can:isAdmin');
Route::delete('/Admin/Faq/{faq}','AdminController@deletefaq')->name('faq.delete');
//Route Locatore
Route::get('/Locatore','LocatoreController@index_loca')->name('locatore')->middleware('can:isLocatore')->middleware('auth');

Route::get('/Messaggi', 'UserController@showMessaggi')->name('messaggi')->middleware('auth');
Route::get('/Profilo', 'LocatoreController@showProfilo')->name('profilo')->middleware('auth');
Route::get('/Locatario/Richieste', 'LocatarioController@showRichieste')->name('richieste')->middleware('can:isLocatario');
Route::put('/Locatore/Richieste/{richiesta}/{risposta}', 'LocatoreController@richiestaRisposta')->name('richiestaRisposta')->middleware('can:isLocatore');

Route::put('/Locatore/UpdateProfilo','LocatoreController@updateProfilo')->name('updateProfilo.update');

Route::get('/Locatore/NewHome','LocatoreController@addHome')->name('addHome')->middleware('can:isLocatore');
Route::post('/Locatore/NewHome','LocatoreController@storeHome')->name('addHome.store');
Route::get('/Annuncio/{alloggio}','UserController@getAnnuncio')->name('annuncio');
Route::delete('/Locatore/Delete/Annuncio/{alloggio}', 'LocatoreController@deleteAnnuncio')->name('annuncio.delete')->middleware('can:isLocatore');
Route::put('/Locatore/Update/Annuncio/{alloggio}', 'LocatoreController@updateAnnuncio')->name('annuncio.update');

Route::post('/Messaggi/{alloggio}/{destinatario}', 'UserController@sendMessaggio')->name('messaggio.store');
Route::get('/Chat/{alloggio}/{destinatario}', 'UserController@showChat')->name('conversazione')->middleware('auth');
Route::post('/Send/{alloggio}/{destinatario}','UserController@rispondiMessaggio')->name('messaggio.send');

//Route Locatario
Route::get('/Search','UserController@searchCatalogo')->name('search')->middleware('can:isLocatario');
Route::get('/Locatario','LocatoreController@index_lario')->name('locatario')->middleware('can:isLocatario')->middleware('auth');
Route::post('/Annuncio/{alloggio}/{locatario}','LocatarioController@sendRichiesta')->name('richiesta.store');


*/

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
