@extends('layouts.concessionario')

@section('title', 'Gestione auto')

@section('scripts')
@parent
<script>
    $(function() {
        $(".alert").show().delay(2000).fadeOut("show");
    })
</script>
@endsection


@section('content')
<br>
<br>

    <div class="w3-content w3-padding" style="max-width:1654px">


            <div class="w3-row-padding">
                 @if (session('status'))
                 <div class="alert success">
                 {{ session('status') }}
                 </div>
                 @endif
            </div>

     <div class="w3-row-padding">


             <div style="border: 1px solid rgb(221, 221, 221); border-radius: 12px; padding-right: 20px; padding-top: 0px ;padding-left: 0px;padding-bottom: 0px; box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px; height:258px;">
                   <div class=" w3-container w3-margin-bottom " style=" width: 400px; max-height:300px; float:left; padding-left: 0px;">
                    @include('helpers/alloggioImage',['attrs'=>"style='height:257px'",'imgFile'=>$auto->foto])
                    </div>

                <div>
                   <div style="padding-top:10px;">
                    <span style="font-size:32px; color:black;"> Marca: {{$auto->marca}} </span>
                    <br>
                    <br>
                    <br>
                    <span style="font-size:32px; color:black;"> Modello: {{$auto->modello}}</span>
                    <br>


                      <br>

                      <div style="float:right;">
                      <a href = "{{route('auto.toupdate',$auto->id)}}" class="w3-button w3-blue">Modifica</a>
                        </div>


               <div style="float:right;">
                <form action="{{ route('auto.delete', $auto->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="w3-button w3-red" type="submit" onclick= "return confirm('Sei sicuro di voler eliminare questa auto?')">Elimina</button>
              </form>
                </div>



                </div>







      </div>
   </div> <!-- chiude la card con la foto-->
<!--
per ora questo lo commento perchè era brutto da vedere
    <div class="w3-container w3-padding-32" >
      <h4 class="w3-border-bottom w3-border-light-grey w3-padding-16"><b>Di seguito è possibile consultare la descrizione di questa auto </b></h4>
    </div>

 <div style="padding-left: 20px; padding-right: 20px;">
    <div class="col-sm-12" style="overflow: scroll">
      <table class="w3-table-all table-striped">
        <thead>
          <tr>

          </tr>
        </thead>

        <tbody>
          <tr>

           <td>{{$auto->descrizione}}</td>

        </tbody>
      </table>

 </div>
 -->

 <div class="w3-container w3-padding-32" id="termini_condizioni">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center"><b>Descrizione</b></h2>

    <p>{{$auto->descrizione}}</p>

</div>

@endsection
