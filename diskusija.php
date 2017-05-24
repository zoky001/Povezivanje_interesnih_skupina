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
zaradiBodove(korisnikID(),31, 1);
?>
        <!-- Header neprijavljeni -->
        
        
<?php 
if (!empty($_GET['IDdiskusije'])) {
  //  echo '<br><br><br><br><br><BR><br><br>emptiy';
  dizajn(vratiIDpodrucja($_GET['IDdiskusije']));  
}


$naslov = "Diskusija";
include_once 'header.php';




if (!empty($_GET['IDdiskusije'])) {
     noviKomentar();
    
    
    
    
    
    $sql = "SELECT * FROM `diskusije` d LEFT JOIN korisnik k  ON d.`ID_moderatora` = k.korisnik_id WHERE `ID_diskusije` = :ID";


try {
    $stmt = $dbc->prepare($sql);
 $stmt->bindParam(':ID', $_GET['IDdiskusije'], PDO::PARAM_INT);
    $stmt->execute();


   $row = $stmt->fetch();
   $smarty->assign('Diskusija',  $row);

        
    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}



$sql = "SELECT * FROM `komentari` ko LEFT JOIN korisnik k  ON ko.`ID_korisnika` = k.korisnik_id  WHERE `ID_diskusije` =  :ID order by `Vrijeme`";
$ispisKomentara = array();

try {
    $stmt = $dbc->prepare($sql);
 $stmt->bindParam(':ID', $_GET['IDdiskusije'], PDO::PARAM_INT);
    $stmt->execute();



 
   while ($row = $stmt->fetch()) {

        array_push($ispisKomentara, $row);
    }

        $smarty->assign('ispisKomentara', $ispisKomentara);
    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}






   $smarty->assign('pravoKomentiranjaIF', pravoKomentiranja());  
}


function pravoKomentiranja(){
    global $dbc;
    $pravo = false;
    
    $sql = "SELECT * FROM `diskusije` d LEFT JOIN odabrana_podrucja_interesa op ON d.`ID_podrucja_interesa`  = op.ID_podrucja_interesa  where op.ID_korisnika = :IDkorisnika and d.`ID_diskusije` = :IDdiskusije";
$ispisKomentara = array();

try {
    $stmt = $dbc->prepare($sql);
 $stmt->bindParam(':IDdiskusije', $_GET['IDdiskusije'], PDO::PARAM_INT);
 $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
    $stmt->execute();
    
    $count = $stmt->rowCount();


    if ($count > 0) {
        
        $pravo = true;
    }
 
   

        
    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

return $pravo;

}

function noviKomentar(){
    global $dbc;
    if (!empty($_POST['submit']) && !empty($_POST['komentar'])) {
    
    $sql="INSERT INTO `komentari`(`ID_komentara`, `Tekst`, `Vrijeme`, `ID_diskusije`, `ID_korisnika`) VALUES (null,:tekst,:vrijeme,:IDdiskusije,:IDkorisnika)";
    
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
    
       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':tekst', $_POST['komentar'], PDO::PARAM_STR);
            
            $stmt->bindParam(':IDdiskusije', $_GET['IDdiskusije'], PDO::PARAM_INT);
            
            $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
            
            $stmt->bindParam(':vrijeme', $vrijeme, PDO::PARAM_STR);
             
    
        if($stmt->execute()){
            
            //echo '<br> <br> komentar je uspjesan';
            zaradiBodove(korisnikID(),1,20);
        }
            
             
           

        dnevnik_zapis(1);
        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
    
    
    
}
    
    
}



$smarty->display('predlosci/diskusija.tpl');


include_once 'footer.php';?>