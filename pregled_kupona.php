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
?>
        <!-- Header neprijavljeni -->
        
        
<?php $naslov = "Pregled kupona";
include_once 'header.php';
brojBodova();

  $ispisPodrucja= array();
    
       $sql = "SELECT  `ID_podrucja_interesa` , p.Naziv, p.URLSlike FROM `odabrana_podrucja_interesa` op LEFT JOIN podrucja_interesa p ON p.ID_podrucja = op.`ID_podrucja_interesa` WHERE `ID_korisnika` = :ID ";


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

$smarty->assign('ispisPodrucja',  $ispisPodrucja);

if (!empty($_GET['IDpodrucja'])) {
    
      $ispisKupona= array();
    
       $sql = "SELECT * FROM `kuponi_podrucja` kp LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = kp.`ID_podrucja`  LEFT JOIN kuponi_clanstva kc ON kc.ID_kupona = kp.`ID_kupona`  wHERE kp.`ID_podrucja` = :IDpodrucja and Datum_zavrsetka > :Datum;";


    try {
        
         $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':IDpodrucja', $_GET['IDpodrucja'], PDO::PARAM_INT);
         $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        array_push($ispisKupona, $row);
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }

$smarty->assign('ispisKupona',  $ispisKupona);
    
    
}
else if(!empty ($ispisPodrucja[0]['ID_podrucja_interesa'])){
    
      $ispisKupona= array();
    
       $sql = "SELECT * FROM `kuponi_podrucja` kp LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = kp.`ID_podrucja`  LEFT JOIN kuponi_clanstva kc ON kc.ID_kupona = kp.`ID_kupona`  wHERE kp.`ID_podrucja` = :IDpodrucja and Datum_zavrsetka > :Datum;";


    try {
        
         $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':IDpodrucja', $ispisPodrucja[0]['ID_podrucja_interesa'], PDO::PARAM_INT);
         $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        array_push($ispisKupona, $row);
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }

$smarty->assign('ispisKupona',  $ispisKupona);
     
    
}






$smarty->display('predlosci/pregledKupona.tpl');
include_once 'footer.php';?>
        
