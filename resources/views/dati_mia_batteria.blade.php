@extends('layouts.cliente')

@section('title', 'la tua batteria')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h1 id="titolo" style="margin-bottom:0px;"><b>Ecco i dati più recenti sulla tua batteria</b></h1>


      <h4 id="info" style="margin-bottom:0px;">Qui puoi vedere i vari dati della batteria montata sulla tua auto
      <br>

      </h4>

       <br>
       <br>


    </div>
  </header>

  <!-- in questa tabella metto lista dove vedo username cliente e vari dati ,come temperatura,voltaggio...
  poi sotto ogni tipo di dato ci metto dei bottoni che mi portano a vedere o lo storico dei dati come tabella html
  oppure il grafico con i dati degli ultimi mesi con laravel charts
  -->
  <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12" style="overflow: scroll">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>


            <td colspan=2><b style="font-size:18px;">Temperatura</b></td>    <!-- metto due colonne perchè riporto il valore del dato e un messaggio alto basso carico   a seconda del valore con degli if nelle direttive blade  -->
            <td colspan=2><b style="font-size:18px;">Livello di carica</b></td>   <!-- dipende dal voltaggio  -->
            <td colspan=2><b style="font-size:18px;">Autonomia residua</b></td>  <!-- amperaggio lo uso per capire quanta corrente usa e quindi ci posso fare delle analisi sulla guida o se è accesa/spenta o quanto consuma -->



          </tr>
        </thead>
        <tbody>

        <!-- lo metto come foreach ma in realtà arriva sempre un sogolo oggetto come $dati  -->
          @foreach($dati as $d)
          <tr>

               <!-- 2 per temperatura  -->
              <td>{{$d->temperatura}} </td>

              @if ($d->temperatura>70)
              <td>temperatura troppo alta:rischio surriscldamento </td>
              @endif

              @if ($d->temperatura<=70)
              <td> temperatura ottimale </td>
              @endif


            <!-- 2 per voltaggio e quindi per la carica della bateria  -->
              <td>{{$d->voltaggio}} % </td>

              @if ($d->voltaggio>30)
              <td> carica ancora ottimale </td>
              @endif

              @if ($d->voltaggio<=30)
              <td> Ricaricare il prima possibile  </td>
              @endif


            <!-- 2 per amperaggio  -->
            <!-- lo uso per vedere autonomia residua : se è troppo basso si scarica tardi altrimenti dura ancora parecchio  -->
              <td>{{$d->amperaggio}} </td>


              <!-- se è troppo alta la batteria si scarica velocemente  -->
              @if ($d->amperaggio>70)
              <td>Consumo elevato:ridurre la velocità per aumentare autonomia </td>
              @endif


              <!-- se è basso si scarica più lentamente e dura di più   -->
              @if ($d->amperaggio<=70 and $d->amperaggio!=0)
              <td> Consumo ottimale </td>
              @endif

              <!-- se è a zero allora è  auto spenta   -->
              @if ($d->amperaggio==0)
              <td> Auto attualmente spenta </td>
              @endif


          @endforeach
        </tbody>
      </table>



      @endsection
