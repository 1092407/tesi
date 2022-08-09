@php
    if(empty($imgFile)){
        $imgFile = 'default.jpg';
        
    }
    if ( null != $attrs){
        $attrs = 'class='.$attrs.'';
    }
    
@endphp

<img src="{{asset('img/alloggi/'.$imgFile) }}" style="width:100%; border-radius: 12px; max-height:300px;" {{!! $attrs !!}}>