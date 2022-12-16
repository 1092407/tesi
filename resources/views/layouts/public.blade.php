<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <title>SmartAuto | @yield('title', 'HomePage')</title>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @section('links')
        <link rel="stylesheet" type="text/css" href= "{{ asset('css/w3-style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Da qui prendiamo le icone-->
        @show
        @section('scripts')
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <!-- Add maphilight plugin -->
        <script type="text/javascript" src="{{asset('js/jquery.maphilight.min.js')}}"></script>
        <!-- Activate maphilight plugin -->
        <script type="text/javascript">$(function() {
        $('.map').maphilight();});
        </script>
        @show

    </head>

    <body>
        <!-- Navbar (sit on top) -->
        @include('layouts/_navpublic')


        <!-- First Parallax Image with Logo Text -->
        <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
            <div class="w3-display-middle" style="white-space:nowrap;">
              <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">SmartAuto</span>
            </div>
            <div class="w3-display-middle" style="white-space:nowrap;">
              <span class="logo w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">Cerca e controlla la tua auto elettrica</span>
            </div>
        </div>


        <div class="w3-content w3-padding" style="max-width:1654px">
            @yield('content')
        </div>


        <footer class="w3-center w3-black w3-padding-16" style='bottom:0px;'>
            SmartAuto gestione web app | Via Brecce Bianche, 12 - 60131 Ancona (AN) ITALIA<br>
            <a  href="mailto:info@smartauto.it">info@smartauto.it</a> | <span itemprop="telephone">+39 334 225 41 94</span>
            <br><a href="{{route('privacy')}}"> Privacy e Cookie Policy</a> | <a href="{{route('termini_condizioni')}}"> Termini e Condizioni </a>
            <ul class="social-media-list">
                    <li><a target="_blank" href="https://www.facebook.com/"><img src="{{asset('img/social/facebook.png')}}"  title="Facebook" alt="Facebook icon"></a></li>
                    <li><a target="_blank" href="https://twitter.com/i/flow/login/"><img src="{{asset('img/social/twitter.png')}}" title="Twitter" alt="Twitter icon"></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/accounts/login/"><img src="{{asset('img/social/instagram.png')}}" title="Instagram" alt="Instagram icon"></a></li>
            </ul>


        </footer>
    </body>
</html>
