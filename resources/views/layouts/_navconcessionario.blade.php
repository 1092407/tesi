<div class="w3-top">
    <div class="w3-bar" id="myNavbar">
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

     <a href="{{route('concessionario')}}" class="w3-bar-item w3-button w3-hide-small" title="Torna alla tua home admin"><i class="fa fa-home"></i> HOME </a>

     <a href="{{route('listaauto')}}" class="w3-bar-item w3-button w3-hide-small" title="visualizza lista auto"><i class="fa fa-car"></i> AUTO </a>
   <a href="{{route('inserisciauto')}}" class="w3-bar-item w3-button w3-hide-small" title="aggiungi nuova auto"><i class="fa fa-plus"></i> AGGIUNGI AUTO </a>
  <a href="{{route('gestisciclienti')}}" class="w3-bar-item w3-button w3-hide-small" title="visualizza lista clienti "><i class="fa fa-users"></i> CLIENTI </a>
<a href="{{route('registraclienti')}}" class="w3-bar-item w3-button w3-hide-small" title="aggiungi nuovo cliente"><i class="fa fa-user-plus"></i> AGGIUNGI CLIENTI </a>

<a href="{{route('messaggi')}}" class="w3-bar-item w3-button w3-hide-small" title="controlla i tuoi messaggi "><i class="fa fa-telegram"></i> I tuoi messaggi  </a>

<a href="{{route('listabatterieclienti')}}" class="w3-bar-item w3-button w3-hide-small" title="visualizza dati batterie"><i class="fa fa-battery-full"></i> Batterie Auto</a>

        <!--Per motivi di sicurezza il logout va fatto in metodo post piuttosto che in metodo get, quindi non possiamo usare un ancora perchè essa invia in maniera fissa una richiesta al server in metodo GET
     -->

        <a href="" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            {{ csrf_field() }}

        </form>


    </div>
</div>
