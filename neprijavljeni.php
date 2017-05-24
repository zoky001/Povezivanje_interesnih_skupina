<?php
if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}
?>

<?php 

include_once 'okvir/aplikacijskiOkvir.php';

if (provjeraPrijaveKorisnika() != null) {

    header("Location: podrucja_interesa.php");
}


dnevnik_zapis(11); // posjet neprijavljenog korisnika

 
    
    
$nazivCock = "UvjetiKoristenjaNeprijavljeni";

if (empty($_COOKIE[$nazivCock])) {
    
    $coockieNeVrijedi = true;

   // echo "coockie ne postoji <br>";
   if (isset($_POST['coockieAccept']) && $_POST['coockieAccept'] == 1 ) {
       
           $id = vrijeme_sustava();
    $vrijedi_do = $id + 259200; //259200 sec je 3 dana

    setcookie($nazivCock, $id, $vrijedi_do);
    dnevnik_zapis(17);//prihvaceni uvjeti
       $coockieNeVrijedi = false;
       
   }


    // print "<b>Cookie:</b> $nazivCock <b>vrijedi do:</b>". date("d.m.Y h:i:sa",$vrijedi_do)."\n";
}


    if (!empty($_COOKIE[$nazivCock])) {
        $coockieNeVrijedi = false;

        $id = $_COOKIE[$nazivCock];

        //print "<b>Cookie postoji :</b> $naziv=$id\n";
        //echo time();
        // echo "<br>Coockie je postavljen " . date("d.m.Y h:i:sa", $id)."<br>";
        $sada = vrijeme_sustava();
        $interval = $sada - $id;



      // echo "<br>sada je" . date("d.m.Y h:i:sa", $sada)."<br>";
        //echo "<br>Coockie je postavljen već  " . date("i:s", $interval)."<br>";
        // echo "interval. ". $interval;

        if ($interval < 259200) {

            //akoje proslo 5 minuta 300s
          

          $ostalo = 259200 - $interval; 
       
         // echo secondsToTime($ostalo);
        
        } 
        
        if ($interval > 259200) { // AKO JE PROSLO 3 DANA
            
             
   $coockieNeVrijedi = true;
         
   if (isset($_POST['coockieAccept']) && $_POST['coockieAccept'] == 1 ) {
       
           $id = vrijeme_sustava();
    $vrijedi_do = $id + 259200; //259200 sec je 3 dana

    setcookie($nazivCock, $id, $vrijedi_do);
    dnevnik_zapis(17);//prihvaceni uvjeti
    
       $coockieNeVrijedi = false;
       
       
       
   }
          
        
          
          
        }
        
        
        
    }
    
    
    $ispisPodrucja= array();
    
       $sql = "SELECT * FROM `podrucja_interesa` ";


    try {
        $stmt = $dbc->prepare($sql);


        $stmt->execute();

        

  
   while ($row = $stmt->fetch()) {

        array_push($ispisPodrucja, $row);
    }
        



        $stmt->closeCursor();
    } catch (PDOException $e) {
        trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
    }
    
    
    
    
    
 $smarty->assign('ispisPodrucja',  $ispisPodrucja);


    $smarty->assign('coockieNeVrijediIF',  $coockieNeVrijedi);

    if (isset($_GET['prijava']) && $_GET['prijava'] == '1') {
     $smarty->assign('otvoriPrijavu', TRUE);
}
    
    
    $smarty ->assign ('kor1','Obicna');
    $smarty ->assign ('loz1','ObicnA12');
    
        
          $smarty ->assign ('kor2','Admin');
    $smarty ->assign ('loz2','asAS12');
    
     $smarty ->assign ('kor3','Moderator');
    $smarty ->assign ('loz3','asAS12');
    
         
          $smarty ->assign ('kor4','DvaKoraka');
    $smarty ->assign ('loz4','DvaKoraka12');  

$smarty->display('predlosci/neprijavljeni.tpl');
include_once 'footer.php';?>
