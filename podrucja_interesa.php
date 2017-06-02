<?php

if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}
ob_start();
include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null) {

    header("Location: neprijavljeni.php");
}

dnevnik_zapis(9); //uspjesna autorizacija reg korisnika
provjeraCoockie();

$naslov = "Podrucja interesa";
include_once 'header.php';



//echo korisnikID();


$ispisPodrucja = array();

//$sql = "SELECT * FROM `podrucja_interesa` ";
$sql = "SELECT * FROM `podrucja_interesa` p 
WHERE
!(SELECT EXISTS(
SELECT * FROM `blokiraniKorisnici` bk
WHERE
bk.`IDkorisnika` = :ID AND bk.`IDpodrucja` = p.ID_podrucja))";


try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', korisnikID(), PDO::PARAM_INT);

    $stmt->execute();




    while ($row = $stmt->fetch()) {

        array_push($ispisPodrucja, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}








$smarty->assign('ispisPodrucja', $ispisPodrucja);





$smarty->display('predlosci/podrucjaInteresa.tpl');

function provjeraCoockie() {
    global $smarty;
    $nazivCock = "UvjetiKoristenjaRegistrirani" . sha1(korisnikUsername());

    if (empty($_COOKIE[$nazivCock])) {

        $coockieNeVrijedi = true;

        // echo "coockie ne postoji <br>";
        if (isset($_POST['coockieAccept']) && $_POST['coockieAccept'] == 1) {

            $id = vrijeme_sustava();
            $vrijedi_do = $id + 2592000; //259200 sec je 30 dana
            ob_get_clean();
            setcookie($nazivCock, $id, $vrijedi_do);
            dnevnik_zapis(16);
            $coockieNeVrijedi = false;
            header("Location: " . $_SERVER['PHP_SELF']);
        }


        // print "<b>Cookie:</b> $nazivCock <b>vrijedi do:</b>". date("d.m.Y h:i:sa",$vrijedi_do)."\n";
    }


    if (!empty($_COOKIE[$nazivCock])) {
        $coockieNeVrijedi = false;

        $id = $_COOKIE[$nazivCock];

        //print "<b>Cookie postoji :</b> $naziv=$id\n";
        //echo time();
        // echo "<br>Coockie je postavljen " . date("d.m.Y h:i:sa", $id)."<br>";
        $sada = vrijeme_sustava();
        $interval = $sada - $id;



        // echo "<br><br><br><br>sada je" . date("d.m.Y h:i:sa", $sada)."<br>";
        //  echo "<br>Coockie je postavljen već  " . date("i:s", $interval)."<br>";
        // echo "interval. ". $interval;

        if ($interval < 2592000) {

            //akoje proslo 5 minuta 300s


            $ostalo = 2592000 - $interval;

            // echo secondsToTime($ostalo);
        }

        if ($interval > 2592000) { // AKO JE PROSLO 3 DANA
            $coockieNeVrijedi = true;

            if (isset($_POST['coockieAccept']) && $_POST['coockieAccept'] == 1) {

                $id = vrijeme_sustava();
                $vrijedi_do = $id + 2592000; //259200 sec je 3 dana

                setcookie($nazivCock, $id, $vrijedi_do);
                dnevnik_zapis(16);
                $coockieNeVrijedi = false;
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    $smarty->assign('coockieNeVrijediIF', $coockieNeVrijedi);
}

$sat = true;
include_once 'footer.php';
?>


