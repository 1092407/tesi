@extends('layouts.cliente')

@section('title', ' dati profilo')

<!--sezione script di seguito-->

@section('scripts')

@parent
<script language="JavaScript" type="text/javascript" src="{{ asset('js/form_validation.js') }}"></script>
<script language="JavaScript" type="text/javascript">
  $(function() {
    $("#colonna_1").removeClass('column-card')
    $("#card-modifica").hide();
    $("#annulla_modifica").hide();
    $(".btn").click(function() {
      $("#colonna_1").toggleClass('column-card')
      $("#card-modifica").toggle();
      $("#modifica").toggle();
      $("#annulla_modifica").toggle();
    });
  });

  $(function() {
    $(".alert").show().delay(2000).fadeOut("show");
  })
</script>
@endsection



<!--di seguito il vero contenuto della pagina -->

@section('content')
<br>
<br>
<div class="row-card">
  <div id="colonna_1" class="column-card">

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

    <h3 style="text-align:center">Ecco i dati attuali del tuo profilo</h3>
    <div style="font-size: 20px" class="card">

      <p><b>Nome: </b>{{auth()->user()->name}}</p>
      <p><b>Cognome: </b>{{auth()->user()->cognome}}</p>
      <p><b>Username: </b>{{auth()->user()->username}}</p>
      <p><b>Data di vendita: </b>{{auth()->user()->datavendita}}</p>
      <p><b>Auto: </b>{{auth()->user()->auto}}</p>
      <p><b>Targa: </b>{{auth()->user()->targa}}</p>

    </div>
  </div>



</div>
@endsection

