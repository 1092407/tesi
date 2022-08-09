@extends('layouts.private')

@section('title','Messaggi')

@section('scripts')
@parent
<script src="{{ asset('js/form_validation.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection


@section('content')
<br>
<br>
<div>
    <div class="w3-row-padding">


        <!-- Div delle chat a sinistra-->
        <div style="border: 1px solid rgb(221, 221, 221);  box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:700px; float:left; width:100%; overflow: auto; ">

            @if(count($richieste)>0)
            @foreach($richieste as $richiesta)
            <div class=" w3-animate-left">
                <!--<a href="javascript:void(0)" style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail($destinatario);" id="firstTab">-->
                <!--<a  style="display:block;" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" >-->

                    <div style="display:block;  text-align:center; padding: 11px 10px;" class="w3-bar-item  w3-border-bottom test ">
                        
                    
                    <div style="float:right; width:30%; margin:auto;">
                        
                        @if($richiesta[0]->stato==2)
                                <a class="w3-button w3-red" style="margin-top:15px; " href="{{route('contratto',$richiesta[0]->id)}}" > Visualizza Contratto </a>
                        @endif
                            <a class="w3-button w3-red" style="margin-top:15px; " href="{{route('annuncio',$richiesta[0]->id_alloggio)}}" > Visualizza Annuncio </a>
                   
                    </div>
                    <div style="text-align:center; ">
                        
                        <div><span class="w3-opacity w3-large"><b>{{$richiesta[0]->titolo}} </b></span></div>
                        <div style="float:left; ">
                                @if($richiesta[0]->stato==0)
                                    <label style="color:red; font-size:20px"><b>Rifiutata</b></label>
                                @elseif($richiesta[0]->stato==1)
                                    <label style="color:#DEB887; font-size:20px"><b>In Attesa</b></label>
                                @else
                                    <label style="color:green; font-size:25px"><b>Accettata</b></label>
                                @endif
                                </div>
                           <div style="text-align:center; ">
                            <h5>   

                                <label><b>Data Richiesta: </b></label>{{$richiesta[0]->data_richiesta}}, 
                                @if(isset($richiesta[0]->data_risposta))
                                <label><b>Data Risposta: </b></label>{{$richiesta[0]->data_risposta}},
                                @endif
                                
                                @if($richiesta[0]->tipologia==0)
                                    <label><b>Appartamento</b>,</label>
                                @else
                                    <label><b>Posto Letto</b>,</label>
                                @endif
                                <label><b>Canone Affitto: </b></label>{{$richiesta[0]->prezzo}},
                                <label><b>Durata: </b></label>{{$richiesta[0]->periodo_locazione}} Mesi
                                
                            </h5>
                            </div>
                            
                    </div>
                            
                    </div>
                    
                <!--</a>-->
            </div>
            @endforeach
            @else
            <div align="center" class="w3-padding"><span class="w3-opacity w3-large"><b>Non hai ancora effettuato nessuna richiesta.</b></span></div>
            @endif
        </div>

    </div>
</div>
@endsection