@extends('layouts.concessionario')

@section('title', 'Registrazione cliente')

@section('content')
<div class="static w3-center">
    <h2><b>Registrazione cliente</b></h2>
    <p>Utilizza questa form per registrare i tuoi nuovi clienti </p>
    <hr>
    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'registraclienti_post', 'files' => true, 'class' => 'contact-form')) }}



                <div class="wrap-input">
                    {{ Form::label('', '', ['class' => ' fa fa-id-card-o']) }}
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}
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
                    {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'surname']) }}
                    @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



            <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-user']) }}
                {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-lock']) }}
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-lock']) }}
                {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
            </div>


             <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-user-secret']) }}
                {{ Form::label('livello', 'Qual è il suo ruolo?', ['class' => 'label-input']) }}<br>
                <ul class='my-filter ruolo'>
                    <li>{{ Form::radio('livello','cliente', false ,['class' => 'input', 'id' => 'staff']) }} {{ Form::label('livello', 'cliente ', ['class' => 'label-input']) }}</li>

                </ul>
                @if ($errors->first('livello'))
                <ul class="errors">
                    @foreach ($errors->get('livello') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>




         <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-car']) }}
                {{ Form::label('auto', 'auto', ['class' => 'label-input']) }}
                {{ Form::text('auto', '', ['class' => 'input','id' => 'auto']) }}
                @if ($errors->first('auto'))
                <ul class="errors">
                    @foreach ($errors->get('auto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

           <div class="wrap-input">
                {{ Form::label('', '', ['class' => 'fa fa-credit-card']) }}
                {{ Form::label('targa', 'targa', ['class' => 'label-input']) }}
                {{ Form::text('targa', '', ['class' => 'input','id' => 'targa']) }}
                @if ($errors->first('targa'))
                <ul class="errors">
                    @foreach ($errors->get('targa') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="wrap-input">
                    {{ Form::label('', '', ['class' => 'fa fa-calendar-check-o']) }}
                    {{ Form::label('datavendita', 'Data di vendita', ['class' => 'label-input']) }}
                    {{Form::date('datavendita', \Carbon\Carbon::now(),['class'=>'input'])}}

                    @if ($errors->first('datavendita'))
                    <ul class="errors">
                        @foreach ($errors->get('datavendita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>






            <div class="container-form-btn">
                {{ Form::submit('Registra cliente', ['class' => 'my-button']) }}
            </div>



            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection
