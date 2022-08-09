//implementa l'inizione dell'errore nella form
function getErrorHtml(elemErrors, id) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1)){
        $("#" + id).removeClass("label-input-error");
        return;
    }
    $("#" + id).addClass("label-input-error");
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        //Prendo l'intera form e cerco l'elemento di input che ha l'attributo name = _token che contiene il valore del csrf token
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({ //Attiviamo in jquery l'utility function ajax
            type: 'POST', 
            url: actionUrl, //Url della risorsa da attivare sul server che sarebbe newHome.store
            data: formElems, //L'elemento che ha perso il focus più il csrf  token
            dataType: "json", //formato di risposta
            error: function (data) { //error definisce la funziona da attivare nel caso in cui la risposta sia un messaggio di errore
                if (data.status === 422) { //se il codice di errore è quello che ci dice che il dato e unprocessable
                    var errMsgs = JSON.parse(data.responseText); //prendiamo il testo di errore e lo parsiamo in array associativo
                    $("#" + id).parent().find('.errors').html(' '); //azzeriamo eventuali altri messaggi di errore nel DOM 
                    $("#" + id).after(getErrorHtml(errMsgs[id],id)); // aggiunge a valle dell'elemento che ha generato l'errore tutti gli
                                                                  // errori mediante una funzione alla quale apassa come parametro l'insieme
                                                                  // dei messaggi di errore ricevuti ma filtrando solo quelli associati all'elemento che stiamo testando
                                                                  // questo perchè il server alla ricezione della utility attiva tutti i validatori per tutti gli elementi della form ridandoci indietro messaggi di errore anche per elementi che non ci interessano

                }
            },
            contentType: false, // impediamo che nella richiesta ajax sia implementata il content type di default
            processData: false  // disinibiamo il processo standard di conversione di un dato di tipo oggetto in un array associativo
        });
    }

    var elem = $("#" + id); // recuperiamo l'elemento da testare
    //Se l'elemento è di tipo file dobbiamo creare il valore da inviare al server associato a questo input
    if (elem.attr('type') === 'file') {
        // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    //a questo punto abbiamo il vlore dell'elemento che ha perso il focus
    formElems = new FormData(); //Definiamo la strututra dati da inviare al server
    formElems.append(id, inputVal); //passiamo una coppia nome valore
    addFormToken(); //aggiungo il csrf token alla form
    sendAjaxReq(); //invio la form al server

}

function doFormValidation(actionUrl, formId, tipo) {
    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: tipo,
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id],id));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect); 
        },
        contentType: false,
        processData: false
    });
}

function doModifiedSet(id){
    alert('ciao');
    return '{{$faqs['+id+']->domanda}}';

}




