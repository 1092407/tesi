@extends('layouts.concessionario')

@section('title', 'concessionario')

@section('content')
<div class="w3-container w3-padding-32" id="catalog" align="center">

    <h4> DA QUI GESTISCI AL MEGLIO  LE AUTO E I CLIENTI !</h4><br>
    <h4> Qui puoi vedere le auto attualmente disponibili nel tuo parco auto  e registrare i nuovi clienti  </h4><br>

     @if (session('status'))
      <div class="alert success">
        {{ session('status') }}
      </div>
      @endif


</div>
@endsection
