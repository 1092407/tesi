<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use App\Rules\GreaterThan;
use App\Models\Resources\Faq;
use App\Http\Requests\NewFaqRequest;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller{

    protected $_catalogModel;

    public function __construct(){
        $this->middleware('can:isAdmin'); 
        $this->_catalogModel = new Catalogo;
    }

    public function index(){
        return view('statistiche');
    }

    public function showStatistiche(Request $request){

        request()->validate([
           'fine_intervallo' =>[new GreaterThan($request->inizio_intervallo)]
        ]);
        $statistiche= $this->_catalogModel->getStatistiche($request->inizio_intervallo,$request->fine_intervallo,$request->tipo_camera); 
        $filtri[0]=$request->inizio_intervallo;
        $filtri[1]=$request->fine_intervallo;
        $filtri[2]=$request->tipo_camera;
        return view('statistiche')
            ->with('richieste',[$statistiche[0],$statistiche[1],$statistiche[2]])
            ->with('locazioni',$statistiche[3])
            ->with('alloggi',$statistiche[4])
            ->with('filtri',$filtri);
    }

    public function showFaq(){
        $faqs = $this->_catalogModel->getFaq();
        return view('admin_faq')
                ->with('faqs',$faqs);
    }

    public function updateFaq(Request $request,$id)
    {
        $data = $request->validate([
            'domanda' => 'required|string|max:190',
            'risposta' => 'required|string|max:190',
        ]);

        $faq = $this->_catalogModel->getThisFaq($id);
        $faq->update($data);

        return redirect()->route('faqindex')
            ->with('status', 'Faq aggiornata correttamente!');
    }

    public function storeFaq(NewFaqRequest $request){
        $faq= new Faq;
        $faq->fill($request->validated());
        $faq->save();

        return redirect()->route('faqindex')
            ->with('status', 'Faq inserita correttamente!');
    }

    public function showFaqToUpdate($id){
        $faq = $this->_catalogModel->getThisFaq($id);
        return view('modifica_faq')->with('faq', $faq);
    }

    public function deleteFaq($id)
    {
        $faq = $this->_catalogModel->getThisFaq($id);
        $faq->delete();

        return  redirect()->route('faqindex')
            ->with('status', 'FAQ eliminata correttamente!');
    }

    
}