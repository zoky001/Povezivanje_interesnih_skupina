<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';



if (!empty($_GET['promet'])) {
    
    
    //echo $od."<br>".$do."<br";
       $sql= "

SELECT  k.korisnik_id, k.korisnicko_ime, 


(SELECT IFNULL(sum(`Kolicina_bodova`) ,0) as suma
FROM `promet_bodova` 
WHERE `Vrsta_prometa` = :promet
AND
`ID_korisnika` = k.korisnik_id) as suma




 FROM `promet_bodova`  pb
LEFT JOIN korisnik k ON k.korisnik_id = pb.`ID_korisnika`
WHERE 1
GROUP BY k.ime";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}





$str = stranicenje();



$outp = "";

if(count($ispis)>0){
    foreach ($ispis  as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Korisnik":"'  . $value["korisnicko_ime"] . '",';
     $outp .= '"Bodova":"'. $value["suma"]     . '",';
   
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}else if (!empty($_GET['prometAktivnosti'])){
    
           $sql= "SELECT  a.Naziv_aktivnosti, 


(SELECT IFNULL(sum(`Kolicina_bodova`) ,0) as suma
FROM `promet_bodova` 
WHERE `Vrsta_prometa` =  :promet
AND
 ID_aktivnosti = a.ID_aktivnosti) as suma




 FROM `promet_bodova`  pb
LEFT JOIN aktivnosti a ON a.ID_aktivnosti = pb.ID_aktivnosti 
WHERE 1
GROUP BY a.Naziv_aktivnosti";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':promet', $_GET['prometAktivnosti'], PDO::PARAM_STR);
   
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}





$str = stranicenje();



$outp = "";
if(count($ispis) >0)
{
    foreach ($ispis  as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
     $outp .= '{"Aktivnost":"'  . $value["Naziv_aktivnosti"] . '",';
     $outp .= '"Bodova":"'. $value["suma"]     . '",';
   
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
            
        
    }
}else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if(!empty($_GET['aktivnost'])){
    
           $sql= "SELECT dr.`vrijeme`, dr.`adresa`, dr.`skripta`, ko.ime, ko.prezime, akt.Naziv_aktivnosti FROM `dnevnik_rada` dr
LEFT JOIN korisnik ko ON dr.`ID_korisnika` = ko.korisnik_id
LEFT JOIN aktivnosti akt ON akt.ID_aktivnosti = dr.`aktivnosti`
WHERE dr.`aktivnosti` = :akt
ORDER BY dr.`vrijeme`";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':akt', $_GET['aktivnost'], PDO::PARAM_INT);
   
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}





$str = stranicenje();



$outp = "";

if(count($ispis)>0){
    foreach ($ispis  as $value) {
   
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Vrijeme":"'  . $value["vrijeme"] . '",';
     $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
   $outp .= '"Adresa":"'. $value["adresa"]     . '",';
     $outp .= '"Skripta":"'. $value["skripta"]     . '",';
       $outp .= '"Ime":"'. $value["ime"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '",'; 
    $outp .= '"Prezime":"'. $value["prezime"]     . '"}';
   }
   
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else{
//$id = $_GET['id'];

   
    $sql= "SELECT dr.`vrijeme`, dr.`adresa`, dr.`skripta`, ko.ime, ko.prezime, akt.Naziv_aktivnosti FROM `dnevnik_rada` dr
LEFT JOIN korisnik ko ON dr.`ID_korisnika` = ko.korisnik_id
LEFT JOIN aktivnosti akt ON akt.ID_aktivnosti = dr.`aktivnosti`
ORDER BY dr.`vrijeme`";





$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':ID', $id, PDO::PARAM_INT);
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}







$str = stranicenje();

$outp = "";
    foreach ($ispis  as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Vrijeme":"'  . $value["vrijeme"] . '",';
     $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
   $outp .= '"Adresa":"'. $value["adresa"]     . '",';
     $outp .= '"Skripta":"'. $value["skripta"]     . '",';
       $outp .= '"Ime":"'. $value["ime"]     . '",';
        $outp .= '"Stranicenje":"'. $str    . '",'; 
    $outp .= '"Prezime":"'. $value["prezime"]     . '"}';
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);


              }
?>