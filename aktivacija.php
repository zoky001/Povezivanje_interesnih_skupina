<?php
include_once 'okvir/aplikacijskiOkvir.php';
include_once 'commonClass/baza.class.php';
$veza = new Baza();


if (isset($_GET['ime']) && isset($_GET['kod'])) {

    $valjano = false;


    echo "<br> IME: " . $_GET['ime'];
    echo "<br> KOD: " . $_GET['kod'];

    $ime = $_GET['ime'];
    $kod = $_GET['kod'];



    $veza->spojiDB();
   
    $rezultat = $veza->selectDB("  SELECT * 
FROM  `korisnik` 
WHERE  `verificirano` =0
AND  `verifikacijski_kod` =  '$kod'
AND  `korisnicko_ime` =  '$ime'");


    foreach ($rezultat as $value) {
        echo "<br>";
        foreach ($value as $v) {
            $valjano = true;

            print_r($v);
            echo " ";
        }
    }


    if ($valjano) {

        $rezultat = $veza->updateDB("UPDATE `korisnik` SET `verificirano`='1'  WHERE `korisnicko_ime` = '$ime'");



        if ($rezultat) {
            header('Location: neprijavljeni.php');
           
            
        } else {
            echo "<br>NEEEEuspješno upisani podatci";
        }
    }
    else {
        
        echo "<br>Racun je vec vjerojatno verificiran, ili je neka druga greska <br>";
        echo "<a href='http://barka.foi.hr/WebDiP/2016/zadaca_04/zorhrncic/registracija.php'>Registracija</a>";
        
    }

    $veza->zatvoriDB();
}