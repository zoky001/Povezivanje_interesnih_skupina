<?php
if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}

include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null || !provjeraUlogeBool(ADMINISTRATOR)) {

    header("Location: neprijavljeni.php");
}
dnevnik_zapis(9); //uspjesna autorizacija reg korisnika


$naslov = "Statistika - ADMINISTRATOR";
include_once 'header.php';
echo '<br><br><br><br><br>';



$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 



    if (!empty($_GET['show']) && $_GET['show'] == 'BpoK' ){
     $smarty->assign('bpk',  true);
       
    }
    elseif (!empty($_GET['show']) && $_GET['show'] == 'BpoA' ) {
        
        
       
        
        
$ispis = array();
$sql = "SELECT ak.`ID_aktivnosti`, ak.Naziv_aktivnosti
FROM `promet_bodova` pb
LEFT JOIN `aktivnosti` ak ON pb.ID_aktivnosti = ak.ID_aktivnosti
WHERE 1
GROUP BY ak.ID_aktivnosti";
   $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
    $stmt = $dbc->prepare($sql);

  // echo"<br><br><br><br><br>".
  $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }


//print_r($ispis);
$smarty->assign('ispisSvihAktivnosti',  $ispis);

    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}



        
        
        
        
        
     $smarty->assign('bpa',  true);    
     
}

    elseif (!empty($_GET['show']) && $_GET['show'] == 'korisniku' ) {
        
        
        
        
        
$ispis = array();
$sql = "SELECT  `korisnik_id`, `ime`, `prezime`
FROM `korisnik` WHERE 1";
   $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
    $stmt = $dbc->prepare($sql);

  // echo"<br><br><br><br><br>".
  $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }


//print_r($ispis);
$smarty->assign('ispisSvihAktivnosti',  $ispis);

    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}



        
        
        
        
        
        
     $smarty->assign('korisnik',  true);
}
 else {
     $smarty->assign('Tema',  true);
}







   echo '<br><br><br>';
$smarty->display('predlosci/statistikaAdmin.tpl');
include_once 'footer.php';


?>