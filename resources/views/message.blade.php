
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 @section('links')

    <link rel="stylesheet" type="text/css" href= "{{ asset('css/w3-style.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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






<body>

<!-- Navbar (sit on top) -->

@auth
                @can('isConcessionario')

                @include('layouts/_navconcessionario')
                @endcan


<!-- per cliente e fornitore intanto lascio qui una parte poi da finire più avanti -->

                @can('isCliente')


                @endcan

                @can('isFornitore')


                @endcan
        @endauth


<div>
    <div class="w3-row-padding">


        <!-- Div delle chat a sinistra    mi recupero tutte le chat che ho per utente loggato-->
        <div style="border: 1px solid rgb(221, 221, 221);  box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:700px; float:left; width:19.5%; overflow:scroll; margin-top:50px">

            @if(count($chat)>0)
            @foreach($chat as $chatAperta)
            <div class=" w3-animate-left">

                <!--<a href="javascript:void(0)" style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail($destinatario);" id="firstTab">-->

                  <a href="{{route('conversazione',$chatAperta[1])}}" style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail($destinatario);" id="firstTab">


                           <div>
                                                                      Username
                        <div><span class="w3-opacity w3-large"><b> {{ ($chatAperta[0] )}}  </b></span></div>



                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div align="center" class="w3-padding"><span class="w3-opacity w3-large"><b>Non hai chat aperte.</b></span></div>
            @endif
        </div>

        <!-- Div delle conversazioni a destra-->
        <div id="conversazione" style="overflow:auto; border: 1px solid rgb(221, 221, 221);  padding-top: 50px ;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:700px; float:right; width:80%;">
            @if(isset($messaggi))
            <div style="overflow:auto; border: 1px solid rgb(221, 221, 221); background-color:rgb(220, 220, 220); padding-right: 20px; padding-top: 5px ;padding-left: 20px;padding-bottom: 5px; height:150px; float:top; width:100%;">
                @include('helpers/profileImage', ['attrs' => '  ' ,'style'=>'width:5%', 'imgFile'=>$messaggi['mittente'][0]['foto_profilo']])
                <h3 style='display:inline;'><b> Nome e cognome :{{$messaggi["mittente"][0]["name"]." ".$messaggi["mittente"][0]["cognome"]}}</b></h3>


            </div>
            <div style="padding-top:0px; padding-bottom:0px;">
                @foreach($messaggi["messaggi"] as $messaggio)
                @if($messaggio["mittente"]==$id)

                <div style="padding-left: 350px; padding-right: 15px; background-color:beige; padding-top:10px; padding-bottom:10px; overflow-wrap: break-word">
                    <div>
                        <h5 align="right">{{$messaggio["contenuto"]}}</h5>
                        <h6 align="right">{{$messaggio["data"]}}</h6>
                    </div>
                </div>
                @else
                <div style="padding-left: 15px; padding-right: 350px; padding-top:10px; padding-bottom:10px; overflow-wrap: break-word">
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
            {{Form::open(array("route"=>['messaggio.send', $messaggi['mittente'][0]['id']],"method"=>"POST"))}}
            {{Form::textarea('messaggio','',['placeholder'=>'Inserisci qui il tuo messaggio...','class'=>'input-app w3-input w3-border', 'style'=>'height:50px; width:1130px;display:inline;margin:5px;'])}}
            {{Form::submit('Invia',['style'=>'float:top; width:150px; height:50px; margin-top:5px;border-radius:3px; ', 'class'=>'w3-button w3-right w3-green'])}}
            {{Form::close()}}
        </div>
        @endisset
    </div>
</div>


</body>



</html>
