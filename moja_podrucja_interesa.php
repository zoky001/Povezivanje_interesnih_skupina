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
        
        
<?php $naslov = "Moja podrucja interesa";
include_once 'header.php';


dodajPodrucje();
//korisnik dodaje novo podrucje interesa


//echo korisnikID();


  $ispisPodrucja= array();
    
       //$sql = "SELECT  `ID_podrucja_interesa` , p.Naziv, p.URLSlike FROM `odabrana_podrucja_interesa` op LEFT JOIN podrucja_interesa p ON p.ID_podrucja = op.`ID_podrucja_interesa` WHERE `ID_korisnika` = :ID ";

$sql="SELECT  `ID_podrucja_interesa` , p.Naziv, p.URLSlike FROM `odabrana_podrucja_interesa` op LEFT JOIN podrucja_interesa p ON p.ID_podrucja = op.`ID_podrucja_interesa`
 WHERE `ID_korisnika` = :ID
AND
!(SELECT EXISTS(
     SELECT * FROM `blokiraniKorisnici` where `IDkorisnika` = :ID AND `IDpodrucja` = op.`ID_podrucja_interesa`))";
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











$smarty->display('predlosci/moja_podrucja_interesa.tpl');

function dodajPodrucje(){
    global $dbc;
    if (!empty($_GET['add']) && !empty($_GET['IDpodrucja'])) {
   
    
    
$sql = "INSERT INTO `odabrana_podrucja_interesa`(`ID_korisnika`, `ID_podrucja_interesa`) VALUES (:IDkorisnika,:IDpodrucja)";
  //  $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':IDpodrucja', $_GET['IDpodrucja'], PDO::PARAM_INT);
         $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
        
            
             
           
       // echo '<br><br><br><br>'.$_GET['add']."<br>".$_GET['IDpodrucja']."<br>". $stmt->execute();
       if ($stmt->execute()) {
            dnevnik_zapis(18);
   
            zaradiBodove(korisnikID(),18,30);
        
       }
       
        
        //dodano podrucje aktivnosti
        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
    
    
    
}
    
    
}
include_once 'footer.php';?>