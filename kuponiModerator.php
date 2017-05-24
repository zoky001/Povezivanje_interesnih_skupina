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

dodajKupon();
obrisiKupon();
brojAktivnih();
provjeraKoda();

/*ispis svih kupona*/

$ispisSvihKupona = array();
$sql = "SELECT * 
FROM  `kuponi_clanstva` ";

try {
    $stmt = $dbc->prepare($sql);

    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisSvihKupona, $row);
    }

$smarty -> assign('ispisSvihKupona',$ispisSvihKupona);


    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

/*ispis aktivnih kupona*/

$ispisAktivnihKupona = array();
$sql = "SELECT * FROM `kuponi_podrucja`  kp
LEFT JOIN kuponi_clanstva kc ON kp.`ID_kupona` = kc.ID_kupona
where
kp.`ID_podrucja` = :ID";

try {
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':ID', podrucjeModeriranjaID(), PDO::PARAM_INT);
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisAktivnihKupona, $row);
    }

$smarty -> assign('ispisAktivnihKupona',$ispisAktivnihKupona);


    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


function dodajKupon(){
    global $dbc;
    global $smarty;
    
    if (!empty($_GET['IDkupona']) && $_GET['aktivnost'] == 'dodaj') {
        $smarty -> assign('otvoriFormuKupona',true);
        
        $smarty -> assign('IDkupona',$_GET['IDkupona']);
    }
    if (!empty($_POST['dodajKupon'])) {
        
    //    echo '<br><br><br><br><br><br> broj: '.$_POST['kolBodova'];
      //  echo '<br><br><br> broj: '.$_POST['IDkupona'];
      //  echo '<br><br><br> broj: '.$_POST['danPocetka'];
       //  echo '<br><br><br> broj: '.$_POST['danKraj'];
         
         
$sql = "INSERT INTO `kuponi_podrucja`
(`ID_kupona`, `ID_podrucja`, `Min_broj_bodova`, `Datum_pocetka`, `Datum_zavrsetka`, `ID_moderatora`)
 VALUES
 (:IDkupona, :IDpodrucja, :bodova, :danPoc , :danKraj, :IDkorisnika)";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDkupona', $_POST['IDkupona'], PDO::PARAM_INT);
            
            $stmt->bindParam(':IDpodrucja', podrucjeModeriranjaID(), PDO::PARAM_INT);
            
            $stmt->bindParam(':bodova', $_POST['kolBodova'], PDO::PARAM_STR);
            
            $stmt->bindParam(':danPoc', $_POST['danPocetka'], PDO::PARAM_STR);
             
        $stmt->bindParam(':danKraj', $_POST['danKraj'], PDO::PARAM_STR);

         $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
       
         if ($stmt->execute()) {
            // echo '<br><br><br><br><br><br><br> uspjeh';
             dnevnik_zapis(29);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
         
    }
    
    
    
    
}
 function obrisiKupon(){
     global $dbc;
       //  echo '<br><br><br><br><br><br><br><br><br><br> broj:';
     if (!empty($_GET['IDkupona']) && $_GET['aktivnost']=='obrisiKupon') {
        // echo '<br><br><br><br><br><br><br><br><br><br> broj:';
$sql = "DELETE FROM `kuponi_podrucja` 
WHERE 
`ID_kupona` = :IDkupona
AND
`ID_podrucja` = :IDpodrucja";
    

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':IDkupona', $_GET['IDkupona'], PDO::PARAM_INT);
            
            $stmt->bindParam(':IDpodrucja', podrucjeModeriranjaID(), PDO::PARAM_INT);
            
     
            if ($stmt->execute()) {
                dnevnik_zapis(30);
            }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
         
         
     }
     
     
     
 }       
function brojAktivnih(){
    
    global $dbc;
    global $smarty;
    $sql = "SELECT  count(`ID_kupona`)  as 'Ukupno'
FROM `kuponi_podrucja` 
WHERE 
`ID_podrucja` = :ID";
  

try {
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':ID', podrucjeModeriranjaID(), PDO::PARAM_STR);
    $stmt->execute();


    $row = $stmt->fetch();

$broj = $row['Ukupno'];
$smarty -> assign('ukpKupona',$broj);


    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

    
    
    
    
}
function provjeraKoda(){
    global $dbc;
    global $smarty;
    if (!empty($_POST['provjeraKod'])) {
        
        //echo '<br><br><br><br><br><br>'.$_POST['kod'];
        
        
        $sql = "SELECT EXISTS(
     SELECT * FROM  kupljeni_kuponi 
where 
`Generirani_kod` =  :KOD ) as 'Vrjedi'";
 

try {
    $stmt = $dbc->prepare($sql);
    
 $stmt->bindParam(':KOD', $_POST['kod'], PDO::PARAM_STR);
   
 $stmt->execute();


    $row = $stmt->fetch();

       
    $valja = $row['Vrjedi'];




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

if ($valja) {
      $smarty -> assign('ispisUspjeha',true);
}
 else {
     $smarty -> assign('ispisGreske',true);

}

        
    }
    
    
}

echo '<br><br><br>';
$smarty->display('predlosci/kuponiModerator.tpl');
include_once 'footer.php';
?>