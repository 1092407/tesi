@extends('layouts.concessionario')

@section('title', 'storico voltaggio')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">


    </div>
  </header>

<!-- se non ci sono dati lo segnalo appositamente con una scritta -->
   @if(count($datiVolt)==0)
   <h4> Nessun dato attualmente presente </h4>
   @endif


  <!-- tabella per i dati del voltaggio -->
  <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12" style="overflow: scroll">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>
            <td><b style="font-size:18px;">Data rilevazione (y-m-d and hour)</b></td>
            <td><b style="font-size:18px;">Voltaggio espresso in Volt</b></td>

          </tr>
        </thead>
        <tbody>
          @foreach($datiVolt as $d)
          <tr>
            <td>{{$d->data}}</td>
            <td>{{$d->voltaggio}} </td>

          @endforeach
        </tbody>
      </table>



      @endsection
