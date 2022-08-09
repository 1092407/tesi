<!-- Header -->
<header id="portfolio">

  <link rel="stylesheet" href="jqueryui/style.css">
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">

  @section('scripts')
  @parent
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script>
    //variabile multivalore:
    //se vale 0 => tutti
    //se vale 1=> appartamento
    //se vale 2=> posto letto
    var tendina = 0;
    $(document).ready(function() {
      tendina = 0;
      $('#reveal-content').hide();
      console.log(document.getElementById('radio_appartamento').checked);
      if (document.getElementById('radio_appartamento').checked) {
        tendina = 1;
      } else if (document.getElementById('radio_posto_letto').checked) {
        tendina = 2;
      }
    });



    window.onclick = function(event) {
      if (event.target.matches('#btn-reveal')) {
        //$('#reveal-content').toggle();
        var arrow = document.getElementById('profile-arrow');
       // console.log(tendina);
        if ($('#reveal-content').is(':hidden')) {
          $('#reveal-content').show();
          if (tendina == 1) {
            $('#reveal-content , #appartamento').show();
            $('#posto_letto').hide();
          }
          if (tendina == 2) {
            $('#reveal-content ,#posto_letto').show();
            $('#appartamento').hide();
          }
          if (tendina == 0) {
            $('#appartamento, #posto_letto').hide();

          }

        } else {
          //el.classList.add('hide');
          $('#reveal-content, #posto_letto, #appartamento').hide();
        }
        if (arrow.classList.contains('rotate')) {
          arrow.classList.remove('rotate');
        } else {
          arrow.classList.add('rotate');
        }
      }
    }




    $(function() {
      $('#appartamento').hide();
      $('#posto_letto').hide();
      $('input[name="tipo_camera"]').click(function() {
        var scelta = $('input[name="tipo_camera"]:checked').val();
        if (scelta == 'appartamento') {
          tendina = 1;
          $('#letti_pl').val(0);
          $('#appartamento').show();
          $('#posto_letto').hide();
        } else if (scelta == 'posto_letto') {
          tendina = 2;
          $('input[name="n_camere"]').val(null);
          $('#posto_letto').show();
          $('#appartamento').hide();
        } else {
          tendina = 0;
          $('input[name="n_camere"]').val(null);
          $('#letti_pl').val(0);
          //console.log($('#letti_pl').val());
          $('#appartamento').hide();
          $('#posto_letto').hide();
        }
      });
    });

    /** Funzione per far apparire i servizi specifici per gli appartamenti e posti letto */
    $(function() {
      $('input[name = "tipo_camera"]').click(function() {
        var tipo = $('input[name = "tipo_camera"]:checked').val();
        if (tipo == 'posto_letto') {
          $('#Angolo_Studio').show();
          $('#Locale_Ricreativo').hide();
        } else if (tipo == 'appartamento') {
          $('#Angolo_Studio').hide();
          $('#Locale_Ricreativo').show();
        } else {
          $('#Angolo_Studio').show();
          $('#Locale_Ricreativo').show();
        }

      });
    });
  </script>

  @endsection
  <!-- Searchbar -->
  <!--<span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>-->
  <div class="w3-container" style="padding-top:50px">
    <h1>Cerca la tua città:</h1>
    {!! Form::open(array('route'=>'search','method'=>'GET','id'=>'ricerca')) !!}
    {{ Form::text('citta',isset($request) ? $request->citta : false,array('id'=>'my-searchbar','placeholder'=>'Milano, Torino, Ancona...')) }}
    {{ Form::submit('Invia',array('class'=>'w3-button'))}}
    {!! Form::close() !!}
    <hr>

    <button type="button" id="btn-reveal" class="my-button w3-center">
      <img src="{{asset('img/right-arrow.png')}}" width="20px" class="profile-name arrow " id="profile-arrow"> Mostra filtri</button>
    <div class="w3-container wrapper" id="filtri">
      <div id="reveal-content">
        <div style="padding-top:20px;">

          <div class="w3-align" style="display: inline-block;">
            <b>{{Form::label("Tipo di camera:")}}</b><br>
            <ul class="w3-bar-block w3-text my-filter ">
              <li>{{ Form::radio('tipo_camera','tutte',isset($request) ? $request->tipo_camera == 'tutte' : true,array('form'=>'ricerca'))}} Tutte</li>
              <li>{{ Form::radio('tipo_camera','appartamento',isset($request) ? $request->tipo_camera == 'appartamento': false,array('form'=>'ricerca','id'=>'radio_appartamento'))}} Appartamento</li>
              <li>{{ Form::radio('tipo_camera','posto_letto', isset($request) ? $request->tipo_camera == 'posto_letto' : false,array('form'=>'ricerca','id'=>'radio_posto_letto'))}} Posto Letto</li>
            </ul>
          </div>
          <div class="w3-align" style="display: inline-block;">
            <b>{{Form::label("Periodo di locazione:")}}</b><br>
            <ul class="w3-bar-block w3-text my-filter " style="margin-top:0px; margin-bottom:0px;">
              <li>{{ Form::radio('periodo_locazione','tutti',isset($request) ? $request->periodo_locazione == 'tutti' : true,array('form'=>'ricerca'))}} Tutti</li>
              <li>{{ Form::radio('periodo_locazione','3_mesi',isset($request) ? $request->periodo_locazione == '3_mesi' : false,array('form'=>'ricerca'))}} 3 Mesi</li>
              <li>{{ Form::radio('periodo_locazione','6_mesi',isset($request) ? $request->periodo_locazione == '6_mesi': false,array('form'=>'ricerca','id'=>'radio_appartamento'))}} 6 Mesi</li>
              <li>{{ Form::radio('periodo_locazione','12_mesi', isset($request) ? $request->periodo_locazione == '12_mesi' : false,array('form'=>'ricerca','id'=>'radio_posto_letto'))}} 12 Mesi</li>
            </ul>
          </div>
          <div class="w3-align" style="display: inline-block;">
            <div>
              <b>{{Form::label('Prezzo: ')}}</b>
              {{Form::number('prezzo_min',isset($request)? $request->prezzo_min : false,array('min'=>'0','max'=>'9999','form'=>'ricerca','placeholder'=>'min'))}}
              {{Form::number('prezzo_max',isset($request)? $request->prezzo_max : false,array('min'=>'0','max'=>'9999','form'=>'ricerca','placeholder'=>'max'))}}
              @if ($errors->first('prezzo_max'))

              <ul class='errors' style="max-width:270px; padding-left:20px; margin-top:10px; margin-bottom:0px;">
                @foreach($errors->get('prezzo_max') as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>

              @endif
            </div>
            <div style="margin-top:10px;">
              <b>{{Form::label('Dimensioni: ')}}</b>
              {{Form::number('superficie',isset($request->superficie) ? $request->superficie : false,array('form'=>'ricerca','min'=>0,'max'=>9999))}}
              <p style="display:inline"> m<sup>2</sup></p><br>
            </div>
            <div style="margin-top:10px;">
              <div >
              <b>{{Form::label('Posti letto: ')}}</b>
                {{Form::number("letti_ap",isset($request->letti_ap) ? $request->letti_ap : false,array('form'=>'ricerca','min'=>0,'max'=>99))}}<br>
              </div>
            </div>
          </div>
          

          @isset($servizi)
          <div style="display: inline-block;">
            <div class="w3-align" style="display: inline-block;"></div>
            <b>{{Form::label('Servizi opzionali: ')}}</b>
            <ul class="w3-bar-block w3-text my-filter" style="margin-top: 0px;">
              @php
              $i = 1;
              @endphp
              @foreach($servizi as $servizio)
              @if($servizio->tipologia != 1)
              <li id="{{$servizio->nome}}">{{Form::checkbox($servizio->nome,$servizio->id,isset($request) ? $request->only($servizio->nome)!=null : false,array('form'=>'ricerca'))}} {{Form::label($servizio->nome)}}</li>
              @if($i%4==0)
            </ul>
          </div>
          <div class="w3-align" style="display: inline-block;">
            <ul class="w3-bar-block w3-text my-filter">
              @endif
              @php
              $i++;
              @endphp
              @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <br>
      @endisset

      <!-- Filtri appartamento -->
      <div id="appartamento">
        <hr>
        <h3><b>Filtri appartamento: </b></h3><br>
        <div class="my-align">
          {{Form::label("Camere: ")}}
          {{Form::number('n_camere',isset($request->n_camere) ? $request->n_camere : false,array('form'=>'ricerca','min'=>0,'max'=>99))}}<br>
        </div>
        
      </div>
      <!-- Filtri posto letto-->
      <div id="posto_letto">
        <hr>
        <h3><b>Filtri posto letto:</b></h3><br>
        <div class="my-align">
          {{Form::label("Tipologia posto letto: ")}}
          {{Form::select("letti_pl",array(0=>'Tutte',1=>'Singola',2=>'Doppia'),isset($request->letti_pl) ? $request->letti_pl : 0,array('form'=>'ricerca','min'=>0,'max'=>99,'id'=>'letti_pl'))}}<br>
        </div>
      </div>

    </div>
  </div>
  </div>
  <hr>
</header>