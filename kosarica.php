<?php

if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}

include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null) {

    header("Location: neprijavljeni.php");
}
dnevnik_zapis(9); //uspjesna autorizacija reg korisnika

dodajUKosaricu();


$naslov = "Košarica";
include_once 'header.php';
$raspolozivoBodova = brojBodova();
kupi();

/* svi kuponi */

$sql = "SELECT * FROM `kosarica` ko 
LEFT JOIN kuponi_clanstva kc ON  ko.`ID_kupona`  = kc. `ID_kupona`  
LEFT JOIN kuponi_podrucja kp ON kp.`ID_kupona` = ko.`ID_kupona` 
LEFT JOIN podrucja_interesa pi ON  pi.ID_podrucja =ko.ID_podrucja
WHERE  ko.`Potvrda_kupovine` = 0  and kp.ID_podrucja = ko.ID_podrucja  and ko.`ID_korisnika` = :IDkorisnika";


try {
    $ispis = array();


    $stmt = $dbc->prepare($sql);

    $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);

    $stmt->execute();




    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

$smarty->assign('ispis', $ispis);



/* kupljeni  kuponi */



$sql = "SELECT * 
FROM  `kupljeni_kuponi` kk
LEFT JOIN kuponi_podrucja kp ON kp.ID_kupona = kk.`ID_kupona` 
LEFT JOIN kuponi_clanstva kc ON kc.ID_kupona = kp.`ID_kupona` 
WHERE kk.ID_podrucja = kp.ID_podrucja
AND kk.`ID_korisnika` =:IDkorisnika";


try {
    $ispisKupljenih = array();


    $stmt = $dbc->prepare($sql);

    $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);

    $stmt->execute();




    while ($row = $stmt->fetch()) {

        array_push($ispisKupljenih, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

$smarty->assign('ispisKupljenih', $ispisKupljenih);

function kupi() {
    global $raspolozivoBodova;
    global $dbc;
    $uspjesnoKupljen = false;

    //echo"<br><br>kupi";
    if (isset($_POST['kupovina'])) {
        //echo"<br><br>post";


        $sql = "SELECT *FROM `kosarica` WHERE `ID_stavke` = :IDstavke and `ID_korisnika` = :IDkorisnika";


        try {
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDstavke', $_POST['IDstavke'], PDO::PARAM_INT);



            $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);




            $stmt->execute();

            $stavka = $stmt->fetch();
            $broj = $stmt->rowcount();



            $stmt->closeCursor();
        } catch (PDOException $e) {

            trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
        }
       // echo"<br><br>broj: " . $broj;
        if ($broj == 1) {

           // echo"<br><br> broj 1";

            $sql = "SELECT *FROM `kuponi_podrucja` kp LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = kp.`ID_podrucja`  LEFT JOIN kuponi_clanstva kc ON kc.ID_kupona = kp.`ID_kupona`  "
                    . "wHERE kp.`ID_podrucja` = :IDpodrucja and Datum_zavrsetka > :Datum and kp.`ID_kupona` = :IDkupona";

            //echo"<br><br> kupon: " . $stavka['ID_kupona'];
           // echo"<br><br> pordrucje: " . $stavka['ID_podrucja'];
            $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

            try {
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(':IDkupona', $stavka['ID_kupona'], PDO::PARAM_INT);
                $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);


                $stmt->bindParam(':IDpodrucja', $stavka['ID_podrucja'], PDO::PARAM_INT);




                $stmt->execute();

                $kupon = $stmt->fetch();
                $broj = $stmt->rowcount();



                $stmt->closeCursor();
            } catch (PDOException $e) {

                trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
            }

            //echo"<br><br>kupon kolicina: " . $broj;


            if (!empty($kupon)) {
              //  echo"<br><br>kupon postoji" . $kupon['Min_broj_bodova'];
              //  echo"<br><br>raspolozivo" . $raspolozivoBodova;

                if ($raspolozivoBodova >= $kupon['Min_broj_bodova']) {
                    //obavi kupnju
                    //  echo"<br><br>ima para";
                    $sql = "INSERT INTO `kupljeni_kuponi`
(`ID_kupljlenoga`, `Generirani_kod`, `ID_kupona`, `ID_korisnika`, `Datum_kupnje`, `Iznos`, `ID_podrucja`) 
VALUES
 (null,:kod,:IDkupona,:IDkorisnika,:Datum,:Iznos,:IDpodrucja)";


                    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

                    try {
                        $stmt = $dbc->prepare($sql);

                        $stmt->bindParam(':IDkupona', $stavka['ID_kupona'], PDO::PARAM_INT);
                        $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
                        $stmt->bindParam(':Iznos', $kupon['Min_broj_bodova'], PDO::PARAM_STR);
                        $stmt->bindParam(':kod', sha1(vrijeme_sustava()), PDO::PARAM_STR);
                        $stmt->bindParam(':IDpodrucja', $stavka['ID_podrucja'], PDO::PARAM_INT);
                        $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);



                        $uspjesnoKupljen = $stmt->execute();


                        //$broj = $stmt->rowcount();

                        dnevnik_zapis(20); //kupljen kupon

                        $stmt->closeCursor();
                    } catch (PDOException $e) {

                        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
                    }
                } else {
                    dnevnik_zapis(21); //nema novaca

                    echo"<br><br> nema novaca";






                    //nema se para
                }
            }
        }//if

        if ($uspjesnoKupljen) {



            $sql = "DELETE FROM `kosarica` WHERE `ID_stavke` = :IDstavke";


            try {
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(':IDstavke', $_POST['IDstavke'], PDO::PARAM_INT);



                $stmt->execute();
                dnevnik_zapis(22); //obrisana stavka iz košarice






                $stmt->closeCursor();
            } catch (PDOException $e) {

                trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
            }


            $sql = "INSERT INTO  `WebDiP2016x052`.`promet_bodova` (
`ID_prometa` ,
`Datum` ,
`ID_aktivnosti` ,
`ID_korisnika` ,
`ID_kupona` ,
`Vrsta_prometa` ,
`Kolicina_bodova`
)
VALUES (
NULL ,  :Datum,  20,  :IDkorisnika,  :IDkupona,  'kupnja',  :Iznos
);";
            $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

            try {
               
                $stmt = $dbc->prepare($sql);

                $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
                //$stmt->bindParam(':IDaktivnosti', $i, PDO::PARAM_INT);

                $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
                $stmt->bindParam(':IDkupona', $stavka['ID_kupona'], PDO::PARAM_INT);
//echo'<br>korinsik: '.$stavka['ID_kupona'];
//echo'<br>stavka: '.$stavka['ID_kupona'];
                //$stmt->bindParam(':kupnja', $k, PDO::PARAM_STR);
                $stmt->bindParam(':Iznos', $kupon['Min_broj_bodova'], PDO::PARAM_STR);
                
                
                //echo '<br>kupon iznos: '.$kupon['Min_broj_bodova'];
 $stmt->execute();


                dnevnik_zapis(23); //umanjen broj bodova
                //$stmt->execute();



               


                $stmt->closeCursor();
            } catch (PDOException $e) {

                trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
            }
        }
    }//post
}

