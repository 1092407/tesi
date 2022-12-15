@extends('layouts.concessionario')

@section('title', 'gestione clienti')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h1 id="titolo" style="margin-bottom:0px;"><b>Gestione clienti</b></h1>

      @if (session('status'))
      <div class="alert success">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </header>

  <!-- First Photo Grid-->
  <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12" style="overflow: scroll">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>
            <td><b style="font-size:18px;">nome</b></td>
            <td><b style="font-size:18px;">cognome</b></td>

            <td><b style="font-size:18px;">auto</b></td>
            <td><b style="font-size:18px;">targa</b></td>
            <td><b style="font-size:18px;">data vendita</b></td>
            <td><b style="font-size:18px;">username</b></td>





            <td colspan=2><b style="font-size:18px;">Azioni</b></td>
          </tr>
        </thead>
        <tbody>
          @foreach($clienti as $cliente)
          <tr>
            <td>{{$cliente->name}}</td>
            <td>{{$cliente->cognome}} </td>
            <td>{{$cliente->auto}}</td>
            <td>{{$cliente->targa}} </td>
            <td>{{$cliente->datavendita}}</td>
            <td>{{$cliente->username}} </td>



              <td>
              <a href = "{{route('cliente.toupdate',$cliente->id)}}" class="w3-button w3-blue">Modifica</a>
            </td>

              <td>
              <form action="{{ route('cliente.delete', $cliente->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="w3-button w3-red" type="submit" onclick= "return confirm('Sei sicuro di voler eliminare questo membro dello staff?')">Elimina</button>
              </form>
            </td>

          @endforeach
        </tbody>
      </table>



      @endsection
