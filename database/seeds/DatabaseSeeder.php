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


      // DATI RILEVAZIONI MISURAZIONI  BATTERIE DERIVANO DAL LINK SEGUENTE
      //  https://ieee-dataport.org/open-access/battery-and-heating-data-real-driving-cycles



    public function run() {

        DB::table('users')->insert([
            [ 'name' => 'CasaAuto', 'cognome' => 'CasaAuto',  'username' => 'concconc', 'password' => Hash::make('concconc'), 'livello' => 'casaauto','auto' => 'concconc','targa' => 'concconc','datavendita' =>  Carbon::create('2000','02','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
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


            //le prove le vedo solo su un cliente che è quello 111
            DB::table('misurazioni')->insert([
            //come prova prendo 2 chee sarebbe cliente111 nella tabella users perchè viene creato per secondo
            //le date sono yaer mont day hour minutes seconds
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','00','00'),  'temperatura' => 21.5,  'voltaggio' => 391.3,'amperaggio' => 27.8,'soc'=> 45.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','01','00'),  'temperatura' => 21.7,  'voltaggio' => 389.8,'amperaggio' => 32.8,'soc'=> 45.1],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','02','00'),  'temperatura' => 22.1,  'voltaggio' => 381.4,'amperaggio' => 35.1,'soc'=> 44.6],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','03','00'),  'temperatura' => 22.3,  'voltaggio' => 376.2,'amperaggio' => 34.8,'soc'=> 44.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','02','12','04','00'),  'temperatura' => 21.8,  'voltaggio' => 387.7,'amperaggio' => 24.4,'soc'=> 44.2],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','00','00'),  'temperatura' => 23.5,  'voltaggio' => 391.3,'amperaggio' => 44.8,'soc'=> 72.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','01','00'),  'temperatura' => 23.3,  'voltaggio' => 387.7,'amperaggio' => 42.8,'soc'=> 72.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','02','00'),  'temperatura' => 23.2,  'voltaggio' => 389.8,'amperaggio' => 47.8,'soc'=> 71.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','03','00'),  'temperatura' => 22.4,  'voltaggio' => 381.4,'amperaggio' => 45.8,'soc'=> 71.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','04','00'),  'temperatura' => 23.2,  'voltaggio' => 392.1,'amperaggio' => 48.8,'soc'=> 71.1],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','03','12','05','00'),  'temperatura' => 24.6,  'voltaggio' => 391.3,'amperaggio' => 49.1,'soc'=> 70.9],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','00','00'),  'temperatura' => 23.9,  'voltaggio' => 382.3,'amperaggio' => 51.6,'soc'=> 67.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','01','00'),  'temperatura' => 23.5,  'voltaggio' => 381.4,'amperaggio' => 56.8,'soc'=> 67.2],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','02','00'),  'temperatura' => 24.5,  'voltaggio' => 389.8,'amperaggio' => 58.3,'soc'=> 66.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','04','12','03','00'),  'temperatura' => 24.7,  'voltaggio' => 376.2,'amperaggio' => 55.3,'soc'=> 66.5],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','00','00'),  'temperatura' => 24.2,  'voltaggio' => 391.3,'amperaggio' => 59.9,'soc'=> 34.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','01','00'),  'temperatura' => 26.5,  'voltaggio' => 387.7,'amperaggio' => 54.8,'soc'=> 34.2],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','02','00'),  'temperatura' => 27.1,  'voltaggio' => 389.8,'amperaggio' => 68.8,'soc'=> 34.1],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','03','00'),  'temperatura' => 24.7,  'voltaggio' => 381.4,'amperaggio' => 63.1,'soc'=> 33.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','05','12','04','00'),  'temperatura' => 34.5,  'voltaggio' => 391.3,'amperaggio' => 67.8,'soc'=> 33.5],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','00','00'),  'temperatura' => 35.5,  'voltaggio' => 376.2,'amperaggio' => 65.2,'soc'=> 87.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','01','00'),  'temperatura' => 36.1,  'voltaggio' => 381.4,'amperaggio' => 69.9,'soc'=> 87.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','02','00'),  'temperatura' => 35.8,  'voltaggio' => 387.7,'amperaggio' => 67.8,'soc'=> 86.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','03','00'),  'temperatura' => 34.5,  'voltaggio' => 389.8,'amperaggio' => 63.8,'soc'=> 86.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','04','00'),  'temperatura' => 33.5,  'voltaggio' => 392.1,'amperaggio' => 67.1,'soc'=> 86.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','06','12','05','00'),  'temperatura' => 31.5,  'voltaggio' => 388.3,'amperaggio' => 45.8,'soc'=> 86.2],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','07','12','00','00'),  'temperatura' => 29.9,  'voltaggio' => 391.3,'amperaggio' => 53.8,'soc'=> 86.0],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','01','00'),  'temperatura' => 29.1,  'voltaggio' => 387.7,'amperaggio' => 59.8,'soc'=> 85.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','02','00'),  'temperatura' => 28.9,  'voltaggio' => 381.4,'amperaggio' => 35.8,'soc'=> 85.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','08','12','03','00'),  'temperatura' => 28.5,  'voltaggio' => 392.1,'amperaggio' => 67.8,'soc'=> 85.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','00','00'),  'temperatura' => 28.1,  'voltaggio' => 389.8,'amperaggio' => 7.0,'soc'=> 77.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','01','00'),  'temperatura' => 28.0,  'voltaggio' => 376.2,'amperaggio' => 23.8,'soc'=> 77.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','02','00'),  'temperatura' => 26.5,  'voltaggio' => 381.4,'amperaggio' => 14.8,'soc'=> 77.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','03','00'),  'temperatura' => 24.5,  'voltaggio' => 391.3,'amperaggio' => 17.5,'soc'=> 77.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','09','12','04','00'),  'temperatura' => 23.9,  'voltaggio' => 387.7,'amperaggio' => 13.8,'soc'=> 77.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','00','00'),  'temperatura' => 23.7,  'voltaggio' => 362.3,'amperaggio' => 4.8,'soc'=> 88.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','01','00'),  'temperatura' => 23.5,  'voltaggio' => 389.8,'amperaggio' => 7.9,'soc'=> 88.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','02','00'),  'temperatura' => 23.3,  'voltaggio' => 392.1,'amperaggio' => 4.8,'soc'=> 88.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','03','00'),  'temperatura' => 23.4,  'voltaggio' => 381.4,'amperaggio' => 37.8,'soc'=> 88.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','04','00'),  'temperatura' => 22.9,  'voltaggio' => 376.2,'amperaggio' => 41.4,'soc'=> 88.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','10','12','05','00'),  'temperatura' => 22.5,  'voltaggio' => 391.3,'amperaggio' => 48.6,'soc'=> 88.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','00','00'),  'temperatura' => 22.8,  'voltaggio' => 387.7,'amperaggio' => 43.2,'soc'=> 66.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','01','00'),  'temperatura' => 22.9,  'voltaggio' => 389.8,'amperaggio' => 37.8,'soc'=> 66.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','02','00'),  'temperatura' => 22.7,  'voltaggio' => 381.4,'amperaggio' => 48.8,'soc'=> 66.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','02','11','12','03','00'),  'temperatura' => 21.5,  'voltaggio' => 392.1,'amperaggio' => 87.8,'soc'=> 66.1],


             [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','00','00'),  'temperatura' => 21.4,  'voltaggio' => 376.2,'amperaggio' => 12.8,'soc'=> 80.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','01','00'),  'temperatura' => 21.5,  'voltaggio' => 391.3,'amperaggio' => 27.8,'soc'=> 80.6],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','02','00'),  'temperatura' => 21.4,  'voltaggio' => 392.1,'amperaggio' => 57.5,'soc'=> 80.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','03','00'),  'temperatura' => 21.6,  'voltaggio' => 381.4,'amperaggio' => 71.8,'soc'=> 80.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','02','12','04','00'),  'temperatura' => 23.1,  'voltaggio' => 389.8,'amperaggio' => 89.8,'soc'=> 80.0],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','00','00'),  'temperatura' => 23.4,  'voltaggio' => 387.7,'amperaggio' => 97.8,'soc'=> 70.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','01','00'),  'temperatura' => 23.5,  'voltaggio' => 391.3,'amperaggio' => 100.8,'soc'=> 70.1],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','02','00'),  'temperatura' => 24.1,  'voltaggio' => 381.4,'amperaggio' => 107.8,'soc'=> 69.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','03','00'),  'temperatura' => 23.7,  'voltaggio' => 392.1,'amperaggio' => 127.4,'soc'=> 68.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','04','00'),  'temperatura' => 22.6,  'voltaggio' => 389.8,'amperaggio' => 121.8,'soc'=> 68.2],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','03','12','05','00'),  'temperatura' => 21.5,  'voltaggio' => 384.3,'amperaggio' => 122.8,'soc'=> 68.0],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','00','00'),  'temperatura' => 21.9,  'voltaggio' => 391.3,'amperaggio' => 117.8,'soc'=> 63.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','01','00'),  'temperatura' => 21.8,  'voltaggio' => 376.2,'amperaggio' => 100.8,'soc'=> 63.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','02','00'),  'temperatura' => 21.4,  'voltaggio' => 387.7,'amperaggio' =>97.8,'soc'=> 63.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','04','12','03','00'),  'temperatura' => 22.8,  'voltaggio' => 379.3,'amperaggio' => 99.2,'soc'=> 63.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','00','00'),  'temperatura' => 22.5,  'voltaggio' => 387.5,'amperaggio' => 56.8,'soc'=> 61.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','01','00'),  'temperatura' => 21.5,  'voltaggio' =>392.1,'amperaggio' => 54.8,'soc'=> 61.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','02','00'),  'temperatura' => 23.5,  'voltaggio' => 391.3,'amperaggio' => 51.8,'soc'=> 61.0],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','03','00'),  'temperatura' => 23.4,  'voltaggio' => 376.2,'amperaggio' => 57.8,'soc'=> 60.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','05','12','04','00'),  'temperatura' => 23.9,  'voltaggio' => 382.3,'amperaggio' => 61.8,'soc'=> 60.2],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','00','00'),  'temperatura' => 22.5,  'voltaggio' => 389.8,'amperaggio' => 57.8,'soc'=> 86.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','01','00'),  'temperatura' => 22.4,  'voltaggio' => 381.4,'amperaggio' => 65.8,'soc'=> 86.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','02','00'),  'temperatura' => 25.7,  'voltaggio' => 387.7,'amperaggio' => 73.8,'soc'=> 86.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','03','00'),  'temperatura' => 24.5,  'voltaggio' => 392.1,'amperaggio' => 43.8,'soc'=> 86.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','04','00'),  'temperatura' => 23.8,  'voltaggio' => 391.3,'amperaggio' => 45.8,'soc'=> 86.1],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','06','12','05','00'),  'temperatura' => 23.5,  'voltaggio' => 397.3,'amperaggio' => 67.8,'soc'=> 86.0],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','07','12','00','00'),  'temperatura' => 24.5,  'voltaggio' => 392.3,'amperaggio' => 47.8,'soc'=> 85.9],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','01','00'),  'temperatura' => 23.6,  'voltaggio' => 389.8,'amperaggio' => 57.8,'soc'=> 83.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','02','00'),  'temperatura' => 23.5,  'voltaggio' => 392.1,'amperaggio' => 77.8,'soc'=> 83.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','08','12','03','00'),  'temperatura' => 22.7,  'voltaggio' => 376.2,'amperaggio' => 37.8,'soc'=> 83.0],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','00','00'),  'temperatura' => 22.5,  'voltaggio' => 391.3,'amperaggio' => 57.8,'soc'=> 72.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','01','00'),  'temperatura' => 22.7,  'voltaggio' => 387.7,'amperaggio' => 23.8,'soc'=> 72.6],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','02','00'),  'temperatura' => 25.5,  'voltaggio' => 381.4,'amperaggio' => 47.8,'soc'=> 72.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','03','00'),  'temperatura' => 26.5,  'voltaggio' => 382.3,'amperaggio' => 37.8,'soc'=> 72.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','09','12','04','00'),  'temperatura' => 26.1,  'voltaggio' => 376.2,'amperaggio' => 35.5,'soc'=> 72.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','00','00'),  'temperatura' => 24.5,  'voltaggio' => 391.3,'amperaggio' => 21.8,'soc'=> 69.9],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','01','00'),  'temperatura' => 23.5,  'voltaggio' => 387.7,'amperaggio' => 12.8,'soc'=> 69.8],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','02','00'),  'temperatura' => 22.5,  'voltaggio' => 376.2,'amperaggio' => 17.8,'soc'=> 69.6],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','03','00'),  'temperatura' => 21.5,  'voltaggio' => 389.8,'amperaggio' => 37.8,'soc'=> 69.4],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','04','00'),  'temperatura' => 23.5,  'voltaggio' => 381.4,'amperaggio' => 19.8,'soc'=> 69.2],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','10','12','05','00'),  'temperatura' => 24.5,  'voltaggio' => 391.3,'amperaggio' => 57.8,'soc'=> 69.1],

            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','00','00'),  'temperatura' => 22.5,  'voltaggio' => 387.7,'amperaggio' => 27.8,'soc'=> 75.7],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','01','00'),  'temperatura' => 23.8,  'voltaggio' => 381.4,'amperaggio' => 23.8,'soc'=> 75.5],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','02','00'),  'temperatura' => 23.6,  'voltaggio' => 391.3,'amperaggio' => 45.8,'soc'=> 75.3],
            [ 'cliente' => 2, 'data' => Carbon::create('2022','03','11','12','03','00'),  'temperatura' => 23.5,  'voltaggio' => 389.8,'amperaggio' => 55.3,'soc'=> 75.0],



        ]);


    }

}//chiude la classe seeder
