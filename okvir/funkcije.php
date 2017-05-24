<?php
function zaradiBodove($korisnik,$aktivnost, $bodovi){
    global $dbc;
$vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
$sql = "INSERT INTO  `WebDiP2016x052`.`promet_bodova` (
`ID_prometa` ,
`Datum` ,
`ID_aktivnosti` ,
`ID_korisnika` ,
`ID_kupona` ,
`Vrsta_prometa` ,
`Kolicina_bodova`
)
VALUES (
NULL ,  :datum,  :IDaktivnost,  :IDkorisnika, NULL ,  'Zarada',  :bodovi
);
";
    try {
        
        
        $stmt = $dbc->prepare($sql);
        
       // echo "<br>$aktivnost<br><br>$korisnik<br><br>$vrijeme<br><br>$bodovi<br>";
 $stmt->bindParam(':IDaktivnost', $aktivnost, PDO::PARAM_INT);
        $stmt->bindParam(':IDkorisnika', $korisnik, PDO::PARAM_INT);
      $stmt->bindParam(':datum', $vrijeme, PDO::PARAM_STR);
        $stmt->bindParam(':bodovi', $bodovi, PDO::PARAM_INT);
       
        
       // echo '<br>Usjeh.'. 
       $stmt->execute();



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
   
}

function vratiIDpodrucja($ID){
    global $dbc;
    
    $sql = "SELECT  `ID_podrucja_interesa` as 'ID' 
FROM `diskusije` 
WHERE `ID_diskusije` = :ID";
  // $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
     
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':ID',$ID, PDO::PARAM_INT);
   $uspjeh = $stmt->execute();
    //echo '<br><br><br><br><br><BR><br><br>uspjeh'.$uspjeh;
    $row = $stmt->fetch();
    return $row['ID'];
    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}
    
}
function dizajn($ID){
     global $dbc;
     global $smarty;

     
    $sql = "SELECT * 
FROM  `dizajn` 
WHERE  `podrucja_interesa_ID_podrucja` = :ID";
  // $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
     
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':ID',$ID, PDO::PARAM_INT);
   $uspjeh = $stmt->execute();
    //echo '<br><br><br><br><br><BR><br><br>uspjeh'.$uspjeh;
$smarty -> assign('dizajnIF',$uspjeh);
    $row = $stmt->fetch();

    $smarty -> assign('body',$row['bojaPozadine']);
$smarty -> assign('slova',$row['bojaSlova']);
$smarty -> assign('pozSekcije',$row['bojaPozadineSekcije']);
$smarty -> assign('obrubSekcije',$row['bojaObrubaSekcije']);

    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}
    
    
}




function brojBodova(){
    global $dbc;
    global $smarty;

$broj = 0;


    //$sql = "SELECT sum(`Kolicina_bodova`) -(SELECT sum(`Kolicina_bodova`) as Suma FROM `promet_bodova` WHERE `ID_korisnika` = :IDkorisnika1 AND `Vrsta_prometa` = 'kupnja')as Suma FROM `promet_bodova` WHERE `ID_korisnika` = :IDkorisnika AND `Vrsta_prometa` = 'Zarada'";

$sql = "select IFNULL((SELECT sum(`Kolicina_bodova`) -(select IFNULL ((SELECT sum(`Kolicina_bodova`) as Suma FROM `promet_bodova` WHERE `ID_korisnika` = :IDkorisnika AND `Vrsta_prometa` = 'kupnja'), 0 ) as Suma)as Suma FROM `promet_bodova` WHERE `ID_korisnika` = :IDkorisnika AND `Vrsta_prometa` = 'Zarada'), 0) as Suma";
    try {
        
        
        $stmt = $dbc->prepare($sql);

        $stmt->bindParam(':IDkorisnika', korisnikID(), PDO::PARAM_INT);
      $stmt->bindParam(':IDkorisnika1', korisnikID(), PDO::PARAM_INT);
        $U = $stmt->execute();

        $U = $stmt->rowCount();

  
   while ($row = $stmt->fetch()) {
$broj = $row[0];
        
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
  //  echo"<br><br><br> broj: ".$broj."uspjeh: ".$U;

$smarty->assign('brojBodova',  $broj);
return $broj;
     
    
    
}
function podrucjeModeriranjaID(){
    global $dbc;
global $korisnik;

    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
  
    
   
    $sql = "SELECT * 
FROM  `moderatori_podrucja` mp
LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = mp.`ID_podrucja` 
WHERE  `ID_moderatora` = :IDmoderatora";
  // $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
     ; 
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':IDmoderatora', $korisnik->get_ID(), PDO::PARAM_STR);
    $stmt->execute();


    $row = $stmt->fetch();

    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

return $row['ID_podrucja'];
}

function podrucjeModeriranja(){
    global $dbc;
global $korisnik;

    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
  
    
   
    $sql = "SELECT * 
FROM  `moderatori_podrucja` mp
LEFT JOIN podrucja_interesa pi ON pi.ID_podrucja = mp.`ID_podrucja` 
WHERE  `ID_moderatora` = :IDmoderatora";
  // $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

try {
     ; 
    $stmt = $dbc->prepare($sql);
$stmt->bindParam(':IDmoderatora', $korisnik->get_ID(), PDO::PARAM_STR);
    $stmt->execute();


    $row = $stmt->fetch();

    




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

return $row['Naziv'];
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

