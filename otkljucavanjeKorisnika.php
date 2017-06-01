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


$naslov = "Otkljucavanje korisnika - ADMINISTRATOR";
include_once 'header.php';
echo '<br><br><br><br><br>';



$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 



  
    if (!empty($_GET['zakljucaj'])) {
        
        
        
   
$sql = "UPDATE `korisnik` SET
`broj_neuspjesnih_prijava`= 3

 WHERE  `korisnik_id`= :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
          
         $stmt->bindParam(':ID', $_GET['zakljucaj'], PDO::PARAM_INT);
        $stmt->execute();
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }



        
        
        
        
        
   
}
  else if (!empty($_GET['otkljucaj'])) {
        
        
        
   
$sql = "UPDATE `korisnik` SET
`broj_neuspjesnih_prijava`= 0

 WHERE  `korisnik_id`= :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
          
         $stmt->bindParam(':ID', $_GET['otkljucaj'], PDO::PARAM_INT);
        $stmt->execute();
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }



        
        
        
        
        
   
}







   echo '<br><br><br>';
$smarty->display('predlosci/otkljucavanjeAdmin.tpl');
include_once 'footer.php';


?>