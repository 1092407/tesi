<?php

namespace App\Http\Controllers;
use App\Charts\examplechart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources\Auto; //la uso per fare qualche prova sui chart

use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class examplechartController extends Controller
{

     public function index(){
        $chart = new examplechart;

        $allid=Auto::select("id")->get()->toArray();
        $valori=[];

        for ($i=0;$i<count($allid);$i++){
        $app=Auto::where("id",$allid[$i])->value("id");
        $valori[$i]=$app;
        }

        $lab=[];
        for ($i=0;$i<count($allid);$i++){
        $lab[$i]="";
        }



        $chart->labels(array_values($lab));
        $chart->dataset('dati ', 'line', array_values($valori)); //così funziona

           return view('sample_view', compact('chart'));

      }



}
