@extends('layouts.cliente')

@section('title', 'la tua area riservata')

@section('content')
<div class="w3-container w3-padding-32" id="catalog" align="center">

    <h4> DA QUI MONITORI LA TUA AUTO OVUNQUE TU SIA!</h4><br>

    <h4> Qui puoi vedere le tue informazioni,dati sulla tua auto e richiedere ulteriori info e/o assistenza tramite un'apposita chat </h4><br>

     @if (session('status'))
      <div class="alert success">
        {{ session('status') }}
      </div>
      @endif


</div>
@endsection
