<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('users')->insert([
            [ 'name' => 'Concessionario', 'cognome' => 'Concessionario',  'username' => 'concconc', 'password' => Hash::make('concconc'), 'livello' => 'concessionario','auto' => 'concconc','targa' => 'concconc','datavendita' =>  Carbon::create('2000','02','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente111', 'cognome' => 'cliente111',  'username' => 'cliente111', 'password' => Hash::make('cliente111'), 'livello' => 'cliente','auto' => 'Fiat 500','targa' => 'AA000AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente222', 'cognome' => 'cliente222',  'username' => 'cliente222', 'password' => Hash::make('cliente222'), 'livello' => 'cliente','auto' => 'Audi A3','targa' => 'AA001AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente333', 'cognome' => 'cliente333',  'username' => 'cliente333', 'password' => Hash::make('cliente333'), 'livello' => 'cliente','auto' => 'Ferrari Purosangue','targa' => 'AA002AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente444', 'cognome' => 'cliente444',  'username' => 'cliente444', 'password' => Hash::make('cliente444'), 'livello' => 'cliente','auto' => 'Hyundai i20','targa' => 'AA003AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente555', 'cognome' => 'cliente555',  'username' => 'cliente555', 'password' => Hash::make('cliente555'), 'livello' => 'cliente','auto' => 'Alfa Romeo Stelvio','targa' => 'AA004AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'cliente666', 'cognome' => 'cliente666',  'username' => 'cliente666', 'password' => Hash::make('cliente666'), 'livello' => 'cliente','auto' => 'Ford Fiesta','targa' => 'AA005AA','datavendita' =>  Carbon::create('2023','01','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

        ]);


        DB::table('messaggi')->insert([

        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 2,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],
        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 3,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],
        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 4,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],
        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 5,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],
        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 6,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],
        ['contenuto' => 'Benvenuto nel nostro servizio online! Tramite questa chat potrai chiedere ulteriori informazioni e assistenza ogni volta che risulti necessario ' , 'data' => Carbon::create('2023','01','01','19','30','00') , 'mittente' => 1 , 'destinatario' => 7,'created_at' => Carbon::create('2023','01','01'), 'updated_at' => Carbon::create('2023','01','01')],

        ]);






        //le foto delle auto  si trovano in public/img/alloggi    perchè ho riutilizzato progetto precedente
        //nel testo della descrizione non posso mettere ' perchè sennò segnala error che si aspetta ] di chiusura e il seed lancia eccezione

        DB::table('auto')->insert([
            ['marca' => 'Fiat' , 'modello' => '500' , 'foto' => 'fiat500.png' , 'descrizione' => 'prova per seed'],
            ['marca' => 'Audi' , 'modello' => 'A3' , 'foto' => 'audiA3.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Ferrari' , 'modello' => 'Purosangue' , 'foto' => 'FerrariPurosangue.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Hyundai' , 'modello' => 'i20' , 'foto' => 'Hyundaii20.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'volkswagen' , 'modello' => 'golf' , 'foto' => 'golf.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Lamborghini' , 'modello' => 'Revuleto' , 'foto' => 'revuelto.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Fiat' , 'modello' => 'tipo' , 'foto' => 'tipo.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Alfa Romeo' , 'modello' => 'Giulia' , 'foto' => 'giulia.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Alfa Romeo' , 'modello' => 'Stelvio' , 'foto' => 'stelvio.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Renault' , 'modello' => 'Clio' , 'foto' => 'clio.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ['marca' => 'Ford' , 'modello' => 'Fiesta' , 'foto' => 'fiesta.png' , 'descrizione' => 'Stai cercando un modo ecologico e conveniente di spostarti in città? Allora questa auto elettrica potrebbe essere perfetta per te!Il nostro veicolo è alimentato da una o più potenti batterie al litio, che ti permetteranno di percorrere diverse centinaia di chilometri senza doverti preoccupare di fare il pieno. Inoltre, non emetterà alcun gas di scarico durante la guida, contribuendo a ridurre l impatto ambientale.La guida di questa auto elettrica è fluida e silenziosa, rendendola ideale per il traffico cittadino. Non dovrai preoccuparti di fare il cambio dell olio o di altre manutenzioni complesse, il che la rende anche conveniente da gestire a lungo termine.Se sei interessato a questa fantastica auto elettrica, non esitare a contattarci per maggiori informazioni o per fissare un appuntamento per una prova su strada. Siamo sicuri che una volta provata, non potrai più farne a meno!'],
            ]);

            //le prove le vedo solo su un cliente
            DB::table('misurazioni')->insert([
            //come prova prendo 2 chee sarebbe cliente111 nella tabella users perchè viene creato per secondo
            //le date sono yaer mont day hour minutes seconds
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','01','00'),  'temperatura' => 47.5,  'voltaggio' => 2.3,'amperaggio' => 23.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','03','00'),  'temperatura' => 49.5,  'voltaggio' => 18.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','04','00'),  'temperatura' => 67.5,  'voltaggio' => 12.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 62.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 57.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','03','00'),  'temperatura' => 87.5,  'voltaggio' => 12.3,'amperaggio' => 37.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 67.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','07','12','00','00'),  'temperatura' => 7.5,  'voltaggio' => 12.3,'amperaggio' => 27.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 19.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','02','00'),  'temperatura' => 7.5,  'voltaggio' => 82.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 87.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','01','00'),  'temperatura' => 47.5,  'voltaggio' => 2.3,'amperaggio' => 23.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','03','00'),  'temperatura' => 49.5,  'voltaggio' => 18.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','04','00'),  'temperatura' => 67.5,  'voltaggio' => 12.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 62.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 57.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','03','00'),  'temperatura' => 87.5,  'voltaggio' => 12.3,'amperaggio' => 37.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 67.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','00','00'),  'temperatura' => 7.5,  'voltaggio' => 12.3,'amperaggio' => 27.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 19.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','02','00'),  'temperatura' => 7.5,  'voltaggio' => 82.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 87.8],

            //
             [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','01','00'),  'temperatura' => 47.5,  'voltaggio' => 2.3,'amperaggio' => 23.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','03','00'),  'temperatura' => 49.5,  'voltaggio' => 18.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','04','00'),  'temperatura' => 67.5,  'voltaggio' => 12.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 62.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 57.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','03','00'),  'temperatura' => 87.5,  'voltaggio' => 12.3,'amperaggio' => 37.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 67.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','07','12','00','00'),  'temperatura' => 7.5,  'voltaggio' => 12.3,'amperaggio' => 27.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 19.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','02','00'),  'temperatura' => 7.5,  'voltaggio' => 82.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 87.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','01','00'),  'temperatura' => 47.5,  'voltaggio' => 2.3,'amperaggio' => 23.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','03','00'),  'temperatura' => 49.5,  'voltaggio' => 18.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','04','00'),  'temperatura' => 67.5,  'voltaggio' => 12.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','00','00'),  'temperatura' => 17.5,  'voltaggio' => 62.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 57.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','02','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','03','00'),  'temperatura' => 87.5,  'voltaggio' => 12.3,'amperaggio' => 37.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','04','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','05','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 67.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','00','00'),  'temperatura' => 7.5,  'voltaggio' => 12.3,'amperaggio' => 27.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','01','00'),  'temperatura' => 17.5,  'voltaggio' => 19.3,'amperaggio' => 7.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','02','00'),  'temperatura' => 7.5,  'voltaggio' => 82.3,'amperaggio' => 77.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','03','00'),  'temperatura' => 17.5,  'voltaggio' => 12.3,'amperaggio' => 87.8],



        ]);


    }

}//chiude la classe seeder
