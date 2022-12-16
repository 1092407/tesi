<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <title>SmartAuto chart</title>
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





        <div class="w3-content w3-padding" style="max-width:1654px">
            @yield('content')
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
         {!! $chart->script() !!}

    </body>
</html>
