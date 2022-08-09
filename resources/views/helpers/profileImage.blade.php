@php
    if(empty($imgFile)){
        $imgFile = 'default.png';
        
    }
    if ( null != $attrs){
        $attrs = 'class="' . $attrs . '"';
    }  
    if(null!=$style){
        $style = 'style="'.$style.'"';
    }
@endphp

<img src="{{asset('img/foto_profilo/'.$imgFile) }}"  {!! $style !!} {!! $attrs !!}>