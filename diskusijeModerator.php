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
        
        
<?php $naslov = "Diskusije - MODERATOR";
include_once 'header.php';
updateDiskusije();
novaDiskusija();
$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 












$sql = "SELECT * FROM `moderatori_podrucja` mp
LEFT JOIN  diskusije d ON mp.`ID_podrucja` = d.ID_podrucja_interesa
WHERE mp.`ID_moderatora` = :IDmoderatora";
   
$ispisTema = array();
try {
    $stmt = $dbc->prepare($sql);

    
     $stmt->bindParam(':IDmoderatora', korisnikID(), PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisTema, $row);
    }
    
    $smarty->assign('ispisTema',  $ispisTema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


     
    if (!empty($_GET['IDdiskusije'])) {
        
        $sql = "SELECT * FROM `diskusije` WHERE `ID_diskusije`  = :IDdiskusije";
   

try {
    $stmt = $dbc->prepare($sql);

    
     $stmt->bindParam(':IDdiskusije',$_GET['IDdiskusije'], PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    $tema = $stmt->fetch();

        
    
    
    $smarty->assign('Tema',  $tema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}
        
        
    }

function updateDiskusije(){
    global $dbc;
    if (!empty($_POST['izmjenaDiskusije'])) {
      //  echo '<br><br><br> unutar if>br>';
$sql = "UPDATE `diskusije` SET 
`Naziv`=:Naziv,
`Datum_pocetka`=:datPoc,
`Datum_zavrsetka`=:datKraj,
`Opis_pravila`=:Opis,
`ID_moderatora`=:IDmoderatora 
WHERE 
`ID_diskusije`=:IDdiskusije";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':Naziv', $_POST['naziv'], PDO::PARAM_STR);
            
            $stmt->bindParam(':Opis', $_POST['opis'], PDO::PARAM_STR);
            
            $stmt->bindParam(':datPoc', $_POST['danPoc'], PDO::PARAM_STR);
            
            $stmt->bindParam(':datKraj', $_POST['danKraj'], PDO::PARAM_STR);
             
        $stmt->bindParam(':IDmoderatora', korisnikID() , PDO::PARAM_INT);

         $stmt->bindParam(':IDdiskusije', $_POST['IDdiskusije'], PDO::PARAM_INT);
         if ($stmt->execute()) {
             dnevnik_zapis(24);
             //promjena diskusije
         } 
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        } 
        
        
        
        
    }
    
    
}
function novaDiskusija(){
    global $dbc;
    if (!empty($_POST['novaDiskusija'])) {
        //echo '<br><br><br> unutar if>br>';
$sql = "INSERT INTO `diskusije`
(`ID_diskusije`, `Naziv`, `Datum_pocetka`, `Datum_zavrsetka`, `Opis_pravila`, `ID_podrucja_interesa`, `ID_moderatora`) 
VALUES 
(null ,:Naziv,:datPoc,:datKraj,:Opis,:IDpodrucja,:IDmoderatora)";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':Naziv', $_POST['naziv'], PDO::PARAM_STR);
            
            $stmt->bindParam(':Opis', $_POST['opis'], PDO::PARAM_STR);
            
            $stmt->bindParam(':datPoc', $_POST['danPoc'], PDO::PARAM_STR);
            
            $stmt->bindParam(':datKraj', $_POST['danKraj'], PDO::PARAM_STR);
             
        $stmt->bindParam(':IDmoderatora', korisnikID() , PDO::PARAM_INT);

         $stmt->bindParam(':IDpodrucja', $_POST['IDPodrucja'], PDO::PARAM_INT);
         if ($stmt->execute()) {
            dnevnik_zapis(25);
             //nova diskusije
             
         } 
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        } 
        
        
        
        
    }
    
    
}









   echo '<br><br><br>';
$smarty->display('predlosci/diskusijeModerator.tpl');
include_once 'footer.php';?>