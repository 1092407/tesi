@extends('layouts.concessionario')

@section('title', 'storico amperaggio')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">


<!-- se non ci sono dati lo segnalo appositamente con una scritta -->
   @if(count($datiAll)==0)
   <h4> Nessun dato attualmente presente </h4>
   @endif


    </div>
  </header>

  <!-- tabella per vedere tutti i dati della batteria  -->
  <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12" style="overflow: scroll">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>
            <td><b style="font-size:18px;">Time</b></td>
            <td><b style="font-size:18px;">Temperature [°C]</b></td>
            <td><b style="font-size:18px;">Battery Voltage [V]</b></td>
            <td><b style="font-size:18px;">Battery Current [A]</b></td>

          </tr>
        </thead>
        <tbody>
          @foreach($datiAll as $d)
          <tr>
            <td>{{$d->data}}</td>
            <td>{{$d->temperatura}} </td>
            <td>{{$d->voltaggio}} </td>
            <td>{{$d->amperaggio}} </td>

          @endforeach
        </tbody>
      </table>



      @endsection
