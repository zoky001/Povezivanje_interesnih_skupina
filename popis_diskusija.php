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
        
        
<?php $naslov = "Popis diskusija";
include_once 'header.php';


if (!empty($_GET['IDpodrucja'])) {
    
    
    
    
    
    
    
    
  $ispis= array();
    
      

$sql = "SELECT d.`ID_diskusije` as ID_diskusije, d.`Naziv` as Naziv, p.`Naziv` as NazivPodrucja from diskusije d  LEFT JOIN podrucja_interesa p ON p.ID_podrucja = d.`ID_podrucja_interesa`
WHERE  `ID_podrucja_interesa` =:ID and `Datum_zavrsetka` >  :danas";
    try {
        $stmt = $dbc->prepare($sql);
        
        $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
        
        
        $stmt->bindParam(':danas', $vrijeme, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $_GET['IDpodrucja'], PDO::PARAM_INT);
        
        
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }

$smarty->assign('ispis',  $ispis);




$sql = "SELECT  `Naziv` FROM `podrucja_interesa` WHERE `ID_podrucja` = :ID";
    try {
        $stmt = $dbc->prepare($sql);
        
      
        $stmt->bindParam(':ID', $_GET['IDpodrucja'], PDO::PARAM_INT);
        
        
        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        $nazivPodrucja = $row['Naziv'];
    }
        
$smarty->assign('NazivPodrucja',  $nazivPodrucja);


        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
    
    
}








$smarty->display('predlosci/popisDiskusija.tpl');


include_once 'footer.php';?>