/* u košaricu */

function dodajUKosaricu() {
    global $dbc;
    if (!empty($_GET['IDkupona']) && !empty($_GET['IDpodrucja'])) {


        $sql = "SELECT *FROM `kosarica` WHERE `ID_kupona` = :IDkupona and `ID_podrucja` = :IDpodrucja and `ID_korisnika` = :IDkorisnika";


        try {
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDkupona', $_GET['IDkupona'], PDO::PARAM_INT);

            $stmt->bindParam(':IDpodrucja', $_GET['IDpodrucja'], PDO::PARAM_INT);

            $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);




            $stmt->execute();


            $broj = $stmt->rowcount();



            $stmt->closeCursor();
        } catch (PDOException $e) {

            trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
        }




        if ($broj < 1) {






            $sql = "INSERT INTO `kosarica`(`ID_stavke`, `Vrijeme`, `ID_kupona`, `ID_podrucja`, `ID_korisnika`, `Potvrda_kupovine`) VALUES (NULL ,:vrijeme,:IDkupona,:IDpodrucja,:IDkorisnika,0)";
            $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

            try {
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(':IDkupona', $_GET['IDkupona'], PDO::PARAM_INT);

                $stmt->bindParam(':IDpodrucja', $_GET['IDpodrucja'], PDO::PARAM_INT);

                $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);

                $stmt->bindParam(':vrijeme', $vrijeme, PDO::PARAM_STR);


                $stmt->execute();



                dnevnik_zapis(19); //artikal dodan u košaricu


                $stmt->closeCursor();
            } catch (PDOException $e) {

                trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
            }
        }
    }
}

$smarty->display('predlosci/kosarica.tpl');
include_once 'footer.php';
?>
        
