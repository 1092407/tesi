<div class="w3-top">
    <div class="w3-bar" id="myNavbar">
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

        @guest
        <a href="{{route('home')}}" class="w3-bar-item w3-button w3-hide-small" title="Torna all'inizio"><i class="fa fa-home"></i> HOME</a>
        <a href="{{route('register')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" title="Effettua la registrazione al sito"><i class="fa fa-vcard"></i> Registrati</a>
        <a href="{{route('login')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" title="Effettua l'accesso al sito"><i class="fa fa-sign-in"></i> Accedi</a>
        @endguest

        @auth
        <div class="w3-dropdown-click w3-right">
            <button onclick="dropdown()" class="dropbtn w3-button w3-hide-small profileButton">
                <!--<img src="{{asset('img/right-arrow.png')}}" height="13px" width="13px" class="profile-name arrow " id="profile-arrow" onclick="dropdown()">-->
                {{Auth::user()->name}} {{Auth::user()->cognome}} &nbsp<i class="fa fa-caret-down"></i>

            </button>
            <div id="myDropdown" class="dropdown-content w3-dropdown-content w3-bar-block w3-card-4">
                @can('isLocatore')
                <a href="{{route('locatore')}}" class="w3-bar-item w3-button w3-hide-small" title="Torna all' home page"><i class="fa fa-home"></i> Home Locatore</a>
                @include('layouts/_navlocatore')
                @endcan
                @can('isLocatario')
                <a href="{{route('locatario')}}" class="w3-bar-item w3-button w3-hide-small" title="Torna all' home page"><i class="fa fa-home"></i> Home Locatario</a>
                @include('layouts/_navlocatario')
                @endcan
                @can('isAdmin')
                <a href="{{route('admin')}}" class="w3-bar-item w3-button w3-hide-small" title="Torna all' home page"><i class="fa fa-home"></i> Home Admin</a>
                @include('layouts/_navadmin')
                @endcan
            </div>
        </div>

        <!--Per motivi di sicurezza il logout va fatto in metodo post piuttosto che in metodo get, quindi non possiamo usare un ancora perchè essa invia in maniera fissa una richiesta al server in metodo GET
     -->

        <a href="" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            {{ csrf_field() }}

        </form>
        @endauth


        <a href="{{route('what')}}" class="w3-bar-item w3-button w3-hide-small" title="Cosa offriamo"><i class="fa fa-info-circle"></i> Servizio</a>
        <a href="{{route('who')}}" class="w3-bar-item w3-button w3-hide-small" title="Il nostro profilo aziendale"><i class="fa fa-users"></i> Chi Siamo</a>
        <a href="{{route('where')}}" class="w3-bar-item w3-button w3-hide-small" title="Dove trovarci"><i class="fa fa-map-marker"></i> Dove Trovarci</a>
        <a href="{{route('faq')}}" class="w3-bar-item w3-button w3-hide-small" title="Frequently Asked Question"><i class="fa fa-question-circle"></i> FAQ</a>
        <a href="mailto:info@unirent.it" class="w3-bar-item w3-button w3-hide-small" title="Mandaci un messaggio"><i class="fa fa-envelope"></i> Contattaci</a>

    </div>
</div>