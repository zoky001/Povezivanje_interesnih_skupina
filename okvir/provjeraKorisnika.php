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

function provjeraUlogeBool($uloga) {
    
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
    if ($korisnik->get_vrsta() == $uloga) {
        return true;
        
    }
 else {
    return false;    
    }
}





function korisnikUsername(){  
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
  
    
    return $korisnik->get_kor_ime(); 
    }
    
    
function korisnikID(){  
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
  
    
    return $korisnik->get_ID(); 
    }

function provjeraUloge($uloga) {
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
    if ($korisnik == "" || $korisnik->get_status() != 1 || $korisnik->get_vrsta() != $uloga) {
        header("Location: okvir/error.php?e=2");
        exit();
    }
}
?>