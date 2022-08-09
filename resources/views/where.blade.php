@extends('layouts.public')

@section('title', 'Dove Trovarci')

@section('content')
<!-- Image of location/map -->
<div class="w3-container w3-padding-32">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16" style='text-align:center'><b>Dove trovarci</b></h2>
</div>
<div class='w3-container google-maps'>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.9626846079573!2d13.51172641514125!3d43.58649357912361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d8024b0b1a877%3A0x5fac49ae852fdea0!2sVia%20Brecce%20Bianche%2C%2012%2C%2060131%20Ancona%20AN!5e0!3m2!1sit!2sit!4v1653229189286!5m2!1sit!2sit" width="600px" height="450px"></iframe>
</div>
@endsection