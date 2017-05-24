<!DOCTYPE html>
<html>
    <head>
        <title>Aktivacija</title>
        <meta charset="UTF-8">
      
    </head>
    <body>
<?php

include_once 'okvir/aplikacijskiOkvir.php';



if (isset($_GET['ime']) && isset($_GET['kod'])) {

    $valjano = false;


    echo "<br> IME: " . $_GET['ime'];
    echo "<br> KOD: " . $_GET['kod'];

    $ime = $_GET['ime'];
    $kod = $_GET['kod'];



    $sql = "SELECT * 
FROM  `korisnik` 
WHERE  `verificirano` =0
AND  `verifikacijski_kod` =  :kod
AND  `korisnicko_ime` =  :ime";


    try {
        $stmt = $dbc->prepare($sql);


        $stmt->bindParam(':kod', $kod, PDO::PARAM_STR);
        $stmt->bindParam(':ime', $ime, PDO::PARAM_STR);

        $stmt->execute();

        $broj = $stmt->rowCount();

        $row = $stmt->fetch();

        $vrijemeRegistracije = $row['vrijemeRegistracije'];



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }

    
    
    if ($broj == 1) {

        echo 'VrijemeRegistracije: ' . $vrijemeRegistracije . "<br>";

        $akt = strtotime($vrijemeRegistracije);
        echo 'Već je prošlo: ' . secondsToTime(vrijeme_sustava() - $akt) . "<br>";


        if (vrijeme_sustava() - $akt < 18000) { //18000 je 5 sati
            $valjano = true;
            echo 'valja';
            aktivirajKorisnika($ime);
            dnevnik_zapis(14); // uspjesno aktiviran
            
             zaradiBodove($row['korisnik_id'],14,100);
             
           $smarty->assign('otvoriPrijavu', TRUE);
           
            header('Location: neprijavljeni.php?prijava=1');
        } else {
            echo "<br>Aktivacijski link je istekao!!<br> Potrebno je ponovno izvršiti registraciju!<br>";

            echo "<a href='neprijavljeni.php'>Registracija</a>";

            obrisiKorisnika($ime);
               dnevnik_zapis(15); // NE uspjesno aktiviran
        }
    } else {
 dnevnik_zapis(15); // NE uspjesno aktiviran
        echo "<br>Pogrešan kod, ili je račun već aktiviran!! <br>";
        echo "<a href='neprijavljeni.php'>Registracija</a>";
    }






}

function obrisiKorisnika($korIme) {

    global $dbc;

    $sql = "DELETE FROM `korisnik` WHERE `korisnicko_ime` = :ime";


    try {


        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':ime', $korIme, PDO::PARAM_STR);


        $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
    }
}

function aktivirajKorisnika($korIme) {

    global $dbc;

    $sql = "UPDATE `korisnik` SET `verificirano`='1'  WHERE `korisnicko_ime` = :ime";


    try {


        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':ime', $korIme, PDO::PARAM_STR);


        $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
    }
}
?>
   </body>
</html>