<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';



if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'zakljucane' ) {
    
    
    //echo $od."<br>".$do."<br";
       $sql= "SELECT `korisnik_id`, `ime`,`prezime`
 FROM `korisnik` 
WHERE `broj_neuspjesnih_prijava` > 2
ORDER BY ime";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);

   
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
    $outp .= '{"Korisnik":"'  . $value["korisnik_id"] . '",';
     $outp .= '"Ime":"'. $value["ime"]     . '",';
    $outp .= '"Prezime":"'. $value["prezime"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'otkljucane'){
   
    
    //echo $od."<br>".$do."<br";
       $sql= "SELECT `korisnik_id`, `ime`,`prezime`
 FROM `korisnik` 
WHERE `broj_neuspjesnih_prijava` < 3
ORDER BY ime";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  
   
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
    $outp .= '{"Korisnik":"'  . $value["korisnik_id"] . '",';
     $outp .= '"Ime":"'. $value["ime"]     . '",';
    $outp .= '"Prezime":"'. $value["prezime"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
?>