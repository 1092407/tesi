@extends('layouts.private')

@section('title','Messaggi')

@section('scripts')
@parent
<script src="{{ asset('js/form_validation.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var conversazione = document.getElementById("conversazione");
        conversazione.scrollTop = conversazione.scrollHeight;
    })

</script>

<script>
    var openTab = document.getElementById("firstTab");
    openTab.click();
</script>
@endsection


@section('content')
<br>
<br>
<div>
    <div class="w3-row-padding">


        <!-- Div delle chat a sinistra-->
        <div style="border: 1px solid rgb(221, 221, 221);  box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:700px; float:left; width:19.5%; overflow:scroll;">

            @if(count($chat)>0)
            @foreach($chat as $chatAperta)
            <div class=" w3-animate-left">
                <!--<a href="javascript:void(0)" style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail($destinatario);" id="firstTab">-->
                <a href="{{route('conversazione',[$chatAperta['alloggio'][0]['id'],$chatAperta['utente'][0]['id']])}}" style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail($destinatario);" id="firstTab">

                    <div>
                        <div><span class="w3-opacity w3-large"><b>{{$chatAperta["utente"][0]["name"]}} {{$chatAperta["utente"][0]["cognome"]}}</b></span></div>
                        <div>
                            <h5>
                                {{$chatAperta["alloggio"][0]["titolo"]}}<br>
                                {{$chatAperta["alloggio"][0]["citta"]}},
                                {{$chatAperta["alloggio"][0]["cap"]}},<br>
                                {{$chatAperta["alloggio"][0]["indirizzo"]}},
                                {{$chatAperta["alloggio"][0]["numero"]}}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div align="center" class="w3-padding"><span class="w3-opacity w3-large"><b>Non hai chat aperte.</b></span></div>
            @endif
        </div>

        <!-- Div delle conversazioni a destra-->
        <div id="conversazione" style="overflow:auto; border: 1px solid rgb(221, 221, 221);  padding-top: 0spx ;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:700px; float:right; width:80%;">
            @if(isset($messaggi))
            <div style="overflow:auto; border: 1px solid rgb(221, 221, 221); background-color:rgb(220, 220, 220); padding-right: 20px; padding-top: 5px ;padding-left: 20px;padding-bottom: 5px; height:150px; float:top; width:100%;">
                @include('helpers/profileImage', ['attrs' => '  ' ,'style'=>'width:5%', 'imgFile'=>$messaggi['mittente'][0]['foto_profilo']])
                <h3 style='display:inline;'><b>{{$messaggi["mittente"][0]["name"]." ".$messaggi["mittente"][0]["cognome"]}}</b></h3>
                <a href='{{route('annuncio',$messaggi['alloggio'][0]['id'])}}'><h5><b>{{$messaggi["alloggio"][0]["titolo"].", ".$messaggi["alloggio"][0]["cap"].", ".$messaggi["alloggio"][0]["citta"].", ".$messaggi["alloggio"][0]["indirizzo"].", ".$messaggi["alloggio"][0]["numero"]}}</b></h5></a>
                <h6>{{$messaggi["alloggio"][0]["descrizione"]}}</h6>
            </div>
            <div style="padding-top:0px; padding-bottom:0px;">
                @foreach($messaggi["messaggi"] as $messaggio)
                @if($messaggio["mittente"]==$id)

                <div style="padding-left: 350px; padding-right: 15px; background-color:beige; padding-top:10px; padding-bottom:10px;">
                    <div>
                        <h5 align="right">{{$messaggio["contenuto"]}}</h5>
                        <h6 align="right">{{$messaggio["data"]}}</h6>
                    </div>
                </div>
                @else
                <div style="padding-left: 15px; padding-right: 350px; padding-top:10px; padding-bottom:10px;">
                    <div>
                        <h5 align="left">{{$messaggio["contenuto"]}}</h5>
                        <h6 align="left">{{$messaggio["data"]}}</h6>
                    </div>
                </div>
                @endif
                

                @endforeach

            </div>
            @else
            <h2 align="center" style="padding-top:150px;"><b>Seleziona una chat per visualizzare la conversazione!</b></h2>
            @endif
        </div>

        @isset($messaggi)
        <div align="right">
            {{Form::open(array("route"=>['messaggio.send', $messaggi['alloggio'][0]['id'], $messaggi['mittente'][0]['id']],"method"=>"POST"))}}
            {{Form::textarea('messaggio','',['placeholder'=>'Inserisci qui il tuo messaggio...','class'=>'input-app w3-input w3-border', 'style'=>'height:50px; width:1130px;display:inline;margin:5px;'])}}
            {{Form::submit('Invia',['style'=>'float:top; width:150px; height:50px; margin-top:5px;border-radius:3px; ', 'class'=>'w3-button w3-right w3-green'])}}
            {{Form::close()}}
        </div>
        @endisset
    </div>
</div>
@endsection