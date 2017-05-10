<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../commonClass/baza.class.php';
$veza = new Baza();

$id = $_GET['id'];
$veza->spojiDB();
   
    $rezultat = $veza->selectDB("SELECT * 
FROM  `diskusije` 
WHERE  `ID_podrucja_interesa` =".$id."
LIMIT 3");

$veza->zatvoriDB();

$outp = "";
    foreach ($rezultat as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Podrucje":"'  . $value["ID_podrucja_interesa"] . '",';
  
    $outp .= '"Naziv":"'. $value["Naziv"]     . '"}';
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);
?>