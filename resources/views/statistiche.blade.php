@extends('layouts.admin')

@section('title', 'Admin')

@section('scripts')
@parent
<script  language="JavaScript" type="text/javascript">
    $(function() {
        $(".alert").show().delay(2000).fadeOut("show");
    })

});

</script>
    
@endsection

@section('content')

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1 id="titolo" style="margin-bottom:0px;"><b>Statistiche</b></h1>
    <div class=" w3-bottombar w3-padding-16 " style="margin-bottom:16px; height:150px;">
    <div style="float:left;">
    {{ Form::open(array('route' => ['adminfilter'], 'method' => 'POST', 'id'=>'filtraStatistiche')) }}
          {{Form::label("Tipo di camera:")}}<br>
          <ul class="w3-bar-block w3-text my-filter ">
            <li>{{ Form::radio('tipo_camera',2, true)}}Tutte</li>
            <li>{{ Form::radio('tipo_camera',0)}}Appartamento</li>
            <li>{{ Form::radio('tipo_camera',1)}}Posto Letto</li>
          </ul>
        </div>
        <div style="float:right; padding-top: 45px;">  
        {{ Form::submit('Filtra Statistiche', ['class' => 'w3-button w3-green']) }}
        </div>

        <div style="text-align:center; padding-top: 25px;">
        <div style="float:left; padding-left:100px;"> 
        <div>        {{ Form::label('inizio_intervallo', ' Inizio Intervallo', ['class' => 'label-input-card']) }}
        </div>

        {{ Form::date('inizio_intervallo', NULL, ['class' => 'input-card', 'id' => 'inizio_intervallo', 'style' => 'width:300px']) }}
        @if ($errors->first('fine_intervallo'))
          
          <ul class='errors'>
            @foreach($errors->get('fine_intervallo') as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
      </div>
        
        <div style="float:right; padding-right:100px;">
        <div>        {{ Form::label('fine_intervallo', ' Fine Intervallo', ['class' => 'label-input-card']) }}
        </div>

        {{ Form::date('fine_intervallo', NULL, ['class' => 'input-card', 'id' => 'fine_intervallo', 'style' => 'width:300px']) }}</div>
        
        </div>
       
        {{Form::close()}}
        
      </div>
    </div> 
  </header>
  
  <!-- First Photo Grid-->
  <div style="padding-left: 20px; padding-right: 20px;">
<div class="col-sm-12">   
  @isset($filtri[2])
    @if($filtri[2]==2)
    <h3>Statistiche per Tutti gli annunci
    @elseif($filtri[2]==0)
    <h3>Statistiche per gli Appartamenti
    @else
    <h3>Statistiche per i Posti letto
    @endif
  @endisset
  @isset($filtri[1])
    @if(isset($filtri[0]))
      , dal {{$filtri[0]}} al {{$filtri[1]}}</h3>
    @else
     , fino al {{$filtri[1]}}</h3>
    @endif
  @endisset
  <table class="w3-table-all table-striped">
    <thead>
        <tr>
          <td><b style="font-size:18px;">Richieste</b></td>
          <td><b style="font-size:18px; color:red;">Rifiutate</b></td>
          <td><b style="font-size:18px; color:#DEB887;">In Attesa</b></td>
          <td><b style="font-size:18px; color:green;">Locazioni</b></td>
          <td><b style="font-size:18px;">Alloggi</b></td>
        </tr>
    </thead>
    <tbody>
        <tr>
          @isset($richieste)
          @foreach($richieste as $richiesta)
            <td>{{$richiesta}}</td>
          @endforeach
          @endisset
          @isset($locazioni)
            <td>{{$locazioni}}</td>
          @endisset
          @isset($alloggi)
            <td>{{$alloggi}}</td>
          @endisset
        </tr>
    </tbody>

  </table>
 @endsection
