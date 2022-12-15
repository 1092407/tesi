
@extends('layouts.concessionario')
@section('title', 'Modifica cliente')

@section('content')
@isset($cliente)


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h5 id="titolo" style="margin-bottom:0px;  "><b>ATTENZIONE: se inserisci username e/o targa già in uso  verrà segnalato un errore,i dati non verranno salvati e si dovrà procedere con una nuova operazione di  modifica</b></h5>

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
    <div class="w3-container" align='center'>
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container  w3-blue">
            <h2>Qui modifichi i dati di un cliente</h2>
        </div>
        <div class="w3-panel" style="padding-bottom:16px;">
            <div align='center'>
                {{ Form::open(array('route' => ['cliente.update', ($cliente[0])], 'method' => 'PUT', 'id'=>'modificacliente', 'class' => 'animate')) }}

              <div class="wrap-input">
                    {{ Form::label('', '', ['class' => ' fa fa-id-card-o']) }}
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name',   $cliente[1]  , ['class' => 'input', 'id' => 'name']) }}
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('', '', ['class' => 'fa fa-id-card-o']) }}
                    {{ Form::label('cognome', 'Cognome', ['class' => 'label-input ']) }}
                    {{ Form::text('cognome', $cliente[2], ['class' => 'input', 'id' => 'surname']) }}
                    @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



                    <div class="wrap-input">
                    {{ Form::label('', '', ['class' => 'fa fa-birthday-cake']) }}
                    {{ Form::label('datavendita', 'Data di Nascita', ['class' => 'label-input']) }}
                    {{Form::date('datavendita', $cliente[3],['class'=>'input'])}}

                    @if ($errors->first('datavendita'))
                    <ul class="errors">
                        @foreach ($errors->get('datavendita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



               <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-user']) }}
                {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', $cliente[5], ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

               <div class="wrap-input">
                {{ Form::label('targa', 'Targa', ['class' => 'fa fa-credit-card']) }}
                {{ Form::text('targa', $cliente[4], ['class' => 'input descrizione', 'id' => 'descrizione']) }}
                @if ($errors->first('targa'))
                <ul class="errors">
                    @foreach ($errors->get('targa') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>


            <div class="wrap-input">
                {{ Form::label('auto', 'Auto', ['class' => 'fa fa-car']) }}
                {{ Form::text('auto', $cliente[6], ['class' => 'input descrizione', 'id' => 'descrizione']) }}
                @if ($errors->first('auto'))
                <ul class="errors">
                    @foreach ($errors->get('auto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>



                {{ Form::submit('Salva Modifica', ['class' => 'w3-button w3-right w3-blue' , 'style'=> "width:150px"]) }}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>


@endisset
@endsection
