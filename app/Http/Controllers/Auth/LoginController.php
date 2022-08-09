<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //  protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Override del metodo redirectTo che definisce la homepage per i diversi utenti
     */

    protected function redirectTo() {
        $livello= auth()->user()->livello; // estraiamo dall'utente attualmente autenticato 
        switch($livello){
            case 0: return '/Admin';
                    break;         
            
            case 1: return '/Locatore';
                    break;

            case 2: return '/Locatario';
                    break;
            
            default: return '/';        
        }
    }
    /**
     * Il login va fatto con lo username anzichè con la mail
     * quindi dobbiamo sovrascriver il metodo username che nel trait
     * AuthenticatesUsers ritorna la mail
     * 
     */
    public function username(){
        return 'username';      
    }

    /**
     * Create a new controller instance.
     * Questo metodo definisce le eccezioni alla regola definita come principale, o meglio consente l'acceso al mio controller solo agli utenti 
     * 'guset' ad esccezione della funzione di logout che non è riservata solo agli utenti guest ma atutti quanti gli utenti.
     * Questo perchè dal trate eredita anche il metodo di logout che non può essere a differenza del login usato solo da chi non è registrato
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); 
    }
}
