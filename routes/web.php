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

Route::get('/', 'PublicController@showHomepage')->name('home');
Route::get('/Catalogo/{regione}','PublicController@showCatalogoRegionale')->name('catalogo_regionale')->middleware('guest');
Route::get('/Faq','PublicController@getFaq')->name('faq');
Route::view('/Who','who')->name('who');
Route::view('/Where','where')->name('where');
Route::view('/What','what')->name('what');
Route::view('/Privacy','privacy_cookies')->name('privacy');
Route::view('/Regolamento','termini_condizioni')->name('termini_condizioni');

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

//Sottoinsime di Auth::routes()
Route::get('login','Auth\LoginController@showLoginForm')->name('login')->middleware('guest'); //Rotta che genera la form GET
Route::post('login','Auth\LoginController@login');//Usata al submit della form che attiva il processo di autenticazione
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest');//Rotta che genera la form di registrazione
Route::post('register','Auth\RegisterController@register'); //Rotta che effettivamente registra l'utente

Route::get('/Contratto/{richiesta}','LocatoreController@showContratto')->name('contratto')->middleware('auth');
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
