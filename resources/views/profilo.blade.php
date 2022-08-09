@extends('layouts.private')

@section('title', 'Profilo')

@section('scripts')

@parent
<script language="JavaScript" type="text/javascript" src="{{ asset('js/form_validation.js') }}"></script>
<script language="JavaScript" type="text/javascript">
  $(function() {
    $("#colonna_1").removeClass('column-card')
    $("#card-modifica").hide();
    $("#annulla_modifica").hide();
    $(".btn").click(function() {
      $("#colonna_1").toggleClass('column-card')
      $("#card-modifica").toggle();
      $("#modifica").toggle();
      $("#annulla_modifica").toggle();
    });
  });

  $(function() {
    $(".alert").show().delay(2000).fadeOut("show");
  })
</script>
@endsection

@section('content')
<br>
<br>
<div class="row-card">
  <div id="colonna_1" class="column-card">
    @if ($errors->any())
    <div class="alert">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br />
    @endif
    @if (session('status'))
    <div class="alert success">
      {{ session('status') }}
    </div>
    @endif
    <h3 style="text-align:center">Il tuo profilo</h3>
    <div style="font-size: 20px" class="card">
      @include('helpers/profileImage', ['attrs' => '' , 'imgFile'=>auth()->user()->foto_profilo,'style'=>'width:100%'])
      <p><b>Nome: </b>{{auth()->user()->name}}</p>
      <p><b>Cognome: </b>{{auth()->user()->cognome}}</p>
      <p><b>Sesso: </b>{{auth()->user()->sesso}}</p>
      <p><b>Data di nascita: </b>{{auth()->user()->data_nascita}}</p>
      <p><b>Email: </b>{{auth()->user()->email}}</p>
      <p><b>Cellulare: </b>{{auth()->user()->cellulare}}</p>

      @switch(auth()->user()->livello)
      @case(0)
      <p><b>Ruolo: </b>Admin</p>
      @break

      @case(1)
      <p><b>Ruolo: </b>Locatore</p>
      @break

      @case(2)
      <p><b>Ruolo: </b>Locatario</p>
      @break
      @endswitch
      <p><b>Descrizione: </b>{{auth()->user()->descrizione}}</p>
      <p><button id="modifica" class="btn btn-green">Modifica</button></p>
      <p><button id="annulla_modifica" class="btn btn-red">Annulla Modifica</button></p>
    </div>
  </div>
  <div id="card-modifica" class="column-card">
    <h3 style="text-align:center">Ciao <b>{{auth()->user()->name}}</b></h3>
    <div class="card">
      <h5>ricompila i campi dei dati che desideri modificare</h5>
      {{ Form::open(array('route' => 'updateProfilo.update', 'method' => 'PUT', 'files' => true)) }}
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-id-card']) }}
        {{ Form::label('name', ' Nome', ['class' => 'label-input-card']) }}
        {{ Form::text('name',auth()->user()->name, ['class' => 'input-card', 'id' => 'name']) }}
        @if ($errors->first('name'))
        <ul class="errors">
          @foreach ($errors->get('name') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-id-card']) }}
        {{ Form::label('cognome', ' Cognome', ['class' => 'label-input-card']) }}
        {{ Form::text('cognome',auth()->user()->cognome, ['class' => 'input-card', 'id' => 'cognome']) }}
        @if ($errors->first('cognome'))
        <ul class="errors">
          @foreach ($errors->get('cognome') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-id-card']) }}
        {{ Form::label('sesso', ' Sesso', ['class' => 'label-input-card']) }}
        {{ Form::select('sesso', ['Maschio'=>'Maschio','Femmina'=>'Femmina'], auth()->user()->sesso, ['class' => 'input-card', 'id' => 'sesso']) }}
        @if ($errors->first('sesso'))
        <ul class="errors">
          @foreach ($errors->get('sesso') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-birthday-cake']) }}
        {{ Form::label('data_nascita', ' Data di Nascita', ['class' => 'label-input-card']) }}
        {{ Form::date('data_nascita', auth()->user()->data_nascita, ['class' => 'input-card', 'id' => 'data_nascita']) }}
        @if ($errors->first('data_nascita'))
        <ul class="errors">
          @foreach ($errors->get('data_nascita') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-envelope ']) }}
        {{ Form::label('email', ' Email', ['class' => 'label-input-card']) }}
        {{ Form::text('email', auth()->user()->email, ['class' => 'input-card', 'id' => 'email']) }}
        @if ($errors->first('email'))
        <ul class="errors">
          @foreach ($errors->get('email') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-phone']) }}
        {{ Form::label('cellulare', ' Cellulare', ['class' => 'label-input-card']) }}
        {{ Form::text('cellulare', auth()->user()->cellulare, ['class' => 'input-card', 'id' => 'cellulare']) }}
        @if ($errors->first('cellulare'))
        <ul class="errors">
          @foreach ($errors->get('cellulare') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-user-circle ']) }}
        {{ Form::label('foto_profilo', 'Immagine profilo', ['class' => 'label-input-card']) }}
        {{ Form::file('foto_profilo', ['class' => 'input-card', 'id' => 'foto']) }}
        @if ($errors->first('foto_profilo'))
        <ul class="errors">
          @foreach ($errors->get('foto_profilo') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-user-circle ']) }}
        {{ Form::label('descrizione', 'Descrizione', ['class' => 'label-input-card']) }}
        {{ Form::textarea('descrizione',auth()->user()->descrizione ,['class' => 'input-card', 'id' => 'foto']) }}
        @if ($errors->first('descrizione'))
        <ul class="errors">
          @foreach ($errors->get('descrizione') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>

      <div class="wrap-input  rs1-wrap-input">
        {{ Form::submit('Conferma Modifica', ['class' => 'btn-green']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection