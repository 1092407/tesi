@extends('layouts.concessionario')

@section('title', 'batterie auto')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h1 id="titolo" style="margin-bottom:0px;"><b>Batterie delle auto dei clienti</b></h1>


      <h4 id="info" style="margin-bottom:0px;">Qui puoi vedere i vari dati delle batterie delle auto di tutti i tuoi clienti.
      <br>
      Cliccando su "storico dati" vedrai tutti i dati presenti nel database in una tabella
      mentre cliccando su "grafico" vedrai gli stessi dati
       plottati su un grafico
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
            <td><b style="font-size:18px;">Cliente</b></td>


            <td colspan=2><b style="font-size:18px;">Tutti i dati</b></td>

            <td colspan=2><b style="font-size:18px;">Temperatura</b></td>
            <td colspan=2><b style="font-size:18px;">Voltaggio</b></td>
            <td colspan=2><b style="font-size:18px;">Amperaggio</b></td>



          </tr>
        </thead>
        <tbody>
          @foreach($dati as $d)
          <tr>


            <td>{{$d->username}}</td>

            <!-- 2 per vedere storico di tutti i dati in una tabella o chart  -->
            <td>
              <a href = "{{route('alldata.storico',$d->id)}}" class="w3-button w3-green">Storico tutti dati</a>
            </td>

            <td>
              <a href = "{{route('alldata.chart',$d->id)}}" class="w3-button w3-green">Grafico tutti dati</a>
            </td>


               <!-- 2 per temperatura  -->
              <td>
              <a href = "{{route('temp.storico',$d->id)}}" class="w3-button w3-blue">Storico dati temperatura</a>
            </td>

            <td>
              <a href = "{{route('temp.chart',$d->id)}}" class="w3-button w3-blue">Grafico temperatura</a>
            </td>


            <!-- 2 per voltaggio  -->
              <td>
              <a href = "{{route('volt.storico',$d->id)}}" class="w3-button w3-blue">Storico dati voltaggio</a>
            </td>

            <td>
              <a href = "{{route('volt.chart',$d->id)}}" class="w3-button w3-blue">Grafico voltaggio</a>
            </td>


            <!-- 2 per amperaggio  -->
              <td>
              <a href = "{{route('amp.storico',$d->id)}}" class="w3-button w3-blue">Storico dati amperaggio</a>
            </td>

            <td>
              <a href = "{{route('amp.chart',$d->id)}}" class="w3-button w3-blue">Grafico amperaggio</a>
            </td>



          @endforeach
        </tbody>
      </table>



      @endsection
