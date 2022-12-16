@extends('layouts.concessionario')
@section('title', 'Modifica auto')

@section('content')
@isset($auto)


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:30px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">

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
            <h2>Qui modifichi i dati di questa auto</h2>
        </div>
        <div class="w3-panel" style="padding-bottom:16px;">
            <div align='center'>
                {{ Form::open(array('route' => ['auto.update', ($auto->id)], 'files' => true,'method' => 'PUT', 'id'=>'modificaauto', 'class' => 'animate')) }}

              <div class="wrap-input">
                    {{ Form::label('', '', ['class' => ' fa fa-id-card-o']) }}
                    {{ Form::label('marca', 'Marca', ['class' => 'label-input']) }}
                    {{ Form::text('marca',   $auto->marca  , ['class' => 'input', 'id' => 'marca']) }}
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('marca') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('', '', ['class' => 'fa fa-id-card-o']) }}
                    {{ Form::label('modello', 'Modello', ['class' => 'label-input ']) }}
                    {{ Form::text('modello', $auto->modello, ['class' => 'input', 'id' => 'modello']) }}
                    @if ($errors->first('modello'))
                    <ul class="errors">
                        @foreach ($errors->get('modello') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>


             <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-commenting-o ']) }}
        {{ Form::label('descrizione', 'Descrizione', ['class' => 'label-input-card']) }}
        {{ Form::textarea('descrizione',$auto->descrizione ,['class' => 'input-card', 'id' => 'foto']) }}
        @if ($errors->first('descrizione'))
        <ul class="errors">
          @foreach ($errors->get('descrizione') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endif
      </div>


           <div class="wrap-input  rs1-wrap-input">
        {{ Form::label('','', ['class' => 'fa fa-picture-o ']) }}
        {{ Form::label('foto', 'Immagine ', ['class' => 'label-input-card']) }}
        {{ Form::file('foto', ['class' => 'input-card', 'id' => 'foto']) }}
        @if ($errors->first('foto'))
        <ul class="errors">
          @foreach ($errors->get('foto') as $message)
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
