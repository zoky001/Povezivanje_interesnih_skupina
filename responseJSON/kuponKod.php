<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../commonClass/baza.class.php';
$veza = new Baza();

$id = $_GET['id'];
$veza->spojiDB();
   
    $rezultat = $veza->selectDB("SELECT Naziv_kupona,  Generirani_kod,  Datum_kupnje
FROM  `kupljeni_kuponi` kp
LEFT JOIN  `kuponi_clanstva` kc ON kp.`ID_kupona` = kc.`ID_kupona` 
WHERE kp.`ID_kupljlenoga` =".$id);

$veza->zatvoriDB();

$outp = "";
    foreach ($rezultat as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Kod":"'  . $value["Generirani_kod"] . '",';
    $outp .= '"Naziv":"'. $value["Naziv_kupona"]     . '",';
    $outp .= '"Datum":"'. $value["Datum_kupnje"]     . '"}';
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);
?>