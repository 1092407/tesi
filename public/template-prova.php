<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function sidebar(){
    echo '<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
          <i class="fa fa-remove"></i>
        </a>
        <img src="/public/img/logo_senza_sfondo.png" style="width:80%;" class="w3-round" href="/public/index.html"><br><br>
        <h4><b>Filtri ricerca:</b></h4>
      </div>
      
      <div class="w3-container">
        <label>Tipo di camera:</label>
        <ul class="w3-bar-block w3-text my-filter ">
            <li ><input type="radio" name="tipo_camera"><label>Tutte</label></li>
            <li ><input type="radio" name="tipo_camera"><label>Stanza singola</label></li>
            <li ><input type="radio" name="tipo_camera"><label>Doppia</label></li>
        </ul>   
        <hr>

        <label>Data inizio contratto:</label><br>
        <input type="date" name="data_inizio"><br><br>
        <label>Data fine contratto:</label><br>
        <input type="date" anme="data_fine">
      </div>


     <!-- <div class="w3-bar-block">
        <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a> 
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
      </div>
      <div class="w3-panel w3-large">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
      </div>-->
    </nav>';
}

function head(){
    echo '<title>Nicolò Raccichini</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/public/w3-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
}

function main(){
    
}