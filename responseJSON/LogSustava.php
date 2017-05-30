<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';



if (!empty($_GET['od']) && !empty($_GET['do'])) {
    
    $od = date('Y-m-d H:i:s',$_GET['od']/1000 );
    $do = date('Y-m-d H:i:s',$_GET['do']/1000 );
    //echo $od."<br>".$do."<br";
       $sql= "SELECT dr.`vrijeme`, dr.`adresa`, dr.`skripta`, ko.ime, ko.prezime, akt.Naziv_aktivnosti FROM `dnevnik_rada` dr
LEFT JOIN korisnik ko ON dr.`ID_korisnika` = ko.korisnik_id
LEFT JOIN aktivnosti akt ON akt.ID_aktivnosti = dr.`aktivnosti`
WHERE dr.vrijeme > :OD AND dr.vrijeme < :DO
ORDER BY dr.`vrijeme`";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':OD', $od, PDO::PARAM_STR);
   $stmt->bindParam(':DO', $do, PDO::PARAM_STR);
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

    
}else if(!empty($_GET['korisnik'])){
    
           $sql= "SELECT dr.`vrijeme`, dr.`adresa`, dr.`skripta`, ko.ime, ko.prezime, akt.Naziv_aktivnosti FROM `dnevnik_rada` dr
LEFT JOIN korisnik ko ON dr.`ID_korisnika` = ko.korisnik_id
LEFT JOIN aktivnosti akt ON akt.ID_aktivnosti = dr.`aktivnosti`
WHERE dr.`ID_korisnika` = :ID
ORDER BY dr.`vrijeme`";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', $_GET['korisnik'], PDO::PARAM_INT);
   
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
    $outp .= '{"Vrijeme":"'  . $value["vrijeme"] . '",';
     $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
   $outp .= '"Adresa":"'. $value["adresa"]     . '",';
     $outp .= '"Skripta":"'. $value["skripta"]     . '",';
       $outp .= '"Ime":"'. $value["ime"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '",'; 
    $outp .= '"Prezime":"'. $value["prezime"]     . '"}';
            
        
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