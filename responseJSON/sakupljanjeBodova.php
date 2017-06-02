<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';



if (!empty($_GET['ID']) && ($_GET['akcija'] == 'sve')) {
    
   $sql = "SELECT * FROM `promet_bodova` pb LEFT JOIN aktivnosti a ON a.`ID_aktivnosti` = pb.`ID_aktivnosti` WHERE  ID_korisnika = :ID order by Datum desc";

       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_STR);

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
    $outp .= '{"Vrijeme":"'  . $value["Datum"] . '",';
     $outp .= '"Akcija":"'. $value["Vrsta_prometa"]     . '",';
   $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
     $outp .= '"Opis":"'. $value["Opis_aktivnosti"]     . '",';
       $outp .= '"Broj":"'. $value["Kolicina_bodova"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 

            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}

else if (!empty($_GET['ID']) && !empty($_GET['akcija']) && $_GET['akcija'] == 'kupnja') {
    
   $sql = "SELECT * FROM `promet_bodova` pb LEFT JOIN aktivnosti a ON a.`ID_aktivnosti` = pb.`ID_aktivnosti` WHERE  ID_korisnika = :ID and pb.`Vrsta_prometa` = 'kupnja'  order by Datum desc";

       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_STR);

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
    $outp .= '{"Vrijeme":"'  . $value["Datum"] . '",';
     $outp .= '"Akcija":"'. $value["Vrsta_prometa"]     . '",';
   $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
     $outp .= '"Opis":"'. $value["Opis_aktivnosti"]     . '",';
       $outp .= '"Broj":"'. $value["Kolicina_bodova"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 

            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}
else if (!empty($_GET['ID']) && !empty($_GET['akcija']) && $_GET['akcija'] == 'zarada') {
    
   $sql = "SELECT * FROM `promet_bodova` pb LEFT JOIN aktivnosti a ON a.`ID_aktivnosti` = pb.`ID_aktivnosti` WHERE  ID_korisnika = :ID and pb.`Vrsta_prometa` = 'Zarada'  order by Datum desc";

       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_STR);

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
    $outp .= '{"Vrijeme":"'  . $value["Datum"] . '",';
     $outp .= '"Akcija":"'. $value["Vrsta_prometa"]     . '",';
   $outp .= '"Aktivnost":"'. $value["Naziv_aktivnosti"]     . '",';
     $outp .= '"Opis":"'. $value["Opis_aktivnosti"]     . '",';
       $outp .= '"Broj":"'. $value["Kolicina_bodova"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 

            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}
?>