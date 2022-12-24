@extends('layouts.public')

@section('title', 'Lista auto')

@section('content')

@section('scripts')
@parent
<script>
    $(function() {
        $(".alert").show().delay(2000).fadeOut("slow");
    })
</script>

@endsection

<h2>Qui puoi vedere tutti i modelli attualmente disponibili ed effettuare una ricerca specificando la marca (es:fiat,audi,hyundai...)</h2><br>

<h4>Scrivi un nome nella barra di ricerca e la pagina si riaggiornerà con i risultati corrisposndenti alla tua ricerca.
E' implementata la ricerca parziale :  ad esempio scrivendo "fia" o solo "f" compariranno tutte le auto "fiat"
</h4><br>



   <div class="w3-container" style="padding-top:10px">
    <h4>Effettua qui sotto la ricerca  di auto tramite il nome della marca </h4>
    {!! Form::open(array('route'=>'search','method'=>'GET','id'=>'ricerca')) !!}
    {{ Form::text('name',isset($request) ? $request->name : false,array('id'=>'my-searchbar','placeholder'=>'inserisci qui il nome che intendi cercare')) }}
    {{ Form::submit('Cerca',array('class'=>'w3-button'))}}
    {!! Form::close() !!}
    <hr>
     </div>


@isset($auto)

<p class="w3-margin" style='padding-left:1%; padding-right:1%;'>Auto attualmente disponibili presso il nostro concessionario  </b></p>

@if (session('status'))
<div class="alert success">
    {{ session('status') }}
</div>
@endif

<div class="w3-row-padding" style='padding-left:1%;padding-right:1%;'>

    @foreach ( $auto as $automobile)


    <a href="{{route('auto_dettaglio',[$automobile->id])}}">
        <div class="w3-third w3-container w3-margin-bottom annuncio" >
            @include('helpers/alloggioImage',['attrs'=>"w3-hover-opacity cursor",'imgFile'=>$automobile->foto])
            <div class="w3-container w3-white">
                <p class="price"><b> Modello--> {{ $automobile->modello }}</b></p>
                <p class="title"><b> Marca--> {{$automobile->marca}}</b></p>

            </div>
        </div>
    </a>


    @endforeach

</div>

@endisset
@endsection
