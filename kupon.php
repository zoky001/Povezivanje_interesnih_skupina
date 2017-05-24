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


if (!empty($_GET['IDkupona']) && !empty($_GET['IDpodrucja']) ) {
    
    if(!empty($_GET['kupljen'])){
        
        if ($_GET['kupljen'] = 'true') {
            $smarty->assign('kupljen',  true);
        }
        
        
    }
    

      
    
       $sql = "SELECT * FROM `kuponi_podrucja` kp LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = kp.`ID_podrucja`  LEFT JOIN kuponi_clanstva kc ON kc.ID_kupona = kp.`ID_kupona`  wHERE kp.`ID_podrucja` = :IDpodrucja and Datum_zavrsetka > :Datum and kp.`ID_kupona` = :IDkupona";


    try {
        
         $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':IDpodrucja', $_GET['IDpodrucja'], PDO::PARAM_INT);
         $stmt->bindParam(':IDkupona', $_GET['IDkupona'], PDO::PARAM_INT);
         $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        $ispisKupona =$row;
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }

$smarty->assign('ispisKupona',  $ispisKupona);

}



$smarty->display('predlosci/kupon.tpl');
include_once 'footer.php';?>
        
