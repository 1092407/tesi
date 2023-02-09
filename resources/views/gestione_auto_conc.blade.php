@extends('layouts.concessionario')

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


@isset($auto)

<p class="w3-margin" style='padding-left:1%; padding-right:1%;'>Auto attualmente presenti </b></p>

@if (session('status'))
<div class="alert success">
    {{ session('status') }}
</div>
@endif

<div class="w3-row-padding" style='padding-left:1%;padding-right:1%;'>

    @foreach ( $auto as $automobile)

    <a href="{{route('auto',[$automobile->id])}}">
        <div class="w3-third w3-container w3-margin-bottom annuncio" >
            @include('helpers/alloggioImage',['attrs'=>"w3-hover-opacity cursor",'imgFile'=>$automobile->foto])
            <div class="w3-container w3-white">
                <p class="price"><b> Modello: {{ $automobile->modello }}</b></p>
                <p class="title"><b> Marca: {{$automobile->marca}}</b></p>

            </div>
        </div>
    </a>


    @endforeach

</div>

@endisset
@endsection
