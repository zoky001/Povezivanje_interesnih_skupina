<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';


$id = $_GET['id'];

   
    $sql= "SELECT d.`ID_diskusije`,p.Naziv as \"nazivPodrucja\", d.`Naziv` as \"nazivDiskusije\", count(k.ID_komentara) as \"broj\" FROM `diskusije` d LEFT JOIN komentari k ON d.ID_diskusije  =k.ID_diskusije LEFT JOIN  podrucja_interesa p ON p.`ID_podrucja` = d.`ID_podrucja_interesa`  where  `ID_podrucja_interesa` = :ID group by  d.`ID_diskusije` order by broj desc limit 3";






$ispisdisk = array();



try {
    $stmt = $dbc->prepare($sql);
  $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisdisk, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}









$outp = "";
    foreach ($ispisdisk  as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"Podrucje":"'  . $value["nazivPodrucja"] . '",';
  
    $outp .= '"Naziv":"'. $value["nazivDiskusije"]     . '"}';
            
        
    }
    
    




$outp ='{"records":['.$outp.']}';


echo($outp);
?>