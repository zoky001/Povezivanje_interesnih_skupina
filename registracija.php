<?php
include_once 'okvir/aplikacijskiOkvir.php';
include_once 'commonClass/baza.class.php';
$veza = new Baza();

$postojiIme = false;
$postojiEmail = false;

$uspjesnaPrijava =false;




$postojiGreska = false;


$ispisGresaka=array();




if (!empty($_POST["submit"])) {
    
  
    if (!empty($_POST['g-recaptcha-response'])) {
        
        $secret = "6LdcTB8UAAAAAAuBYRNxnJ-jhrkWb6RQglxP1y7d";
        $response1 = $_POST['g-recaptcha-response'];


$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => $secret, 'response' => $response1);
$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//var_dump($result);

$obj = json_decode($result, false);


if ($obj->success) {
    
   // echo "<br> Uspješna verifikacija putem REcptcha";
}
else {
    // echo "<br> NEEEEuspješna verifikacija putem reCaptcha";
     
     array_push($ispisGresaka,"NEEEEuspješna verifikacija putem reCaptcha");
    $postojiGreska = true;
}


    
}



    foreach ($_POST as $key => $value) {
        
       

        //provjera dal je koje polje prazno
        if (empty($value)) {
          //  echo "Nije upisano: " . $key . "<br>";
        array_push($ispisGresaka,"Nije upisano: " . $key);
            $postojiGreska = true;
            // ukljuciUsklicnik($key);
            // ukljuciGresku($key);
        }

        if (!provjeraNedeozvoljenogZnaka($value)) {
             array_push($ispisGresaka,"Polje: \"" . $key . "\" sadrzi nedozvoljeni znak: \"" . $value . "\"");
         //   echo "Polje: \"" . $key . "\" sadrzi nedozvoljeni znak: \"" . $value . "\"<br>";
            $postojiGreska = true;
        }
    }



    if (!provjeraLozinke($_POST['password'])) {
       // echo "<br>Lozinka NIJE dobra";
 array_push($ispisGresaka,"Lozinka NIJE dobra");
        $postojiGreska = true;
    } else {
        if ($_POST['password'] !== $_POST['confirmPassword']) {

         //   echo "<br>lozinke nisu iste";
             array_push($ispisGresaka,"Lozinke nisu iste");
            $postojiGreska = true;
        }
    }



    if (!provjeraMaila($_POST['mail'])) {

      //  echo "<br>Email adresa nije ispravna";
        
         array_push($ispisGresaka,"Email adresa nije ispravna");
        $postojiGreska = true;
    }

    if (postojiMail($_POST['mail'])) {

       // echo "<br>Email adresa ISKORIŠTENA";
         array_push($ispisGresaka,"Email adresa ISKORIŠTENA");
        $postojiEmail = true;
        $postojiGreska = true;
    }


    if (postojiKorIme($_POST['korime'])) {

       // echo "<br>Postojeće korisničko ime";
        
        array_push($ispisGresaka,"Postojeće korisničko ime");
        $postojiIme = true;
        $postojiGreska = true;
    }
}

if ($postojiGreska) {

   // echo"<br>Postoji greska <br>";
} else if(!$postojiGreska && !empty($_POST['submit'])) {
   // echo"<br>Nema greške!!<br>";
    //echo "ne postoji greška <br>";
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korime = $_POST['korime'];
    $mail = $_POST['mail'];
    $lozinka = $_POST['password'];
    $dvaKoraka = 0;
    
      if (!empty($_POST['dvaKoraka'])) {
        
        //postoji i ima vrednost 1
       $dvaKoraka = 1;
        
    }
    
    
    $salt = sha1(time());
    
    $lozinkaKriptirano = sha1($salt."--".$lozinka);


    $aktivacijskiKod = sha1(time() + $korime);


    $mail_to = $mail;
    $mail_from = "From: WebDiP_2017@foi.hr_ZoranHrncic";
    $mail_subject = "Aktivacija";
    $mail_body = "https://barka.foi.hr/WebDiP/2016_projekti/WebDiP2016x052/aktivacija.php?ime=$korime&kod=$aktivacijskiKod";

    if (mail($mail_to, $mail_subject, $mail_body, $mail_from)) {
       // echo("Poslana poruka za: '$mail_to'!");
      //  echo "<br> $mail_body";
        global $uspjesnaPrijava;
        $uspjesnaPrijava = true;
    } else {
       // echo("Problem kod poruke za: '$mail_to'!");
       array_push($ispisGresaka,"Problem kod poruke za: '$mail_to'!");
    }



    $veza->spojiDB();

    $rezultat = $veza->updateDB("INSERT INTO  `WebDiP2016x052`.`korisnik` (
`korisnik_id` ,
`ime` ,
`prezime` ,
`korisnicko_ime` ,
`email` ,
`lozinka` ,
`lozinka_SHA` ,
`tip_korisnika` ,
`verifikacijski_kod` ,
`verificirano` ,
`broj_neuspjesnih_prijava`,
`prijavaDvaKoraka`,
`salt`
)
VALUES (
NULL ,  '$ime',  '$prezime ',  '$korime',  '$mail',  '$lozinka',  '$lozinkaKriptirano',  '3',  '$aktivacijskiKod',  '0',  '0',  '$dvaKoraka',  '$salt'
)
");



    if ($rezultat) {
        // echo "<br>uspješno upisani podatci";
    } else {
        array_push($ispisGresaka,"NEEEEuspješno upisani podatci u bazu ");
     //   echo "<br>NEEEEuspješno upisani podatci u bazu ";
    }
}

