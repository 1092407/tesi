@extends('layouts.private')

@section('title', 'Inserisci alloggio')

@section('scripts')

@parent
<script src="{{ asset('js/form_validation.js') }}"></script>
<script>
    $(function() {
        var actionUrl = "{{ route('addHome.store') }}";
        var formId = 'addHome';
        $(":input").on('blur', function(event) {
            var formElementId = $(this).attr('id'); //recupera l'id dell'oggetto che ha perso il focus 
            doElemValidation(formElementId, actionUrl, formId); //funzione js che prende il valore dell'elemento lo invia
            // al server usando ajax e processerà la ripsota proveniente dal server
        });
        $("#addHome").on('submit', function(event) {
            event.preventDefault(); //funzione che attiva il metodo associato all'evento di click sul bottone che blocca il meccanismo standard
            // di gestione dell'evento da parte del browser
            doFormValidation(actionUrl, formId, 'POST'); //attiva una funzione js definita da noi che invece implementa la submit
        });
    });

    $(function() {
        $('#letti_posto_letto').hide();
        $('#Angolo_Studio').hide();
        $('input[name = "tipologia"]').click(function() {
            var tipo = $('input[name = "tipologia"]:checked').val();
            if (tipo == 1) {
                $('#letti_posto_letto').show();
                $('#Angolo_Studio').show();
                $('#Locale_Ricreativo').hide();
                $('#Locale_Ricreativo').prop('checked', false);
            } else {
                $('#letti_posto_letto').hide();
                $('#Angolo_Studio').hide();
                $('#Angolo_Studio').prop('checked', false);
                $('#Locale_Ricreativo').show();
                $('#letti_pl').prop('selectedIndex', 0);
            }

        });
    });

    $(function() {
        $('#vincoli').hide();
        $('input[name="vuoiVincoli"]').click(function() {
            var tipo = $('input[name = "vuoiVincoli"]:checked').val();
            if (tipo == 'Si')
                $('#vincoli').show();
            else {
                $('#vincoli').hide();
                $('input[name="sesso"]').prop('checked', false);
                $('input[name="matricola"]').prop('checked', false);
                $('input[name="eta_max"]').val(90);
                $('input[name="eta_max"]').prop('disable', true);
            }
        });
    });
</script>
@endsection

