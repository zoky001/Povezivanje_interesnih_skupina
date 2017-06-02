<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../commonClass/baza.class.php';
$veza = new Baza();


$veza->spojiDB();
   
    $rezultat = $veza->selectDB("SELECT  `pomakVremena` FROM `postavke` WHERE `ID_postavke` = 1");

$veza->zatvoriDB();




$outp = "";
    foreach ($rezultat as $value) {
      
       $sec =  $value["pomakVremena"] *60*60*1000;
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Pomak":"'  .$sec. '"}';
  
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);
?>