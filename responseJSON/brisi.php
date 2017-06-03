<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../okvir/aplikacijskiOkvir.php';



if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'blokiraniKorisnici') {
    
    
    //echo $od."<br>".$do."<br";
      $sql= "SELECT * FROM `blokiraniKorisnici` WHERE 1";
       
       


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"IDkorisnika":"'  . $value["IDkorisnika"] . '",';
     $outp .= '"IDpodrucja":"'. $value["IDpodrucja"]     . '",';
    $outp .= '"Zabranio":"'. $value["Zabranio"]     . '",';
      $outp .= '"datumZabrane":"'. $value["datumZabrane"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);

    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'aktivnosti'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `aktivnosti` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_aktivnosti":"'  . $value["ID_aktivnosti"] . '",';
     $outp .= '"Naziv_aktivnosti":"'. $value["Naziv_aktivnosti"]     . '",';
    $outp .= '"Opis_aktivnosti":"'. $value["Opis_aktivnosti"]     . '",';
         $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'diskusije'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `diskusije` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_diskusije":"'  . $value["ID_diskusije"] . '",';
     $outp .= '"Naziv":"'. $value["Naziv"]     . '",';
    $outp .= '"Datum_pocetka":"'. $value["Datum_pocetka"]     . '",';
    $outp .= '"Datum_zavrsetka":"'. $value["Datum_zavrsetka"]     . '",';
       $outp .= '"Opis_pravila":"'. $value["Opis_pravila"]     . '",';
    $outp .= '"ID_moderatora":"'. $value["ID_moderatora"]     . '",';
      $outp .= '"ID_podrucja_interesa":"'. $value["ID_podrucja_interesa"]     . '",';
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}

else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'dizajn'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `dizajn` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"bojaPozadine":"'  . $value["bojaPozadine"] . '",';
     $outp .= '"bojaSlova":"'. $value["bojaSlova"]     . '",';
    $outp .= '"bojaPozadineSekcije":"'. $value["bojaPozadineSekcije"]     . '",';
    $outp .= '"bojaObrubaSekcije":"'. $value["bojaObrubaSekcije"]     . '",';
       $outp .= '"podrucja_interesa":"'. $value["podrucja_interesa_ID_podrucja"]     . '",';
   
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'dnevnikRada'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `dnevnik_rada` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_dnevnik_rada":"'  . $value["ID_dnevnik_rada"] . '",';
     $outp .= '"vrijeme":"'. $value["vrijeme"]     . '",';
    $outp .= '"aktivnosti":"'. $value["aktivnosti"]     . '",';
    $outp .= '"ID_korisnika":"'. $value["ID_korisnika"]     . '",';
       $outp .= '"adresa":"'. $value["adresa"]     . '",';
     $outp .= '"skripta":"'. $value["skripta"]     . '",';
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'komentari'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `komentari` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
    $stmt->execute();
$str = stranicenje();
//
// show object properties
//echo $herbie->model;

    while ($row = $stmt->fetch()) {
      //  $ar = object();"Stranicenje"=>$str;
        $row += array("Stranicenje" => $str);
        array_push($ispis, $row);
    }




    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}





if(count($ispis)>0){
    
 $myJSON = json_encode($ispis); 
} else {
       $row += array("Stranicenje" => $str);
        array_push($ispis, $row);
}

$outp ='{"records":'.$myJSON.'}';
echo $outp;

