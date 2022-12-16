<?php

namespace App\Http\Controllers;
use App\Charts\examplechart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class examplechartController extends Controller
{

     public function index(){
        $chart = new examplechart;
        $chart->labels(['', '', '','']);
        $chart->dataset('My datase', 'line', [1, 2, 3,4,8]);

           return view('sample_view', compact('chart'));

      }



}
