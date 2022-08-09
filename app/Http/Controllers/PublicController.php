<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PublicController extends Controller{
    protected $_catalogModel;

    public function __construct(){
        $this->_catalogModel = new Catalogo;
    }

    public function showCatalogo(){
        $alloggi = $this->_catalogModel->getCatalog();
        $servizi = $this->_catalogModel->getServizi();
        $request = new  Request;
        $request['citta'] = '';
        $request['tipo_camera'] = 'tutte';
        return view('dashboard')
                            ->with('alloggi',$alloggi)
                            ->with('servizi',$servizi)
                            ->with('request',$request);
                         
    }
    
    public function showCatalogoRegionale($regione){
        $alloggi = $this->_catalogModel->getCatalogoRegionale($regione);
        $request = new Request;
        $request['citta'] = '';
        $request['tipo_camere'] = 'tutte';
        return view('dashboard')
                ->with('citta',$regione)
                ->with('alloggi',$alloggi)
                ->with('request',$request);       
    }
    
    # Mostra tutte le FAQ
    public function getFaq(){        
        $faqs = $this->_catalogModel->getFaq();
        return view('faq')
                ->with('faqs',$faqs);
    }


    public function showHomepage(){  
        if(Auth::check()){
            switch(Auth()->user()->livello){
                case 0 : return redirect()->route('admin');
                case 1 : return redirect()->route('locatore');
                case 2 : return redirect()->route('locatario');
            }
        }else{
            return view('homepage');                
        }                   
    }

    public static function urlPreviousTwice(){
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session

        return session(['links']);
    }
}