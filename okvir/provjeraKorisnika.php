<?php

include_once('korisnik.php');


function provjeraPrijaveKorisnika() {
  

    if (!Sesija::dajKorisnika()) {
        $korisnik = null;
   
    } else {
        $korisnik = Sesija::dajKorisnika();
       
        
      
    return $korisnik;
}
}

function provjeraKorisnika() {
    $korisnik = null;

    if (!Sesija::dajKorisnika()) {
        header("Location: okvir/error.php?e=2");
        exit();
    } else {
        $korisnik = Sesija::dajKorisnika();
       
        
        if ($korisnik->get_status() != 1) {
            header("Location: okvir/error.php?e=2");
            exit();
        } 
        
        
        if($korisnik->get_adresa() != $_SERVER["REMOTE_ADDR"]) {
            header("Location: okvir/error.php?e=2");
            exit();
        }
    }
    return $korisnik;
}

function provjeraUloge($uloga) {
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
    if ($korisnik == "" || $korisnik->get_status() != 1 || $korisnik->get_vrsta() != $uloga) {
        header("Location: okvir/error.php?e=2");
        exit();
    }
}
?>