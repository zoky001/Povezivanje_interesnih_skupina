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
        
        
<?php $naslov = "Pretplatnici - MODERATOR";
include_once 'header.php';
blokiraj();
odblokiraj();




if (!empty($_POST['obavjest']) && !empty($_POST['Odabir'])) {
    
   

foreach ($_POST['Odabir'] as  $value) {
        $mail_to =$value;
    $mail_from = "From: Moderator_podrucja-".podrucjeModeriranja();
    $mail_subject = $_POST['naziv'];
    $mail_body = $_POST['tekstPoruke'];


    
if (mail($mail_to, $mail_subject, $mail_body, $mail_from)){
    
    dnevnik_zapis(28);
}

}


}

$ispisKorisnika = array();




   $sql = "SELECT ( SELECT EXISTS(
     SELECT * FROM `blokiraniKorisnici` where `IDkorisnika` = kor.`korisnik_id`   AND `IDpodrucja` = :ID) )as 'Blokiran', 
kor.`korisnik_id`,
kor.`ime`,kor.`prezime`,kor.`email`,opi.ID_podrucja_interesa
 FROM `korisnik` kor
LEFT JOIN `odabrana_podrucja_interesa` opi ON kor.`korisnik_id`  = opi.ID_korisnika
WHERE opi.ID_podrucja_interesa = :ID";

try {
    $stmt = $dbc->prepare($sql);
    
   //  $stmt->bindParam(':IDpodrucja', $opis, PDO::PARAM_STR);
  $stmt->bindParam(':ID', podrucjeModeriranjaID(), PDO::PARAM_INT);

   // echo"<br><br><br><br><br>uspjeh:".
   $stmt->execute();
   // echo '<br>broj: '.$stmt->rowcount();

    while ($row = $stmt->fetch()) {

        array_push($ispisKorisnika, $row);
    }
  //  print_r($ispisKorisnika);
//echo '<br> '. podrucjeModeriranjaID();

$smarty->assign('korisnici',$ispisKorisnika);

    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}




function blokiraj(){
    global $dbc;
      
    if (!empty($_GET['IDkorisnika']) && $_GET['aktivnost'] == 'blokiraj') {
        //echo '<br><br><br><br>empti';
        
$sql = "INSERT INTO `blokiraniKorisnici`(`IDkorisnika`, `IDpodrucja`, `Zabranio`, `datumZabrane`) 
VALUES
(:IDkorisnika,:IDpodrucja,:IDmod,:Datum)";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDkorisnika', $_GET['IDkorisnika'], PDO::PARAM_INT);
                 $stmt->bindParam(':IDpodrucja', podrucjeModeriranjaID(), PDO::PARAM_INT);
                 
                 $stmt->bindParam(':IDmod', korisnikID(), PDO::PARAM_INT);
            
            $stmt->bindParam(':Datum', $vrijeme, PDO::PARAM_STR);
            
        
             //   echo '<br><br><br><br>empti'.
             if($stmt->execute()){
                 
                 dnevnik_zapis(26);//blokiran korisnik
                 
             }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
        
        
        
        
    }

    
    
    
}

function odblokiraj(){
    global $dbc;
      
    if (!empty($_GET['IDkorisnika']) && $_GET['aktivnost'] == 'odblokiraj') {
        //echo '<br><br><br><br>empti';
        
$sql = "DELETE FROM `blokiraniKorisnici` 
WHERE 
`IDkorisnika` = :IDkorisnika
AND
`IDpodrucja` = :IDpodrucja";
     try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDkorisnika', $_GET['IDkorisnika'], PDO::PARAM_INT);
                 $stmt->bindParam(':IDpodrucja', podrucjeModeriranjaID(), PDO::PARAM_INT);
       
             //   echo '<br><br><br><br>empti'.
             if($stmt->execute()){
                 
                 dnevnik_zapis(27);//blokiran korisnik
                 
             }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
        
        
        
        
    }

    
    
    
}

        
        
           echo '<br><br><br>';
$smarty->display('predlosci/pretplatnici.tpl');
include_once 'footer.php';



?>