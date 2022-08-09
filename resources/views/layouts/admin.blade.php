<!DOCTYPE html>
<html>
<head>
<title>Unirent | @yield('title', 'HomePage')</title>
<meta charset="UTF-8">
@section('links')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href= "{{ asset('css/w3-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Da qui prendiamo le icone-->
@show
@section('scripts')
<script language="JavaScript" type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/form_validation.js') }}"></script>
<script>
$(function() {
    $(".alert").show().delay(2000).fadeOut("show");
  })
</script>
@show
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    @include('helpers/profileImage', ['attrs' => '' ,'style'=>'width:100%', 'imgFile'=>auth()->user()->foto_profilo])<br><br>
    <h4><b>{{auth()->user()->name}} {{auth()->user()->cognome}}</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="{{route('admin')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw w3-margin-right"></i>STATISTICHE</a> 
    <a href="{{route('faqindex')}}"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-question-circle fa-fw w3-margin-right"></i>GESTISCI FAQS</a> 
    <a class="w3-bar-item w3-button w3-padding" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            {{ csrf_field() }}

    </form>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main">

    @yield('content')

<!-- End page content -->
</div>



</body>
</html>
