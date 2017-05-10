<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../commonClass/baza.class.php';
$veza = new Baza();


$veza->spojiDB();
   
    $rezultat = $veza->selectDB("SELECT `Naziv` FROM `diskusije`");

$veza->zatvoriDB();

$outp = "";
    foreach ($rezultat as $value) {
      
       
       // echo $value['Naziv'];
           // print_r($result);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Naziv":"'  . $value["Naziv"] . '"}';
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);
?>