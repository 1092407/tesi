@extends('layouts.concessionario')

@section('title', 'Inserisci Auto')

@section('content')
<div class="static w3-center">

    <p>Utilizza questa form per inserire nuove auto per renderle visibili a nuovi potenziali clienti  </p>
    <hr>
    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'inserisciauto_post', 'files' => true, 'class' => 'contact-form')) }}

                <div class="wrap-input">
                    {{ Form::label('', '', ['class' => 'fa fa-picture-o']) }}
                    {{ Form::label('foto', 'Foto ', ['class' => 'label-input ']) }}
                    {{ Form::file('foto', ['class' => 'input', 'id' => 'foto']) }}
                    @if ($errors->first('foto'))
                    <ul class="errors">
                        @foreach ($errors->get('foto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('', '', ['class' => ' fa fa-id-card-o']) }}
                    {{ Form::label('marca', 'Marca', ['class' => 'label-input']) }}
                    {{ Form::text('marca', '', ['class' => 'input', 'id' => 'marca']) }}
                    @if ($errors->first('marca'))
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
                    {{ Form::text('modello', '', ['class' => 'input', 'id' => 'surname']) }}
                    @if ($errors->first('modello'))
                    <ul class="errors">
                        @foreach ($errors->get('modello') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

            <div class="wrap-input">
                {{ Form::label('descrizione', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('descrizione', '', ['class' => 'input descrizione', 'id' => 'descrizione']) }}
                @if ($errors->first('descrizione'))
                <ul class="errors">
                    @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="container-form-btn">
                {{ Form::submit('Inserisci', ['class' => 'my-button']) }}
            </div>




            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection
