<?php

if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}
?>


<?php

include_once('okvir/aplikacijskiOkvir.php');

$korisnik = new Korisnik();

dnevnik_zapis(6);
//pokušaj prijave


$ispisGresaka = array();
$trenutniKorisnik = 0;
$prijavaDvaKorakaOdobrena = false;








$prijavljen = false;


$uspjeh = array();
$postoji = false;
$aktiviran = false;
$lozinkaBazi = 0;
$salt = 0;
$prijavaDvaKoraka = false;
$mail = 0;
$dvaKorakaKod = 0;

if (!empty($_POST["submit"])) {
    if (!empty($_POST['korime']) && !empty($_POST['lozinka'])) {





        //  echo"<br>".$_POST['korime'];
        //echo"<br>".$_POST['lozinka'];

        $korime = $_POST['korime'];
        $lozinka = $_POST['lozinka'];

        if (dohvatiKorisnika($korime)) {
            global $trenutniKorisnik;
            $trenutniKorisnik = dohvatiKorisnika($korime);
            $postoji = true;
            $salt = $trenutniKorisnik['salt'];
            $aktiviran = $trenutniKorisnik['verificirano'];
            $mail = $trenutniKorisnik['email'];
            $dvaKorakaKod = $trenutniKorisnik['dvaKorakaKod'];
            $lozinkaBazi = $trenutniKorisnik['lozinka_SHA'];

            if ($trenutniKorisnik['dvaKorakaKod']) {
                $prijavaDvaKorakaOdobrena = true;
            }

            if ($trenutniKorisnik['prijavaDvaKoraka'] == 1) {
                $prijavaDvaKoraka = true;
            }


            //echo "uspješno dohvačen korisnik: ";
        } else {
            //echo "neuspješno dohvačen korisnik";
            array_push($ispisGresaka, "neuspješno dohvačen korisnik");
        }

        if ($postoji && $aktiviran && dozvolaPrijave($trenutniKorisnik)) {

            //echo "<br> Lozinka u bazi: ".$lozinkaBazi;
            // echo "<br> Unjeta lozinka: ".$lozinka;
            // echo '<br> Salt: '.$salt;
            // echo "<br> sha lozinke". sha1($salt.'--'.$lozinka);
            //kriptiranje unešene lozinke
            $kript = (string) sha1($salt . '--' . $lozinka);
            //$kript = $lozinkaBazi;
            //$lozinkaBazi = (string)sha1($salt.'--'.$lozinka);
            if ($lozinkaBazi === $kript) {

                // echo "<br> lozinka je ispravna!!" . $lozinkaBazi;
                // echo "<br> lozinka je ispravna!!" . $kript;


                if ($prijavaDvaKoraka) {
                    if (empty($_POST['kodPrijava'])) {
                        global $prijavaDvaKorakaOdobrena;
                        $prijavaDvaKorakaOdobrena = true;

                        $jedinstvenikod = posaljiJedinstveniKod($trenutniKorisnik);

                        if ($jedinstvenikod) {
                            // echo "<br> Kod za prijavu: " . $jedinstvenikod;

                            array_push($uspjeh, "Kod za prijavu: " . $jedinstvenikod);
                        } else {
                            //echo "<br> Greska u slanju jednokratnog koda";
                            array_push($ispisGresaka, " Greska u slanju jednokratnog koda");
                        }
                    }

                    if (!empty($_POST['kodPrijava'])) {

                        if ($_POST['kodPrijava'] == $dvaKorakaKod) {


                            //echo "<br> Prijava uspješna u dva KOraka!!!!!";

                            if (provjeriValjanostKoda($trenutniKorisnik)) {
                                
                                 array_push($uspjeh, "Prijava uspješna u dva KOraka!!!!!");
                            $prijavljen = true;

                            $korisnik = autentikacija($_POST['korime'], $_POST['lozinka']);

                            uspjesnaPrijava($trenutniKorisnik);
                                
                            } else {
                                
                            array_push($ispisGresaka, "Kod za prijavu je istekao!!!!! Ponovno unesite podatke BEZ koda za slanje novog jedisntvenog koda");
                            NEuspjesnaPrijava($trenutniKorisnik);
                                
                            }
                           
                        } else {


                            // echo "<br> Pogrešan kod za prijavu!!!!!";

                            array_push($ispisGresaka, "Pogrešan kod za prijavu!!!!!");
                            NEuspjesnaPrijava($trenutniKorisnik);
                        }
                    }
                } elseif (!$prijavaDvaKoraka) {

                    //izvršiti ispravan upis
                    //echo "<br> Prijava uspješna!!!!!";
                    array_push($uspjeh, "Prijava uspješna!!!!!");



                    /*
                     * 
                     * postavljanje sesije
                     */



                    $korisnik = autentikacija($_POST['korime'], $_POST['lozinka']);










                    $prijavljen = true;

                    uspjesnaPrijava($trenutniKorisnik);
                }
            } else {
                // echo"<br> lozinka je pogrešna";
                // echo"<br> lozinka je pogrešna: " . $lozinkaBazi . "-----";
                // echo"<br> lozinka je pogrešna: " . $kript . "----";

                NEuspjesnaPrijava($trenutniKorisnik);
                array_push($ispisGresaka, "lozinka je pogrešna");

                //izvršiti pogrešan upis
            }
        } else if ($postoji && $aktiviran && !dozvolaPrijave($trenutniKorisnik)) {
            //echo "<br> korisnik je blokiran i nema pravo pristupa!!";
            array_push($ispisGresaka, "korisnik je blokiran i nema pravo pristupa!!");
        } else if (!$aktiviran && $postoji) {

            // echo "<br> korisnik nije aktiviran!!";

            array_push($ispisGresaka, " korisnik nije aktiviran!!");
        } else {
            array_push($ispisGresaka, "korisnik ne postoji!!");
            //echo "<br> korisnik ne postoji!!";
        }
    }


    if ($korisnik->get_status() == 1) {
        Sesija::kreirajKorisnika($korisnik);
        dnevnik_zapis(7);

        // korisnik uspješno priajvljen

        header("Location: podrucja_interesa.php");
        exit();
    }
}

function dozvolaPrijave($korisnik) {


    $dozvola = true;

    if ($korisnik['broj_neuspjesnih_prijava'] >= 3) {
        $dozvola = false;

        // echo "<br> NEEE Broj neuspjesnih prijava je:".$korisnik['broj_neuspjesnih_prijava'];
        // array_push($ispisGresaka,"korisnik ne postoji!!");
    } else {
        //"<br> DAAA Broj neuspjesnih prijava je:".$korisnik['broj_neuspjesnih_prijava'];
    }

    return $dozvola;
}

function uspjesnaPrijava($korisnik) {

    global $dbc;

    $imeZaMail = $korisnik['korisnicko_ime'];
    if ($korisnik['prijavaDvaKoraka']) {

        //ako je prijava u dva koraka


        $sql = "UPDATE `korisnik` SET `broj_neuspjesnih_prijava`= 0,`dvaKorakaKod`='0' WHERE `korisnicko_ime` = :ime";


        try {


            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':ime', $imeZaMail, PDO::PARAM_STR);



            $dobroUpisano = $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
        }
    } else {
        //nije prijava u dva koraka



        $sql = "UPDATE `korisnik` SET `broj_neuspjesnih_prijava`= 0  WHERE `korisnicko_ime` = :ime ";


        try {


            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':ime', $imeZaMail, PDO::PARAM_STR);



            $dobroUpisano = $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
        }
    }
}

function NEuspjesnaPrijava($korisnik) {
    global $dbc;



    $sql = "UPDATE `korisnik` SET `broj_neuspjesnih_prijava`=`broj_neuspjesnih_prijava`+1  WHERE `korisnicko_ime` = :ime ";


    try {


        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':ime', $imeZaMail, PDO::PARAM_STR);



        $dobroUpisano = $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
    }
}

function posaljiJedinstveniKod($korisnik) {

    $uspjelo = false;

    $noviKod = sha1(time() . "--" . $korisnik['korisnicko_ime']);

    $mail_to = $korisnik['email'];
    $mail_from = "From: WebDiP_2017@foi.hr_ZoranHrncic";
    $mail_subject = "Prijava u dva koraka - KOD";
    $mail_body = "Kod za jednokratnu prijavu je: " . $noviKod . " kod vrijedi 5 minuta. ";
    $imeZaMail = $korisnik['korisnicko_ime'];

    if (mail($mail_to, $mail_subject, $mail_body, $mail_from)) {
        // echo("Poslana poruka za: '$mail_to'!");
        // echo "<br> $mail_body";

        $uspjelo = $noviKod;





        global $dbc;



        $sql = "UPDATE `korisnik` SET `dvaKorakaKod`= :nKod, `vrijemeSlanjaKoda` = :vrijeme WHERE `korisnicko_ime` = :ime";


        try {

            $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':ime', $imeZaMail, PDO::PARAM_STR);
            $stmt->bindParam(':nKod', $noviKod, PDO::PARAM_STR);
            $stmt->bindParam(':vrijeme', $vrijeme, PDO::PARAM_STR);

            $dobroUpisano = $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
        }
    } else {
        //echo("Problem kod poruke za: '$mail_to'!");
        global $ispisGresaka;
        array_push($ispisGresaka, "Problem kod poruke za: '$mail_to'!");
    }
    return $uspjelo;
}

function provjeriValjanostKoda($korisnik) {

    $valja = false;



    $akt = strtotime($korisnik['vrijemeSlanjaKoda']);
    // echo 'Već je prošlo: ' . secondsToTime(vrijeme_sustava() - $akt) . "<br>";


    if (vrijeme_sustava() - $akt < 300) { //300 je 5 minuta
        $valja = true;
    } else {
        $valja = false;
    }


    return $valja;
}

function dohvatiKorisnika($korisnickoIme) {

    $podatci = false;







    global $dbc;

    $sql = "SELECT * 
FROM  `korisnik` 
WHERE `korisnicko_ime` =  :korIme";


    try {
        $stmt = $dbc->prepare($sql);


        $stmt->bindParam(':korIme', $korisnickoIme, PDO::PARAM_STR);

        $stmt->execute();

        while ($row = $stmt->fetch()) {

            $podatci = $row;
        }


        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }





    return $podatci;
}
?>




<?php

//PODACI ZA TEMPLATE IZ AKTIVNE SKRIPTE
$smarty->assign('naslovPrijava', 'Prijava postojećih korisnika');

$smarty->assign('postojiUspjeh', (count($uspjeh) > 0));

$smarty->assign('Uspjeh', $uspjeh);



$smarty->assign('postojiGreskaPrijava', (count($ispisGresaka) > 0));



$smarty->assign('Greska', $ispisGresaka);



$smarty->assign('Prijavljen', (!$prijavljen));


$smarty->assign('empIme', (!empty($_POST['korime'])));

if (!empty($_POST['korime'])) {


    $smarty->assign('KorIme', $_POST['korime']);
}

$smarty->assign('empLoz', (!empty($_POST['lozinka'])));

if (!empty($_POST['lozinka'])) {
    $smarty->assign('Lozinka', $_POST['lozinka']);
}




$smarty->assign('PrijavaDvaKoraka', ($prijavaDvaKorakaOdobrena));


$smarty->assign('PrijavaDvaKorakaTekst', 'Kod za prijavu:');





$smarty->assign('kor1', 'Obicna');
$smarty->assign('loz1', 'ObicnA12');


$smarty->assign('kor2', 'Admin');
$smarty->assign('loz2', 'asAS12');

$smarty->assign('kor3', 'Moderator');
$smarty->assign('loz3', 'asAS12');


$smarty->assign('kor4', 'DvaKoraka');
$smarty->assign('loz4', 'DvaKoraka12');


if (!empty($_POST['zaboravljenaLozinka'])) {
    
  
    
    
    $sql = "SELECT  lozinka FROM `korisnik` 
WHERE `email` = :mail";
  

try {
    $stmt = $dbc->prepare($sql);
 $stmt->bindParam(':mail', $_POST['email'], PDO::PARAM_STR);
    
    $stmt->execute();
    
    if ($stmt->rowcount() == 1) {
        $row = $stmt->fetch();
        
        
          //echo '<br><br><br> zaboravljena lozinka'.$_POST['email']."--".$row[0];
          
           $mail_to = $_POST['email'];
    $mail_from = "From: WebDiP_2017@foi.hr_ZoranHrncic";
    $mail_subject = "Zaboravljena lozinka!";
    $mail_body = "Pozdrav, lozinka je: ".$row['lozinka'];
   

    if (mail($mail_to, $mail_subject, $mail_body, $mail_from)){
        
        // echo '<br><br><br> poslan mail'.$_POST['email'];
        
    }
        
    }


   




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}
    
    
    
}

include_once 'neprijavljeni.php';

include_once 'footer.php';
?>






