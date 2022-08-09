@extends('layouts.admin')

@section('title', 'Admin')


@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h1 id="titolo" style="margin-bottom:0px;"><b>Gestione FAQ</b></h1>
      <div class=" w3-bottombar w3-padding-16" style="margin-bottom:16px;">
        <a class="w3-button w3-green" onclick="document.getElementById('aggiunta').style.display='block'">Aggiungi FAQ</a>
      </div>
      @if (session('status'))
      <div class="alert success">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </header>

  <!-- First Photo Grid-->
  <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>
            <td><b style="font-size:18px;">Domanda</b></td>
            <td><b style="font-size:18px;">Risposta</b></td>
            <td colspan=2><b style="font-size:18px;">Azioni</b></td>
          </tr>
        </thead>
        <tbody>
          @foreach($faqs as $faq)
          <tr>
            <td>{{$faq->domanda}}</td>
            <td>{{$faq->risposta}} </td>
            <td>
              <a href = "{{route('faq.toupdate',$faq->id)}}" class="w3-button w3-blue">Modifica</a>
            </td>
            <td>
              <form action="{{ route('faq.delete', $faq->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="w3-button w3-red" type="submit" onclick= "return confirm('Sei sicuro di voler eliminare la faq?')">Elimina</button>
              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

      <!--INPUT FAQ-->
      <div id="aggiunta" class="modal" style="z-index:4">
        <div class="w3-modal-content w3-animate-zoom">
          <div class="w3-container  w3-green">
            <h2>Aggiungi FAQ</h2>
          </div>
          <div class="w3-panel" style="padding-bottom:16px;">
            <div align='center'>
              {{ Form::open(array('route' => ['faq.store', $faq->id], 'method' => 'POST', 'id'=>'inserimentoFaq', 'class' => 'animate')) }}
              {{ Form::label('domanda', 'Domanda', ['class' => 'label-input-alloggio']) }}
              {{ Form::text('domanda','', ['class' => 'text-input-alloggio', 'id' => 'domanda']) }}
              @if ($errors->first('domanda'))
              <ul class="errors">
                @foreach ($errors->get('domanda') as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
              @endif
              <br>
              {{ Form::label('risposta', 'Risposta', ['class' => 'label-input-alloggio']) }}
              {{ Form::text('risposta','', ['class' => 'text-input-alloggio', 'id' => 'risposta']) }}
              @if ($errors->first('risposta'))
              <ul class="errors">
                @foreach ($errors->get('risposta') as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
              @endif
              <div class="w3-section">
                <a class="w3-button w3-red" style="width:150px; float:left;" onclick="document.getElementById('aggiunta').style.display='none'">Annulla <i class="fa fa-remove"></i></a>
                {{ Form::submit('Inserisci', ['class' => 'w3-button w3-right w3-blue' , 'style'=> "width:150px"]) }}
                {{Form::close()}}

              </div>
            </div>
          </div>
        </div>
      </div>


      @endsection