@extends('layouts.private')

@section('title', 'HomePage')

@section('content')

@section('scripts')
@parent
<script>
    $(function() {
        $(".alert").show().delay(2000).fadeOut("slow");
    })
</script>

@endsection

@can('isLocatario')
    @include('layouts/header_filtri')
    @endcan

@isset($alloggi)

@auth
  @else
  <br>
@endauth
@can('isLocatore')
<br>
@endcan

<p class="w3-margin" style='padding-left:1%; padding-right:1%;'>Annunci trovati: <b>@php echo $alloggi->total() @endphp</b></p>
@if (session('status'))
<div class="alert success">
    {{ session('status') }}
</div>
@endif
<div class="w3-row-padding" style='padding-left:1%;padding-right:1%;'>
    @php
    $i=0;
    @endphp
    @foreach ( $alloggi as $alloggio)
    
    <a href="{{route('annuncio',[$alloggio->id])}}">
        <div class="w3-third w3-container w3-margin-bottom annuncio" >
            @include('helpers/alloggioImage',['attrs'=>"w3-hover-opacity cursor",'imgFile'=>$alloggio->foto])
            <div class="w3-container w3-white">
                <p class="price"><b>€{{ $alloggio->prezzo }}</b></p>
                <p class="title"><b>{{$alloggio->titolo}}</b></p>
                <p>{{$alloggio->citta}}, {{$alloggio->indirizzo}} {{ $alloggio->numero }}</p>
                <p>
                @if(($alloggio->opzionato)===1)
                <span style="color:red; float:left;">● Non Disponibile</span>
                @else
                <span style="color:lightgreen; float:left;">● Disponibile</span>
                @endif
                @if(($alloggio->tipologia)===1)
                        <span id="categoria" style="font-size: 12px; background: lightgray; border-radius: 4px; padding-left: 4px; padding-right: 4px; float:right; ">POSTO LETTO</span>
                        @else
                        <span id="categoria" style="font-size: 12px; background: lightgray; border-radius: 4px; padding-left: 4px; padding-right: 4px; float:right; ">APPARTAMENTI</span>
                        @endif
                </p>
            </div>
        </div>
    </a>


    @php
    $i+=1;
    @endphp
    @if($i%3==0)
        </div><div class="w3-row-padding" style='padding-left:1%;padding-right:1%;'>
    @endif
    @endforeach

</div>

{{$alloggi->appends(request()->input())->links()}}

@endisset
@endsection