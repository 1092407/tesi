@extends('layouts.private')

@section('title', $alloggio->titolo)

@section('scripts')

@parent
<script>
    var modal = document.getElementById('modifica');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    $(function() {

        if ($("#appartamento").prop("checked")) {
            $('#letti_posto_letto').hide();
            $('.Angolo_Studio').hide();
            $('.Locale_Ricreativo').show();
        } else if ($('#posto_letto').prop("checked")) {
            $('#letti_posto_letto').show();
            $('.Angolo_Studio').show();
            $('.Locale_Ricreativo').hide();
        }

        $('input[name = "tipologia"]').click(function() {
            tipo = $('input[name = "tipologia"]:checked').val();
            if (tipo == 1) {
                $('#letti_posto_letto').show();
                $('.Angolo_Studio').show();
                $('#Locale_Ricreativo').prop("checked", false);
                $('.Locale_Ricreativo').hide();

            } else {
                $('#letti_posto_letto').hide();
                $('#Angolo_Studio').prop("checked", false);
                $('.Angolo_Studio').hide();
                $('.Locale_Ricreativo').show();
                $('#letti_pl').prop('selectedIndex', 0);
            }

        });
    });

    $(function() {
        if ($("#affermativo").prop("checked"))
            $('#vincoli').show();
        else if ($('#negativo').prop('checked'))
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

    $(function() {
        $(".alert").show().delay(2000).fadeOut("show");
    })
</script>
@endsection

@section('content')
<br>
<br>

@can('isLocatore')
    <a href="{{route('home')}}"><i class="fa fa-arrow-left"></i><b> Torna alla home</b></a>
@endcan
@can('isLocatario')
@if(url()->previous() == url()->current())
    <a href="{{route('home')}}"><i class="fa fa-arrow-left"></i><b> Torna alla home</b></a>
@else
    <a href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i><b> Torna indietro</b></a>
@endif
@endcan


<div class="w3-content w3-padding" style="max-width:1654px">
    <div class="w3-row-padding">
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
    </div>
    <div class="w3-row-padding">
        <div style="border: 1px solid rgb(221, 221, 221); border-radius: 12px; padding-right: 20px; padding-top: 0px ;padding-left: 0px;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:258px;">
            <div class=" w3-container w3-margin-bottom " style=" width: 400px; max-height:300px; float:left; padding-left: 0px;">
                @include('helpers/alloggioImage',['attrs'=>"style='height:257px'",'imgFile'=>$alloggio->foto])
            </div>
            <div>
                <div style="padding-top:10px;">
                    <span style="font-size:32px; color:black;">{{$alloggio->titolo}}</span>
                    <div style="float:right; padding-right: 10px; padding-top:12px;">
                        @if(($alloggio->tipologia)===1)
                        <span id="categoria" style="font-size: 12px; background: lightgray; border-radius: 4px; padding-left: 4px; padding-right: 4px; ">POSTO LETTO</span>
                        @else
                        <span id="categoria" style="font-size: 12px; background: lightgray; border-radius: 4px; padding-left: 4px; padding-right: 4px; ">APPARTAMENTI</span>
                        @endif
                    </div>
                </div>
                <hr style="margin:5px; margin-bottom:10px;">
                <div>
                    <i class="fa fa-map-o" style="color:black;"></i> {{$alloggio->regione}}, {{$alloggio->citta}}, {{$alloggio->cap}}, {{$alloggio->indirizzo}}, {{$alloggio->numero}}
                    <div style="float:right;">
                        <span style="font-size:10px;"><i class="fa fa-upload" style="color:black;"></i> Aggiunto il: {{$alloggio->created_at}} </span>
                        <span style="font-size:10px; padding-left:16px;"><i class="fa fa-refresh" style="color:black;"></i> Ultima modifica il: {{$alloggio->updated_at}} </span>
                    </div>
                </div>
                <div style="padding-top:10px;">
                    <div style="width:100%">
                        <div style="padding-top:10px;">
                            <div style="float:left; width:230px;">
                                <span><i class="fa fa-calendar" style="color:black;"></i> Periodo Locazione: {{$alloggio->periodo_locazione}} Mesi</span>
                            </div>
                            <div style="float:right; ">
                                <span><i class="fa fa-odnoklassniki " style="color:black;"></i> Locatore: {{$locatore->name}} {{$locatore->cognome}}</span>
                            </div>
                            <div style="text-align:center;">
                                @if(($alloggio->tipologia)===0)
                                <span><i class="fa fa-crop" style="color:black;"></i> Superficie: {{$alloggio->superficie}} mq </span>
                                @else
                                <span><i class="fa fa-crop" style="color:black;"></i> Superficie Camera: {{$alloggio->superficie}} mq </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="width:100%">
                        <div style="padding-top:20px;">
                            <div style="float:right; ">
                                @if(($alloggio->opzionato)===1)
                                <span style="color:red;">● Non Disponibile</span>
                                @else
                                <span style="color:lightgreen;">● Disponibile</span>
                                @endif
                            </div>
                            @if(($alloggio->tipologia)===1)
                            <div style="float:left; ">
                                @if(($alloggio->letti_pl)===1)
                                <span><i class="fa fa-bed" style="color:black;"></i> Camera Singola </span>
                                @else
                                <span><i class="fa fa-bed" style="color:black;"></i> Camera Doppia </span>
                                @endif
                            </div>
                            <div style="text-align:center;">
                                <span><i class="fa fa-bed" style="color:black;"></i> Camere Appartamento: {{$alloggio->n_camere}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-bed" style="color:black;"></i> Posti Letto Appartamento: {{$alloggio->letti_ap}}</span>
                            </div>
                            @else
                            <div style="float:left; width:120px;">
                                <span><i class="fa fa-bed" style="color:black;"></i> Camere: {{$alloggio->n_camere}}</span>
                            </div>
                            <div style="text-align:center;">
                                <span><i class="fa fa-bed" style="color:black;"></i> Posti Letto: {{$alloggio->letti_ap}}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div style="width:100%">
                        <div style="padding-top:15px;">
                            <div style="float:left; width:230px; padding-top:5px;">
                                <span style="font-size: 24px; color:black;">{{$alloggio->prezzo}}€ </span>/mese
                            </div>
                            @can('isLocatore')
                            @if(($alloggio->opzionato)===0)
                            <div style="float:right;">
                                <button class="buttonAlloggio buttonAlloggio1 roundedcorners" onclick="document.getElementById('richieste').style.display='block'">Visualizza Richieste</button>
                            </div>
                            <button style="float:right;" class="buttonAlloggio buttonAlloggio1 roundedcorners" onclick="document.getElementById('modifica').style.display='block'">Modifica Annuncio</button>
                            <form action="{{ route('annuncio.delete', $alloggio->id)}}" method="post" style="float:right;">
                                @csrf
                                @method('DELETE')
                                <!--Le form HTML non supportano il metodo delete o put so, when defining PUT, PATCH, or DELETE routes that are called from an HTML 
                                                              form, you will need to add a hidden _method field to the form. The value sent with the _method field will be used as the HTTP request method:-->
                                <button class="buttonAlloggio buttonAlloggio1 roundedcorners" type="submit" onclick= "return confirm('Sei sicuro di voler eliminare l\'annuncio?')">Rimuovi Annuncio</button>
                            </form>
                            @elseif(isset($richiesta_accettata))
                            <div style="float:right;">
                                <a class="buttonAlloggio buttonAlloggio1 roundedcorners" href="{{route('contratto',$richiesta_accettata[0]->id)}}">Visualizza Contratto</a>
                            </div>
                            @endif
                            
                            
                            
                            @endcan
                            @can('isLocatario')
                            <div style="float:right; ">
                                @if(($alloggio->opzionato)===0)
                                <button class="buttonAlloggio buttonAlloggio1 roundedcorners" onclick="document.getElementById('richiedi').style.display='block'">Richiedi </button>
                                @endif
                                <a href="javascript:void(0)" class="buttonAlloggio buttonAlloggio1 roundedcorners" onclick="document.getElementById('messaggio').style.display='block'">Contatta locatore</a>
                            </div>
                            <div style="width:100%">

                                <!-- Modal that pops up when you click on "New Message" -->
                                <div id="messaggio" class="modal" style="z-index:4">
                                    <div class="w3-modal-content w3-animate-zoom">
                                        <div class="w3-container w3-padding w3-blue">
                                            <h2>Invia Messaggio</h2>
                                        </div>
                                        <div class="w3-panel">
                                            <div align='center'>
                                                {{ Form::open(array('route' => ['messaggio.store', $alloggio->id, $locatore->id], 'id'=>'messaggio', 'class' => 'animate')) }}
                                                {{ Form::label('destinatario', 'Destinatario', ['class' => 'label-input-alloggio']) }}<br>
                                                {{ Form::label('destinatario',$locatore->name." ".$locatore->cognome, ['class' => 'input-app w3-input w3-border label-input-app', 'id' => 'destinatario']) }}<br>
                                                <hr>
                                                {{ Form::label('mittente', 'Mittente', ['class' => 'label-input-alloggio']) }}<br>
                                                {{ Form::label('mittente', auth()->user()->name." ".auth()->user()->cognome, ['class' => 'input-app w3-input label-input-app w3-border', 'id' => 'mittente']) }}<br>
                                                <hr>
                                                {{ Form::label('oggetto', 'Oggetto', ['class' => 'label-input-alloggio']) }}<br>
                                                {{ Form::label('oggetto',$alloggio->titolo.", ".$alloggio->citta.", ".$alloggio->indirizzo.", ".$alloggio->numero, ['class' => 'input-app w3-input w3-border label-input-app', 'id' => 'oggetto']) }}<br>
                                                <hr>
                                                {{ Form::textarea('contenuto','', ['class' => 'input-app w3-input w3-border', 'id' => 'contenuto', 'placeholder'=>'Cosa vuole scrivere?']) }}<br>
                                            </div>
                                            <div class="w3-section">
                                                <a class="w3-button w3-red" style="width:150px" onclick="document.getElementById('messaggio').style.display='none'">Annulla <i class="fa fa-remove"></i></a>
                                                {{ Form::submit('Invia', ['class' => 'w3-button w3-right w3-blue' , 'style'=> "width:150px"]) }}
                                                {{Form::close()}}
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            @guest
                            
                            @endguest
                            <div style="text-align:center;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin:0px; margin-bottom:16px;">
    <div class="w3-row-padding">
        <div style="border: 1px solid rgb(221, 221, 221); border-radius: 12px; padding-right: 20px; padding-top: 0px ;padding-left: 20px;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:320px; float:left; width:33%;">
            <div style="padding-top:10px;">
                <span style="font-size:26px; color:black;">Descrizione</span>
            </div>
            <hr style="margin:5px; margin-bottom:10px;">
            {{$alloggio->descrizione}}
        </div>
        <div style="border: 1px solid rgb(221, 221, 221); border-radius: 12px; padding-right: 20px; padding-top: 0px ;padding-left: 20px;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:320px; float:right; width:66%;">
            <div style="padding-top:10px;">
                <span style="font-size:26px; color:black;">Servizi Offerti</span>
            </div>
            <hr style="margin:5px; margin-bottom:5px;">
            @isset($servizi_alloggio)
            <table style="width:100%">
                <tr>
                    @php
                    $i=0;
                    @endphp

                    @foreach($servizi_alloggio as $servizio_alloggio)
                    @php
                    $output = str_replace('_', ' ', $servizio_alloggio->nome);
                    $i++;
                    @endphp
                    <td>{{$output}}</td>
                    @if($i%3 == 0)
                </tr>
                <tr>
                    @endif
                    @endforeach
                </tr>
            </table>
            @endisset
            <div style="padding-top:10px;">
                <span style="font-size:26px; color:black;">Vincoli Affitto</span>
            </div>
            <hr style="margin:5px; margin-bottom:5px;">
            @isset($vincoli_alloggio)
            <table style="width:100%">
                <tr>
                    @foreach($vincoli_alloggio as $vincolo_alloggio)
                    @php
                    $output = str_replace('_', ' ', $vincolo_alloggio->nome);
                    $i++;
                    @endphp
                    <td>{{$output}}</td>
                    @endforeach
                    @if(!is_null($alloggio->eta_max ))
                    <td>Range Età: 18 - {{$alloggio->eta_max}}</td>
                    @endif
                </tr>
            </table>
            @endisset
        </div>
    </div>
</div>

@can('isLoggato')


@can('isLocatore')
<div id="richieste" class="modal">
    <span onclick="document.getElementById('richieste').style.display='none'" class="close" title="Chiudi Richieste">&times;</span>
    <div class="container w3-animate-left" style=" overflow:auto;">        
    <div style="text-align:center">
    @isset($richieste_annuncio)
    @if($richieste_annuncio->isEmpty() && $alloggio->opzionato == 0)
    <span>Spiacenti, ma ancora non hai ricevuto nessuna richiesta per questo alloggio!</span>
    @elseif($richieste_annuncio->isEmpty() && $alloggio->opzionato == 1)
    <span>Questo alloggio è stato già asseganto!</span>
    @else
        <table class="w3-table-all table-striped">
        <thead>
        <tr>
          <td colspan = 2><b style="font-size:18px;">Locatario</b></td>
          <td><b style="font-size:18px;">Sesso</b></td>
          <td><b style="font-size:18px;">Data di Nascità</b></td>
          <td><b style="font-size:18px;">Cellulare</b></td>
          <td><b style="font-size:18px;">Email</b></td>
          <td><b style="font-size:18px;">Data Richiesta</b></td>
          <td colspan = 2><b style="font-size:18px;">Azioni</b></td>
        </tr>
    </thead>
    <tbody>
    
    @foreach($richieste_annuncio as $richiesta)

        <tr>
            
            <td>{{$richiesta->name}}</td>
            <td>{{$richiesta->cognome}}</td>
            <td>{{$richiesta->sesso}}</td>
            <td>{{$richiesta->data_nascita}}</td>
            <td>{{$richiesta->cellulare}}</td>
            <td>{{$richiesta->email}}</td>
            <td>{{$richiesta->data_richiesta}}</td>
            <td><form action="{{ route('richiestaRisposta', [$richiesta->id, 2])}}" method="post" >
                @csrf
                @method('PUT')
                <button class="w3-button w3-green" type="submit" onclick= "return confirm('Sei sicuro di voler accettare l\'offerta?')">Accetta</button>
            </form></td>
            <td><form action="{{ route('richiestaRisposta', [$richiesta->id, 0])}}" method="post" >
                @csrf
                @method('PUT')
                <button class="w3-button w3-red" type="submit" onclick= "return confirm('Sei sicuro di voler rifiutare l\'offerta?')">Rifiuta</button>
            </form></td>
        </tr>
        @endforeach
        @endisset
    </tbody>
  </table>
  @endif
        </div>
    </div>
</div>
@endcan




<div id="confermarifiuto" class="modal" style="z-index:4">
                                    <div class="w3-modal-content w3-animate-zoom">
                                        <div class="w3-container w3-padding w3-blue">
                                            <h2 style="text-align:center">Sei sicuro di voler rifiutare l'opzione di questo locatore?</h2>
                                        </div>
                                        <div class="w3-panel">
                                            <div>
                                                <h4 style="text-align:center">Se rifiuti questa richiesta, il locatario potrà richiedere nuovamente l'opzione dell'annuncio fino alla sua opzione.</h4>
                                            </div>
                                            <div class="w3-section">
                                                @can('_isLocatore')
                                                {{ Form::open(array('route' => ['richiesta.refuse', $richiesta->id], 'method' => 'PUT', 'id'=>'richiesta', 'class' => 'animate')) }}
                                                <a class="w3-button w3-red" style="width:150px" onclick="document.getElementById('confermarifiuto').style.display='none'">Annulla <i class="fa fa-remove"></i></a>
                                                {{ Form::submit('Rifiuta', ['class' => 'w3-button w3-right w3-green' , 'style'=> "width:150px"]) }}
                                                {{Form::close()}}
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>







<div id="confermaopzione" class="modal" style="z-index:4">
                                    <div class="w3-modal-content w3-animate-zoom">
                                        <div class="w3-container w3-padding w3-blue">

                                            <h2 style="text-align:center">Sei sicuro di voler accettare l'opzione di questo locatore?</h2>
                                        </div>
                                        <div class="w3-panel">
                                            <div>
                                                <h4 style="text-align:center">Se accetti questa richiesta, verranno automaticamente rifiutate le altre richieste in attesa per questo alloggio.</h4>
                                            </div>
                                            <div class="w3-section">
                                                <a class="w3-button w3-red" style="width:150px" onclick="document.getElementById('confermaopzione').style.display='none'">Annulla <i class="fa fa-remove"></i></a>
                                                {{ Form::submit('Accetta', ['class' => 'w3-button w3-right w3-green' , 'style'=> "width:150px"]) }}
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>













<div id="richiedi" class="modal" style="z-index:4">
                                    <div class="w3-modal-content w3-animate-zoom">
                                        @if($richieste_locatario==NULL)
                                        <div class="w3-container w3-padding w3-blue">

                                            <h2 style="text-align:center">Sei sicuro di voler richedere quest'annuncio al locatore?</h2>
                                        </div>
                                        <div class="w3-panel">
                                            <div class="w3-section">
                                                {{ Form::open(array('route' => ['richiesta.store', $alloggio->id, auth()->user()->id], 'method' => 'POST', 'id'=>'richiesta', 'class' => 'animate')) }}
                                                <a class="w3-button w3-red" style="width:150px" onclick="document.getElementById('richiedi').style.display='none'">Annulla <i class="fa fa-remove"></i></a>
                                                {{ Form::submit('Invia', ['class' => 'w3-button w3-right w3-green' , 'style'=> "width:150px"]) }}
                                                {{Form::close()}}
                                                
                                            </div>
                                        </div>
                                        @else
                                        <div class="w3-container w3-padding w3-blue">

                                            <h2 style="text-align:center">Hai già richiesto questo annuncio, attendi la risposta del locatore!</h2>
                                        </div>
                                        <div class="w3-panel">
                                            <div class="w3-section" style="text-align:center">
                                                <a class="w3-button w3-red" style="width:150px" onclick="document.getElementById('richiedi').style.display='none'">Chiudi <i class="fa fa-remove"></i></a>               
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>






<div id='modifica' class="row modal">
    <div class="col-75">
        <div class="container">
            {{ Form::open(array('route' => ['annuncio.update', $alloggio->id], 'method' => 'PUT', 'files' => true, 'id'=>'modificaAnnuncio', 'class' => 'animate')) }}
            <div class="row">
                <span onclick="document.getElementById('modifica').style.display='none'" class="close" title="Chiudi Form Modifica">&times;</span>
                <div class="col-50">
                    <h3 style='text-align:center;'>Form di modifica annuncio</h3>
                    {{ Form::label('titolo', 'Titolo annuncio', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('titolo', $alloggio->titolo, ['class' => 'text-input-alloggio', 'id' => 'titolo']) }}
                    @if ($errors->first('titolo'))
                    <ul class="errors">
                        @foreach ($errors->get('titolo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('foto', 'Foto annuncio', ['class' => 'label-input-alloggio']) }}
                    {{ Form::file('foto', ['class' => 'text-input-alloggio', 'id' => 'foto']) }}
                    @if ($errors->first('foto'))
                    <ul class="errors">
                        @foreach ($errors->get('foto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('regione', 'Regione', ['class' => 'label-input-alloggio']) }}
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
                                           'Veneto'=>'Veneto'], $alloggio->regione, ['class' => 'text-input-alloggio','id' => 'regione', 'placeholder' => 'Seleziona una regione']) }}
                    @if ($errors->first('regione'))
                    <ul class="errors">
                        @foreach ($errors->get('regione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('citta', 'Città', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('citta', $alloggio->citta, ['class' => 'text-input-alloggio', 'id' => 'citta']) }}
                    @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('cap', 'CAP', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('cap', $alloggio->cap, ['class' => 'text-input-alloggio', 'id' => 'cap']) }}
                    @if ($errors->first('cap'))
                    <ul class="errors">
                        @foreach ($errors->get('cap') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('indirizzo', $alloggio->indirizzo, ['class' => 'text-input-alloggio', 'id' => 'indirizzo']) }}
                    @if ($errors->first('indirizzo'))
                    <ul class="errors">
                        @foreach ($errors->get('indirizzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('numero', 'N° civico', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('numero',$alloggio->numero, ['class' => 'text-input-alloggio','id' => 'numero']) }}
                    @if ($errors->first('numero'))
                    <ul class="errors">
                        @foreach ($errors->get('numero') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('prezzo', 'Canone mensile', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('prezzo', $alloggio->prezzo, ['class' => 'text-input-alloggio', 'id' => 'prezzo']) }}
                    @if ($errors->first('prezzo'))
                    <ul class="errors">
                        @foreach ($errors->get('prezzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif


                    <div class="row">
                        <div class="col-50">
                            {{ Form::label('tipologia', 'Tipologia Offerta', ['class' => 'label-input-alloggio']) }}

                            @if($alloggio->tipologia === 0)
                            <ul class="my-filter">
                                <li>{{ Form::radio('tipologia',0,true, ['id' => 'appartamento','class' => 'radio-input-alloggio']) }} {{ Form::label('appartamento','Appartamento', ['class' => 'label-input-alloggio']) }}</li>
                                <li>{{ Form::radio('tipologia',1,false, ['id' => 'posto_letto','class' => 'radio-input-alloggio']) }} {{ Form::label('posto_letto', 'Posto letto', ['class' => 'label-input-alloggio']) }}</li>
                            </ul>
                            @else
                            <ul class="my-filter">
                                <li>{{ Form::radio('tipologia',0,false, ['id' => 'appartamento','class' => 'radio-input-alloggio']) }} {{ Form::label('appartamento','Appartamento', ['class' => 'label-input-alloggio']) }}</li>
                                <li>{{ Form::radio('tipologia',1,true, ['id' => 'posto_letto','class' => 'radio-input-alloggio']) }} {{ Form::label('posto_letto', 'Posto letto', ['class' => 'label-input-alloggio']) }}</li>
                            </ul>
                            @endif
                            @if ($errors->first('tipologia'))
                            <ul class="errors">
                                @foreach ($errors->get('tipologia') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <div id=letti_posto_letto class="col-50">
                            {{ Form::label('letti_pl', 'Posto letto in camera', ['class' => 'label-input-alloggio']) }}
                            {{ Form::select('letti_pl', [0 =>'Seleziona la tipologia',1 => 'Singola',2 => 'Doppia'], $alloggio->letti_pl, ['class' => 'text-input-alloggio','id' => 'letti_pl']) }}
                            @if ($errors->first('letti_pl'))
                            <ul class="errors">
                                @foreach ($errors->get('letti_pl') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    {{ Form::label('superficie', 'Superficie in metri quadri:', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('superficie', $alloggio->superficie, ['class' => 'text-input-alloggio', 'id' => 'superficie']) }}
                    @if ($errors->first('superficie'))
                    <ul class="errors">
                        @foreach ($errors->get('superficie') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="col-50">
                    <h3 style='text-align:center;'>Form di modifica annuncio</h3>

                    {{ Form::label('letti_ap', 'N° letti nell\'appartamento:', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('letti_ap', $alloggio->letti_ap, ['class' => 'text-input-alloggio', 'id' => 'letti_ap']) }}
                    @if ($errors->first('letti_ap'))
                    <ul class="errors">
                        @foreach ($errors->get('letti_ap') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('n_camere', 'N° Camere:', ['class' => 'label-input-alloggio']) }}
                    {{ Form::text('n_camere', $alloggio->n_camere, ['class' => 'text-input-alloggio', 'id' => 'n_camere']) }}
                    @if ($errors->first('n_camere'))
                    <ul class="errors">
                        @foreach ($errors->get('n_camere') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::label('periodo_locazione', 'Periodo di locazione:', ['class' => 'label-input-alloggio']) }}
                    {{ Form::select('periodo_locazione',[3 => '3 Mesi',6 => '6 Mesi', 12 => '1 Anno'], $alloggio->periodo_locazione, ['class' => 'text-input-alloggio','id' => 'periodo_locazione', 'placeholder' => 'Seleziona un periodo']) }}
                    @if ($errors->first('periodo_locazione'))
                    <ul class="errors">
                        @foreach ($errors->get('periodo_locazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @isset($servizi)
                    {{ Form::label('servizio', 'Servizi inlcusi', ['class' => 'label-input-alloggio']) }}
                    <table class='table-input-alloggio'>
                        <tr>
                            @php
                            $i=1;
                            @endphp

                            @foreach($servizi as $servizio)
                            @php
                            $checked = false;
                            @endphp

                            @foreach($servizi_alloggio as $servizio_alloggio)
                            @php
                            if($servizio->id == $servizio_alloggio->id){
                            $checked = true;
                            break;
                            }
                            @endphp
                            @endforeach
                            <td class="{{$servizio->nome}}"> {{Form::checkBox('servizi[]',$servizio->id, $checked, ['id' => $servizio->nome])}} {{Form::label($servizio->nome)}}</td>
                            @if($i%3 == 0)
                        </tr>
                        <tr>
                            @endif
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tr>
                    </table>
                    @endisset
                    @if ($errors->first('servizio'))
                    <ul class="errors">
                        @foreach ($errors->get('servizio') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {{ Form::label('descrizione', 'Descrizione Appartamento:', ['class' => 'label-input-alloggio']) }}
                    {{ Form::textarea('descrizione', $alloggio->descrizione, ['class' => 'text-input-alloggio', 'id' => 'descrizione', 'style'=>'text-align:left']) }}
                    @if ($errors->first('descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('descrizione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif


                    @isset($vincoli)
                    <div class="row"></div>

                    @php
                    $vincolo_presente = false;
                    if(!($vincoli_alloggio->isEmpty()))
                       $vincolo_presente = true;
                    @endphp



                    <div class="col-50">
                        {{ Form::label('vuoiVincoli', 'Vuoi applicare dei vincoli?', ['class' => 'label-input-alloggio']) }}
                        <ul class="my-filter">
                            <li>{{ Form::radio('vuoiVincoli','No', !($vincolo_presente), ['id' => 'negativo']) }} {{ Form::label('negativo', 'No', ['class' => 'label-input-alloggio']) }}</li>
                            <li>{{ Form::radio('vuoiVincoli','Si', $vincolo_presente, ['id' => 'affermativo']) }} {{ Form::label('affermativo','Sì', ['class' => 'label-input-alloggio']) }}</li>
                        </ul>
                    </div>
                    <div id='vincoli' class="col-50">
                        {{ Form::label('vincolo', 'Vincoli: ', ['class' => 'label-input-alloggio']) }}

                        @foreach ($vincoli as $vincolo)

                        @php
                        $selected = false;

                        foreach($vincoli_alloggio as $vincolo_alloggio){
                        if($vincolo->id == $vincolo_alloggio->id){
                        $selected = true;
                        break;
                        }
                        }

                        if($vincolo->id === 17 || $vincolo->id === 18)
                        $name = 'sesso';


                        else if($vincolo->id === 19 || $vincolo->id === 20)
                        $name = 'matricola';

                        @endphp

                        {{Form::radio($name, $vincolo->id, $selected)}} {{Form::Label($name, $vincolo->nome)}}
                        @endforeach

                        @if ($errors->first('vincoli'))
                        <ul class="errors">
                            @foreach ($errors->get('vincoli') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <br>{{ Form::label('eta_max', 'Età massima', ['class' => 'label-input-alloggio']) }}{{ Form::number('eta_max', $alloggio->eta_max == NULL ? 90 : $alloggio->eta_max, ['id' => 'eta_max', 'class' => 'text-input-alloggio']) }}
                        @if ($errors->first('eta_max'))
                        <ul class="errors">
                            @foreach ($errors->get('eta_max') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif

                    </div>
                </div>
                @endisset
            </div>
            <div style="width:100%; text-align: center;">
                <div style='display:inline-block;'>{{ Form::submit('Conferma Modifica', ['class' => 'btn-green' , 'style'=> "display: inline-block"]) }}</div>
                <div style='display:inline-block;'><input type="button" value="Annulla Modifica" onclick="document.getElementById('modifica').style.display='none'" style="display: inline-block" class="btn-red"></div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endcan
</div>
@endsection