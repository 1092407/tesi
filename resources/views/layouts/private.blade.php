<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <title>UniRent | @yield('title', 'HomePage')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('links')
    <link rel="stylesheet" href="{{ asset('css/w3-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @show
    @section('scripts')
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    
    @show
</head>

<body>



    <!-- Navbar (sit on top) -->
    @include('layouts/_navpublic')



    <div class="w3-content w3-padding" style="max-width:1654px">
        
        @yield('content')
    </div>

    <footer class="w3-center w3-black w3-padding-16" style='bottom:0px;'>
        UniRent | Via Brecce Bianche, 12 - 60131 Ancona (AN) ITALIA<br>
        <a href="mailto:info@unirent.it">info@unirent.it</a> | <span itemprop="telephone">+39 347 58 30 387</span>
        <br><a  href="{{route('privacy')}}">Privacy e Cookie Policy</a> | <a href="{{route('termini_condizioni')}}">Termini e Condizioni</a>
        <ul class="social-media-list">
            <li><a target="_blank" href="https://www.facebook.com/"><img src="{{asset('img/social/facebook.png')}}" title="Facebook" alt="Facebook icon"></a></li>
            <li><a target="_blank" href="https://twitter.com/i/flow/login/"><img src="{{asset('img/social/twitter.png')}}" title="Twitter" alt="Twitter icon"></a></li>
            <li><a target="_blank" href="https://www.instagram.com/accounts/login/"><img src="{{asset('img/social/instagram.png')}}" title="Instagram" alt="Instagram icon"></a></li>
        </ul>

        Scarica la documentazione<br>
            <div class="credits">
                <a  href="{{asset('../resources/download/Progetto_TW.pdf')}}" download="Progetto_TW_GRP_06.pdf"><b>QUI!</b></a>
            </div>
    </footer>
</body>

</html>