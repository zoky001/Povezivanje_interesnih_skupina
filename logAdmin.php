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


$naslov = "Log sustava - ADMINISTRATOR";
include_once 'header.php';
echo '<br><br><br><br><br>';



$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 












$sql = "SELECT * 
FROM  `kuponi_clanstva` 
WHERE 1";
   
$ispisTema = array();
try {
    $stmt = $dbc->prepare($sql);

    
     //$stmt->bindParam(':IDmoderatora', korisnikID(), PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisTema, $row);
    }
    
    $smarty->assign('ispisTema',  $ispisTema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


     
    if (!empty($_GET['show']) && $_GET['show'] == 'interval' ){
     $smarty->assign('interval',  true);
       
    }
    elseif (!empty($_GET['show']) && $_GET['show'] == 'tipuZapisa' ) {
        
        
        
        
        
$ispis = array();
$sql = "SELECT  `ID_aktivnosti` ,`Naziv_aktivnosti`
FROM `aktivnosti`";
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



        
        
        
        
        
        
     $smarty->assign('tipZapisa',  true);
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
$smarty->display('predlosci/logAdmin.tpl');
include_once 'footer.php';


?>