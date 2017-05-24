<?php
if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}

include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null || !provjeraUlogeBool(MODERATOR)) {

    header("Location: neprijavljeni.php");
}
dnevnik_zapis(9); //uspjesna autorizacija reg korisnika
?>
<!-- Header neprijavljeni -->


<?php
$naslov = "Odabir kupona - MODERATOR";
include_once 'header.php';

if (!empty($_POST['spremiDizajn'])) {
    
    
$sql = "UPDATE `dizajn` 
SET 
`bojaPozadine`= :bPoz,
`bojaSlova`= :bSlova,
`bojaPozadineSekcije`=:bPozSek,
`bojaObrubaSekcije`= :boSec
WHERE 
`podrucja_interesa_ID_podrucja`=:IDpodrucja";


       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':bPoz', $_POST['bojaBody'], PDO::PARAM_STR);
            
            $stmt->bindParam(':bSlova', $_POST['bojaSlova'], PDO::PARAM_STR);
            
            $stmt->bindParam(':bPozSek', $_POST['bojaSekcije'], PDO::PARAM_STR);
            
            $stmt->bindParam(':boSec', $_POST['bojaObrubaSekcije'], PDO::PARAM_STR);
              $stmt->bindParam(':IDpodrucja', podrucjeModeriranjaID(), PDO::PARAM_INT);
      
              if ($stmt->execute()) {
                 // echo '<br><br><br><br>><br><br><br> uspjeh';
             $smarty -> assign('dizajnPromjenaIF',true);
                  
                  
              }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
    
    
    
}



echo '<br><br><br>';
$smarty->display('predlosci/dizajn.tpl');
include_once 'footer.php';
?>