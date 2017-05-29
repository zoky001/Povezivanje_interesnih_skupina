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

$ispisKupona ="";
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


$galerija = array();
/*ispis galerije*/
 $sql = "SELECT * FROM `slikeKuponi` 
WHERE `IDkupona` = :ID
ORDER BY`ID_slike` DESC
LIMIT 3";


    try {
        
      
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':ID', $_GET['IDkupona'], PDO::PARAM_INT);
        
        $stmt->execute();
  while ($row = $stmt->fetch()) {

        array_push($galerija, $row);
    }
        

  
   
        

        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
    
    

    
    
   
 $smarty->assign('galerija',  $galerija); 
/*kraj galerje*/ 
    
}
elseif (!empty ($_GET['IDkupona']) && empty($_GET['IDpodrucja'])) {
    //smo kupon
    echo '<br><br><br><br>';
    
           $sql = "SELECT * FROM `kuponi_clanstva` 
WHERE `ID_kupona` = :ID";


    try {
        
      
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':ID', $_GET['IDkupona'], PDO::PARAM_INT);
        
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        $ispisKupona =$row;
    }
        

        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
    
    

    
    
    $smarty->assign('kupljen',  true);
 $smarty->assign('ispisKupona',  $ispisKupona);  

$galerija = array();
/*ispis galerije*/
 $sql = "SELECT * FROM `slikeKuponi` 
WHERE `IDkupona` = :ID
ORDER BY`ID_slike` DESC
LIMIT 3";


    try {
        
      
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':ID', $_GET['IDkupona'], PDO::PARAM_INT);
        
        $stmt->execute();
  while ($row = $stmt->fetch()) {

        array_push($galerija, $row);
    }
        

  
   
        

        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
    
    

    
    
   
 $smarty->assign('galerija',  $galerija); 
/*kraj galerje*/ 
    
}
 else {
    header("Location: neprijavljeni.php");
}




$smarty->display('predlosci/kupon.tpl');
include_once 'footer.php';?>
        
