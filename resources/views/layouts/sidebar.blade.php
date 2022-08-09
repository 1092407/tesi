<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
          <i class="fa fa-remove"></i>
        </a>
        <img src="{{ asset('img/logo_senza_sfondo.png') }}" style="width:80%;" class="w3-round" href=" {{ route('home') }} "><br><br>
        <h4><b>Filtri ricerca:</b></h4>
      </div>  
      
      <div class="w3-container ">
        {{Form::label("Tipo di camera:")}}<br>
        <ul class="w3-bar-block w3-text my-filter ">
          <li>{{ Form::radio('tipo_camera','tutte',$request->tipo_camera == 'tutte',array('form'=>'ricerca'))}}Tutte</li>
          <li>{{ Form::radio('tipo_camera','appartamento',$request->tipo_camera == 'appartamento',array('form'=>'ricerca'))}}Appartamento</li>
          <li>{{ Form::radio('tipo_camera','posto_letto',$request->tipo_camera == 'post_letto',array('form'=>'ricerca'))}}Posto Letto</li>
        </ul>   
        <hr>
        
        {{Form::label('Data inizio contratto:')}}<br>
        {{Form::date('data_inizio',false,array('form'=>'ricerca'))}}<br><br>
        {{Form::label('Data fine contratto:')}}<br>
        {{Form::date('data_fine',false,array('form'=>'ricerca'))}}<br>
        
        <hr>
      </div>

      @isset($servizi)
      
      <div class="w3-container">
        <ul class="w3-bar-block w3-text my-filter">
          @foreach($servizi as $servizio)
            <li>{{Form::checkbox($servizio->nome,$servizio->id,$request->only($servizio->nome)!=null,array('form'=>'ricerca'))}} {{Form::label($servizio->nome)}}</li>
          @endforeach
        </ul>
      </div>
      @endisset
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