/*
$str = stranicenje();



$outp = "";

if(count($ispis)>0){
    foreach ($ispis  as $value) {
      
       
       // echo $value['Naziv'];
          //  print_r($value);
           // echo"<br>";
            
              if ($outp != "") {$outp .= ",";}
    $outp .= '{"ID_komentara":"'  . $value["ID_komentara"] . '",';
     $outp .= '"Tekst":"'. $value["Tekst"]     . '",';
    $outp .= '"Vrijeme":"'. $value["Vrijeme"]     . '",';
    $outp .= '"ID_diskusije":"'. $value["ID_diskusije"]     . '",';
       $outp .= '"ID_korisnika":"'. $value["ID_korisnika"]     . '",';
  
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    */
   
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'kosarica'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `kosarica` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_stavke":"'  . $value["ID_stavke"] . '",';
     $outp .= '"Vrijeme":"'. $value["Vrijeme"]     . '",';
    $outp .= '"ID_kupona":"'. $value["ID_kupona"]     . '",';
    $outp .= '"ID_korisnika":"'. $value["ID_korisnika"]     . '",';
       $outp .= '"ID_podrucja":"'. $value["ID_podrucja"]     . '",';
   $outp .= '"Potvrda_kupovine":"'. $value["Potvrda_kupovine"]     . '",';
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'kupljeniKuponi'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `kupljeni_kuponi` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_kupljenoga":"'  . $value["ID_kupljlenoga"] . '",';
     $outp .= '"Generirai_kod":"'. $value["Generirani_kod"]     . '",';
    $outp .= '"ID_kupona":"'. $value["ID_kupona"]     . '",';
    $outp .= '"ID_korisnika":"'. $value["ID_korisnika"]     . '",';
       $outp .= '"Datum_kupnje":"'. $value["Datum_kupnje"]     . '",';
   $outp .= '"Iznos":"'. $value["Iznos"]     . '",';
     $outp .= '"ID_podrucja":"'. $value["ID_podrucja"]     . '",';
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'kuponiClanstva'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `kuponi_clanstva` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"Naziv_kupona":"'  . $value["Naziv_kupona"] . '",';
     $outp .= '"Opis_kupona":"'. $value["Opis_kupona"]     . '",';
    $outp .= '"ID_kupona":"'. $value["ID_kupona"]     . '",';
    $outp .= '"Slika":"'. $value["Slika"]     . '",';
       $outp .= '"PDF":"'. $value["PDF"]     . '",';
   $outp .= '"Video":"'. $value["Video"]     . '",';
  
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'podrucjaInteresa'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `podrucja_interesa` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"ID_podrucja":"'  . $value["ID_podrucja"] . '",';
     $outp .= '"Naziv":"'. $value["Naziv"]     . '",';
    $outp .= '"Opis_podrucja":"'. $value["Opis_podrucja"]     . '",';
    $outp .= '"URLSlike":"'. $value["URLSlike"]     . '",';
     
  
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
else if (!empty($_GET['dohvati']) && $_GET['dohvati'] == 'korisnici'){
    
     
    
    //echo $od."<br>".$do."<br";
       
       
       $sql= "SELECT * FROM `korisnik` WHERE 1";


$ispis = array();



try {
    $stmt = $dbc->prepare($sql);
  //$stmt->bindParam(':promet', $_GET['promet'], PDO::PARAM_STR);
   
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
    $outp .= '{"korisnik_id":"'  . $value["korisnik_id"] . '",';
     $outp .= '"ime":"'. $value["ime"]     . '",';
    $outp .= '"prezime":"'. $value["prezime"]     . '",';
    $outp .= '"korisnicko_ime":"'. $value["korisnicko_ime"]     . '",';
     
    $outp .= '"email":"'. $value["email"]     . '",';
    $outp .= '"lozinka":"'. $value["lozinka"]     . '",';
    $outp .= '"lozinka_SHA":"'. $value["lozinka_SHA"]     . '",';
    $outp .= '"tip_korisnika":"'. $value["tip_korisnika"]     . '",';
  $outp .= '"verifikacijski_kod":"'. $value["verifikacijski_kod"]     . '",';
 
  $outp .= '"verificirano":"'. $value["verificirano"]     . '",';
  $outp .= '"broj_neuspjesnih_prijava":"'. $value["broj_neuspjesnih_prijava"]     . '",';
  $outp .= '"prijavaDvaKoraka":"'. $value["prijavaDvaKoraka"]     . '",';
  $outp .= '"salt":"'. $value["salt"]     . '",';
  $outp .= '"dvaKorakaKod":"'. $value["dvaKorakaKod"]     . '",';
  
  
   $outp .= '"vrijemeRegistracije":"'. $value["vrijemeRegistracije"]     . '",';
  $outp .= '"vrijemeSlanjaKoda":"'. $value["vrijemeSlanjaKoda"]     . '",';
  $outp .= '"slika":"'. $value["slika"]     . '",';
 
  
  
  
    $outp .= '"Stranicenje":"'. $str    . '"}'; 
   
            
        
    }
} else {
      $outp .= '{"Stranicenje":"'. $str    . '"}'; 
}
    




$outp ='{"records":['.$outp.']}';


echo($outp);


    
    
}
?>