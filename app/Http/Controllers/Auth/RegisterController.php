<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers; //Trait classe predefinita che mette a disposizone una serie di metodi già predefiniti

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; //proprietà predefinita che specifica la rotta a cui viene reindirizzato l'utente a fine registrazione

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); //metodo che ci consente di attivare i gate 
    }

    /**
     * Get a validator for an incoming registration request.
     * Sovrascriviamo uno dei metodi predefinifiti del trait RegisterUsers, questo metodo permette di
     * definire delle regole di validazione direttamente nel controller invece che definirle nella cartella Request
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'foto_profilo' => ['sometimes','file', 'mimes:jpeg,png', 'max:5000'],
            'name' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'sesso' => ['required', 'string'],
            'data_nascita' => ['required', 'date','before:18 years ago'],
            'email' => ['required', 'string', 'unique:users', 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cellulare' => ['required', 'string', 'min:10', 'max:10', 'unique:users'],
            'livello' => ['required', 'integer'],
            'descrizione' => ['sometimes','string','max:2500']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * Procedura per la creazione di utenti una volta che la procedura è stata validata,
     * meccanismo che associa i dati della vista alle proprietà della classe Users che sarà mappato nella tupla della base di dati
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (request()->hasFile('foto_profilo')) {
            $image = request()->file('foto_profilo');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path().'/img/foto_profilo';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = NULL;
        }
        return User::create([
            'foto_profilo' => $imageName,
            'name' => $data['name'],
            'cognome' => $data['cognome'],
            'sesso' => $data['sesso'],
            'data_nascita' => $data['data_nascita'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'cellulare' => $data['cellulare'],
            'livello' => $data['livello'],
            'descrizione' => $data['descrizione']
        ]);

    }
}
