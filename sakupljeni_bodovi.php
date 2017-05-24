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



$naslov = "Pregled kupona";
include_once 'header.php';
brojBodova();





      
    
       $sql = "SELECT * FROM `promet_bodova` pb LEFT JOIN aktivnosti a ON a.`ID_aktivnosti` = pb.`ID_aktivnosti` WHERE  ID_korisnika = :IDkorisnika order by Datum desc";


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

$smarty->assign('ispis',  $ispis);






$smarty->display('predlosci/sakupljanjeBodova.tpl');
include_once 'footer.php';


?>
        
