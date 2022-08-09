@extends('layouts.public')

@section('title', 'Faq')

@section('content')
<div class="w3-container w3-padding-32" id="faq">
      <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center"><b>FAQ</b></h2>
      <section class="faq-container">
          @isset($faqs)
            @foreach($faqs as $faq)
            <div>
                <h4 class="faq-page">{{$faq -> domanda}}</h4>
                <div class="faq-body">
                    <p>{{$faq ->risposta}}</p>
                </div>
            </div>
            <hr class="hr-line">
            @endforeach
          @endisset
      </section>
</div>
<script>
    var faq = document.getElementsByClassName("faq-page");
    var i;
    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}
</script>
@endsection