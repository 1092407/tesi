<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/w3-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Unirent | Contratto</title>
    <style>
        .titolo {
            color: black;
            text-align: center;
        }

        body {
            color: black;
            padding-left: 10%;
            padding-right: 10%;
        }
    </style>
</head>

<body>



    @if((auth()->user()->id == $locatario[0]->user_id or auth()->user()->id == $locatore[0]->user_id) and $alloggio[0]->stato == 2)

    <div style='margin-left:-10%;'>
        <a class="w3-button" href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i><b> Torna indietro</b></a>
        <a class="w3-button" href="mailto:{{$locatario[0]->email}} ?subject=Contratto di locazione &body={{route('contratto',$locatario[0]->richieste_id)}}"><i class="fa fa-share-square-o"></i><b> Spedisci contratto</b></a>
        <button class="w3-button" onclick="window.print(); return false"><i class="fa fa-print"></i><b> Stampa</b></button>

    </div>
    <br>
    <br>
    <h2 class='titolo'><u><b>CONTRATTO DI LOCAZIONE AD USO ABITATIVO</b></u></h2>
    <br><br>
    <p>{{$locatore[0]->sesso == 'Maschio' ? 'Il Sig.' : 'La Sig.ra'}} <b>{{$locatore[0]->name}}</b> <b>{{$locatore[0]->cognome}}</b>, nato il <b>{{$locatore[0]->data_nascita}}</b> di seguito denominato/a, per brevità, “Locatore” </p><br>
    <p>{{$locatario[0]->sesso == 'Maschio' ? 'Il Sig.' : 'La Sig.ra'}} <b>{{$locatario[0]->name}}</b> <b>{{$locatario[0]->cognome}}</b> nato il <b>{{$locatario[0]->data_nascita}}</b> di seguito denominato, per brevità, “Conduttore”</p><br>
    <h4><b>SI CONVIENE E SI STIPULA QUANTO SEGUE</b></h4>
    <p>Il Locatore concede in locazione al Conduttore l’immobile ad uso abitativo di sua esclusiva proprietà sito in <b>{{$alloggio[0]->indirizzo}} n.{{$alloggio[0]->numero}}, {{$alloggio[0]->cap}}, {{$alloggio[0]->citta}},{{$alloggio[0]->regione}}</b>.<br>
        Sotto forma di <b>{{$alloggio[0]->tipologia ? 'posto letto' : 'appartamento'}}</b>.<br>
        L’immobile viene consegnato come visto e piaciuto tra le parti all’atto della consegna del bene.<br>
        L’immobile sarà adibito ad uso esclusivo del Conduttore</p>
    <p>
        La locazione è regolata dalle seguenti concordate pattuizioni:<br>
    <h5><b>1)DURATA</b></h5><br>
    <p>La durata della locazione è stabilita in {{$alloggio[0]->periodo_locazione}} mesi</p><br>
    <h5><b>2)RECESSO DEL CONDUTTORE</b></h5><br>
    <p>
        Il Locatore riconosce espressamente al Conduttore la facoltà di recedere in qualsiasi momento e per
        qualsiasi motivo dal contratto anche prima della scadenza stabilita, dandone avviso al Locatore mediante
        lettera raccomandata da inviarsi con un preavviso di almeno 10 giorni dalla data in cui il recesso deve avere
        esecuzione. I giorni di preavviso saranno conteggiati a partire dalla data di invio della raccomandata A.R.
    </p><br>
    <h5><b>3)CANONE</b></h5><br>
    <p>
        Il canone mensile di locazione, escluse le spese di condominio ordinarie e di riscaldamento, viene
        consensualmente determinato tra le parti in € {{$alloggio[0]->prezzo}} (xxx/00) mensili che il Conduttore si obbliga a
        corrispondere entro il giorno 5 di ogni mese, mediante bonifico bancario da effettuarsi sul conto corrente con
        codice IBAN IT77S0300203280816917371262, in essere presso la Banca Monte dei Piatti di Scena intestato al Locatore.
    </p>
    <h5><b>4)STATO LOCATIVO</b></h5><br>
    <p>
        Il Conduttore dichiara di avere visitato l’immobile locato e di riceverlo in consegna con il ritiro delle chiavi e
        dichiara inoltre che l’immobile è in buono stato locativo ed idoneo all’uso convenuto.. Si impegna, altresì, a
        rispettare e far rispettare da propri familiari o domestici le norme del regolamento dello stabile, ove esistenti,
        che il Locatore si impegna a consegnare al momento della stipula del contratto. Si impegna inoltre ad
        osservare le deliberazioni dell'assemblea dei condomini formalmente comunicate dal Locatore.<br>
        Il Locatore dichiara che <b>{{$alloggio[0]->tipologia ? 'il posto letto' : 'l\'appartamento'}}</b> è in regola con la normativa edilizia ed urbanistica e gli impianti sono
        conformi alla normativa vigente. Eventuali vizi dell’immobile e/o dei suoi impianti dovranno essere comunicati
        per iscritto, dal Conduttore al Locatore, entro 30 (trenta) giorni dalla consegna dell’immobile, ovvero dalla
        loro scoperta ove occulti.<br>
        L'unità immobiliare viene consegnata pulita e in ottima condizione. La stessa verrà restituita al termine della
        locazione nello stesso stato in cui è stata consegnata, salvo il normale deperimento legato all’uso e senza
        obbligo per il Conduttore di tinteggiatura e di effettuazione di interventi di qualsivoglia natura a meno che i
        danni riportati non siano notevoli.<br>
    </p>
    <h5><b>5)MUTAMENTO DI DESTINAZIONE E MODIFICHE</b></h5><br>
    <p>
        L’immobile è locato ad esclusivo uso di abitazione del Conduttore che si obbliga a non mutarne la
        destinazione anche solo parzialmente o temporaneamente. Ogni aggiunta o modifica che non possa essere
        eliminata senza danneggiare l’immobile non potrà essere effettuata dal Conduttore senza la preventiva
        autorizzazione scritta del Locatore e comunque resterà a beneficio dell’immobile senza che nulla sia dovuto
        al Conduttore, neanche a titolo di rimborso spese
    </p>
    <h5><b>6)RIPARAZIONI ORDINARIE E STRAORDINARIE E MANUTENZIONE</b></h5><br>
    <p>
        Le riparazioni di cui all’art. 1576 cod. civ. (Mantenimento della cosa locata in buono stato locativo) e 1609
        cod. civ. (Piccole riparazioni a carico dell’inquilino) sono a carico del Conduttore.<br>
        Se il Conduttore non provvederà tempestivamente potrà provvedervi il Locatore ed il relativo costo dovrà
        essergli rimborsato entro 30 (trenta) giorni dall’avvenuta riparazione.<br>
        Qualora l’immobile locato dovesse necessitare di riparazioni che non sono a carico del Conduttore, secondo
        le norme del codice civile e della prassi locativa, questi è tenuto a darne avviso scritto al Locatore. Se si
        tratta di riparazioni urgenti il Conduttore può eseguirle direttamente, salvo rimborso, purché ne dia
        contemporaneamente avviso al Locatore.
    </p><br>
    <h5><b>7)ESONERO RESPONSABILITA'</b></h5><br>
    <p>
        Il Conduttore esonera espressamente il Locatore per ogni responsabilità per danni diretti o indiretti che
        possano derivargli dal fatto doloso o colposo di terzi , quali ad esempio i condomini dello stabile o il portiere,
        e comunque di terzi in genere, anche in caso di furto.
    </p><br>
    <h5><b>8)REGISTRAZIONE BOLLI</b></h5><br>
    <p>
        Le spese di registrazione del presente contratto, ove previste, sono a carico delle parti al 50%. Sono a totale
        carico del Conduttore i bolli del presente contratto e i bolli delle quietanze.
    </p><br>
    <h5><b>9)MODIFICHE</b></h5><br>
    <p>
        Qualunque modifica al presente contratto dovrà risultare sempre da atto scritto.
        Per quanto non espressamente previsto nel presente contratto si rinvia alla legge 09/12/1998 n. 431, alla
        legge 27/07/1978 n. 392 ed agli articoli 1571 e seguenti del codice civile.

    </p>
    </p>
    <p style="float:left;display:inline;">IL LOCATORE</p>
    <p style="float:right;display:inline;">IL CONDUTTORE</p>
    <div style="height:200px;"></div>
    
    @endif
</body>

</html>