@section('content')
<div class="static">
    <h2>Aggiungi Offerte</h2>
    <p>Utilizza questa form per inserire un nuovo alloggio nel Catalogo.</p>

    <div class="container-contact">
        <div class="wrap-contact">
            {{ Form::open(array('route' => 'addHome.store', 'id' => 'addHome', 'files' => true, 'class' => 'contact-form')) }}
            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('titolo', 'Titolo annuncio:', ['class' => 'label-input-app']) }}
                {{ Form::text('titolo', '', ['class' => 'input-app', 'id' => 'titolo']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('foto', 'Foto annuncio:', ['class' => 'label-input-app']) }}
                {{ Form::file('foto', ['class' => 'input-app', 'id' => 'foto']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('regione', 'Regione:', ['class' => 'label-input-app']) }}
                {{ Form::select('regione',['Abruzzo'=>'Abruzzo',
                          'Basilicata'=>'Basilicata',
                                           'Calabria'=>'Calabria',
                                           'Campania'=>'Campania', 
                                           'Emilia Romagna'=>'Emilia Romagna',
                                           'Friuli-Venezia Giulia'=>'Friuli-Venezia Giulia',
                                           'Lazio'=>'Lazio', 
                                           'Liguria'=>'Liguria',
                                           'Lombardia'=>'Lombardia',
                                           'Marche'=>'Marche',
                                           'Molise'=>'Molise',
                                           'Piemonte'=>'Piemonte',
                                           'Puglia'=>'Puglia',
                                           'Sardegna'=>'Sardegna',
                                           'Sicilia'=>'Sicilia',
                                           'Toscana'=>'Toscana',
                                           'Trentino-Alto Adige'=>'Trentino-Alto Adige',
                                           'Umbria'=>'Umbria',
                                           'Valle d\'Aosta'=>'Valle d\'Aosta',
                                           'Veneto'=>'Veneto'], null, ['class' => 'input','id' => 'regione', 'placeholder' => 'Seleziona una regione']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('citta', 'Città:', ['class' => 'label-input-app']) }}
                {{ Form::text('citta', '', ['class' => 'input-app', 'id' => 'citta']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('cap', 'CAP:', ['class' => 'label-input-app']) }}
                {{ Form::text('cap', '', ['class' => 'input-app', 'id' => 'cap']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('indirizzo', 'Indirizzo:', ['class' => 'label-input-app']) }}
                {{ Form::text('indirizzo', '', ['class' => 'input-app', 'id' => 'indirizzo']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('numero', 'N° civico:', ['class' => 'label-input-app']) }}
                {{ Form::text('numero','', ['class' => 'input-app','id' => 'numero']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('prezzo', 'Canone mensile:', ['class' => 'label-input-app']) }}
                {{ Form::text('prezzo', '', ['class' => 'input-app', 'id' => 'prezzo']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('tipologia', 'Tipologia Offerta:', ['class' => 'label-input-app']) }}
                <ul class="my-filter">
                    <li>{{ Form::radio('tipologia',0,true, ['id' => 'appartamento']) }} {{ Form::label('appartamento','Appartamento') }}</li>
                    <li>{{ Form::radio('tipologia',1,false, ['id' => 'posto_letto']) }} {{ Form::label('posto_letto', 'Posto letto') }}</li>
                </ul>
            </div>

            <div id='letti_posto_letto' class="wrap-input  rs1-wrap-input">
                {{ Form::label('letti_pl', 'Posto letto in camera:', ['class' => 'label-input-app']) }}
                {{ Form::select('letti_pl', [0 =>'Seleziona la tipologia', 1 => 'Singola',2 => 'Doppia'], null, ['class' => 'input','id' => 'letti_pl']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('superficie', 'Superficie in metri quadri:', ['class' => 'label-input-app']) }}
                {{ Form::text('superficie', '', ['class' => 'input-app', 'id' => 'superficie']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('letti_ap', 'N° letti nell\'appartamento:', ['class' => 'label-input-app']) }}
                {{ Form::text('letti_ap', '', ['class' => 'input-app', 'id' => 'letti_ap']) }}
            </div>



            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('n_camere', 'N° Camere:', ['class' => 'label-input-app']) }}
                {{ Form::text('n_camere', '', ['class' => 'input-app', 'id' => 'n_camere']) }}
            </div>

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('periodo_locazione', 'Periodo di locazione:', ['class' => 'label-input-app']) }}
                {{ Form::select('periodo_locazione',[3 => '3 Mesi',6 => '6 Mesi', 12 => '1 Anno'], null, ['class' => 'input','id' => 'periodo_locazione', 'placeholder' => 'Seleziona un periodo']) }}
            </div>

            @isset($servizi)
            <div class="w3-row-padding">
                {{ Form::label('servizio', 'Servizi inlcusi:', ['class' => 'label-input-app']) }}
                <ul class="w3-bar-block w3-text">
                    @foreach ( $servizi as $servizio)
                    <li id="{{$servizio->nome}}"> {{Form::checkBox('servizi[]',$servizio->id)}}
                        {{Form::label($servizio->nome)}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endisset

            @isset($vincoli)
            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('vuoiVincoli', 'Vuoi applicare dei vincoli?', ['class' => 'label-input-app']) }}
                <ul class="my-filter">
                    <li>{{ Form::radio('vuoiVincoli','No',true, ['id' => 'negativo']) }} {{ Form::label('negativo', 'No') }}</li>
                    <li>{{ Form::radio('vuoiVincoli','Si',false, ['id' => 'affermativo']) }} {{ Form::label('affermativo','Sì') }}</li>

                </ul>
            </div>
            <div id="vincoli" class="w3-row-padding">
                {{ Form::label('vincolo', 'Vincoli:', ['class' => 'label-input-app']) }}
                <ul class="w3-bar-block w3-text">

                    @foreach ($vincoli as $vincolo)

                    @php

                    if($vincolo->id === 17 || $vincolo->id === 18)
                    $name = 'sesso';

                    elseif($vincolo->id === 19 || $vincolo->id === 20)
                    $name = 'matricola';
                    @endphp

                    <li>{{Form::radio($name, $vincolo->id, false)}} {{Form::Label($vincolo->nome)}}</li>

                    @endforeach
                    <li>{{ Form::label('eta_max', 'Età massima: ') }}{{ Form::number('eta_max', 90, ['id' => 'eta_max']) }} </li>
                </ul>
            </div>
            @endisset

            <div class="wrap-input  rs1-wrap-input">
                {{ Form::label('descrizione', 'Descrizione Appartamento:', ['class' => 'label-input-app']) }}
                {{ Form::textarea('descrizione', '', ['class' => 'input-app', 'id' => 'descrizione']) }}
            </div>

            <div class="container-form-btn">
                {{ Form::submit('Aggiungi Alloggio', ['class' => 'form-btn1']) }}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection