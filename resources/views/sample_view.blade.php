@extends('layouts.provalayoutchart')

@section('title', 'prova chart ')

@section('content')






<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->container() !!}



@endsection