function postojiKorIme($mail) {
    $postoji = false;

    global $veza;
    $veza->spojiDB();
    $razultat = $veza->selectDB("SELECT * FROM `korisnik` WHERE `korisnicko_ime` = '" . $mail . "'");
    $veza->zatvoriDB();


    if (!empty($razultat)) {
        foreach ($razultat as $value) {
            // print_r($value); 
            // echo "<br><br>";

            foreach ($value as $v) {
                $postoji = true;
            }
        }
    }

    return $postoji;
}

function postojiMail($mail) {
    $postoji = false;

    global $veza;
    $veza->spojiDB();
    $razultat = $veza->selectDB("SELECT * FROM `korisnik` WHERE `email` = '" . $mail . "'");
    $veza->zatvoriDB();


    if (!empty($razultat)) {
        foreach ($razultat as $value) {
            // print_r($value); 
            // echo "<br><br>";

            foreach ($value as $v) {
                $postoji = true;
            }
        }
    }

    return $postoji;
}

function provjeraMaila($mail) {


    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function provjeraLozinke($lozinka) {
    $i = 0;

    $name = test_input($lozinka);


    if (preg_match('/[0-9]{1,}/', $name)) { //jedan broj
        $i++;
    }


    if (preg_match('/^.{5,15}$/', $name)) { //5 do 15
        $i++;
    }

    if (preg_match('/(([a-z]|[čćžšđ]){2,}|([a-z]|[čćžšđ]).*([a-z]|[čćžšđ]))/', $name)) { //5 do 15
        $i++;
    }



    if (preg_match('/(([A-Z]|[ČĆŽŠĐ]){2,}|([A-Z]|[ČĆŽŠĐ]).*([A-Z]|[ČĆŽŠĐ]))/', $name)) { //5 do 15
        $i++;
    }

    if ($i == 4) {
        return true;
    } else {
        return false;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function provjeraNedeozvoljenogZnaka($rijec) {
    $sadrziZnak = true;
    $rijec = str_split($rijec);
    foreach ($rijec as $char) {
        switch ($char) {
            case "(": $sadrziZnak = false;
                break;
            case ")": $sadrziZnak = false;
                break;
            case "{": $sadrziZnak = false;
                break;
            case "}": $sadrziZnak = false;
                break;
            case "'": $sadrziZnak = false;
                break;
            case "!": $sadrziZnak = false;
                break;
            case "#": $sadrziZnak = false;
                break;
            case "\"": $sadrziZnak = false;
                break;
            case "\\": $sadrziZnak = false;
                break;
            case "/": $sadrziZnak = false;
                break;
        }
    }
    return $sadrziZnak;
}
?>



            <?php 
            
           $smarty->assign('postojiImeIF', ($postojiIme && !empty($_POST['ime'])));

 $smarty->assign('postojiEmailIF', ($postojiEmail && !empty($_POST['mail'])));
 $smarty->assign('postojiIspisGresakaIF', (count($ispisGresaka) > 0));
 
 $smarty->assign('ispisGresaka', $ispisGresaka);
 
  $smarty->assign('uspjesnaPrijavaIF',  $uspjesnaPrijava);

  if ($uspjesnaPrijava) {
      dnevnik_zapis(13);
      //uspješna registracija
    
}
 else {
    dnevnik_zapis(12);
    //neuspješna registracija
}
     $smarty->display('predlosci/neprijavljeni.tpl');
     
 
          ?>
            
            
            
