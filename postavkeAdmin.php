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


$naslov = "Postavke - ADMINISTRATOR";
include_once 'header.php';
echo '<br><br><br><br><br>';
postaviVrijeme();
postaviStranicenje();

$smarty->assign ('datum',date('d.m.Y.', vrijeme_sustava())); 
$smarty->assign ('vrijemeSustava',date('H:i:s', vrijeme_sustava())); 


function postaviVrijeme(){
    global $dbc;
    
      if (!empty($_GET['postavi']) && $_GET['postavi'] == 'vrijeme' ){
          //echo '<br><br><br><br><br><br>vrijeme';
          $json = file_get_contents('http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=xml');

          
        $obj = simplexml_load_string($json);  
         // $obj = json_decode($json);
//print_r($obj);

//echo $obj->vrijeme->pomak->brojSati;
          





$sql = "UPDATE `postavke` 
SET `pomakVremena`= :pomak
WHERE  `ID_postavke`= 1";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':pomak', $obj->vrijeme->pomak->brojSati, PDO::PARAM_STR);
         
            if ($stmt->execute()) {
                dnevnik_zapis(36);
            }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }




      }
    
    
}

function postaviStranicenje(){
    global $dbc;
    
      if (!empty($_POST['pohranaRedaka']) && !empty($_POST['brojRedaka']) ){
          //echo '<br><br><br><br><br><br>stranicenje';
        




$sql = "UPDATE `postavke` SET 
`stranicenje`= :broj
WHERE 
`ID_postavke`=1";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':broj', $_POST['brojRedaka'], PDO::PARAM_STR);
         
            if ($stmt->execute()) {
                dnevnik_zapis(37);
            }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }




      }
    
    
}

    if (!empty($_GET['show']) && $_GET['show'] == 'vrijeme' ){
     $smarty->assign('vrijeme',  true);
       
    }
    elseif (!empty($_GET['show']) && $_GET['show'] == 'stranicenje' ) {
        $smarty->assign('stranicenje',  true);
        
       
        
        

$sql = "SELECT  `stranicenje`FROM postavke
 WHERE `ID_postavke` = 1";
  

try {
    $stmt = $dbc->prepare($sql);

  // echo"<br><br><br><br><br>".
  $stmt->execute();


    $row = $stmt->fetch();

    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}



        
        
        
        
        
     $smarty->assign('brojPrikaza', $row['stranicenje'] );    
     
}

    elseif (!empty($_GET['show']) && $_GET['show'] == 'korisniku' ) {
        
        
        
        
        
$ispis = array();
$sql = "SELECT  `korisnik_id`, `ime`, `prezime`
FROM `korisnik` WHERE 1";
   $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
    $stmt = $dbc->prepare($sql);

  // echo"<br><br><br><br><br>".
  $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }


//print_r($ispis);
$smarty->assign('ispisSvihAktivnosti',  $ispis);

    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}



        
        
        
        
        
        
     $smarty->assign('korisnik',  true);
}
 else {
     $smarty->assign('Tema',  true);
}







   echo '<br><br><br>';
$smarty->display('predlosci/postavkeAdmin.tpl');
include_once 'footer.php';


?>