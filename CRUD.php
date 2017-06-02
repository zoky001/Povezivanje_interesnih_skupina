<?php
if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}

include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null || !provjeraUlogeBool(ADMINISTRATOR)) {

    header("Location: neprijavljeni.php");
}
dnevnik_zapis(9); //uspjesna autorizacija reg korisnika


$naslov = "CRUD - ADMINISTRATOR";
include_once 'header.php';
echo '<br><br><br><br><br>';
brisiAktivnosti();
brisiBlokiraneKorisnike();
brisiDiskusije();
brisiDnevnik();
brisiKomentar();
brisiKosarica();
brisikupljenikupon();
brisikuponClanstva();
brisiPodrucja();
brisikorisnika();
updateAktivnosti();

updateKorisnika();
function brisiAktivnosti(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='aktivnosti' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `aktivnosti` 
WHERE `ID_aktivnosti` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiBlokiraneKorisnike(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='blokiraniKorisnici' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `blokiraniKorisnici` 
WHERE `IDkorisnika` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiDiskusije(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='diskusije' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `diskusije` 
WHERE `ID_diskusije` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiDnevnik(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='dnevnikRada' && !empty($_GET['ID'])) {
        
        
$sql = "SELECT * FROM `dnevnik_rada` 
WHERE `ID_dnevnik_rada` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiKomentar(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='komentari' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `komentari` 
WHERE `ID_komentara` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiKosarica(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='kosarica' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `kosarica` 
WHERE `ID_stavke` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisikupljenikupon(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='kupljeniKuponi' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `kupljeni_kuponi`
 WHERE `ID_kupljlenoga` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
function brisiPodrucja(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='kuponiClanstva' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `kuponi_clanstva` 
WHERE `ID_kupona` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
brisikorisnika();
function brisikuponClanstva(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='podrucjainteresa' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `podrucja_interesa` 
WHERE `ID_podrucja` = :ID";
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}
/*treba sloziti*/


function brisikorisnika(){
    global $dbc;
    global $smarty;
    if (!empty($_GET['obrisi']) && $_GET['obrisi']=='korisnici' && !empty($_GET['ID'])) {
        
        
$sql = "DELETE FROM `korisnik`
WHERE `korisnik_id` = :ID";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
           
         $stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}


function updateKorisnika(){
    global $dbc;
    global $smarty;
    if (!empty($_POST['izmjenaKorisnika'])) {
        
        
$sql = "UPDATE `korisnik` 
SET
`ime`=:ime,
`prezime`=:prezime,
`korisnicko_ime`=:korime,
`email`=:email,
`lozinka`=:lozinka,
`lozinka_SHA`=:lozinka_SHA,
`tip_korisnika`=:tip_korisnika,
`verifikacijski_kod`=:verifikacijski_kod,
`verificirano`=:verificirano,
`broj_neuspjesnih_prijava`=:bnp,
`prijavaDvaKoraka`=:pdk,
`salt`=:salt,
`dvaKorakaKod`=:dkk,
`vrijemeRegistracije`= :VR,
`vrijemeSlanjaKoda`=:vsk,
`slika`=:slika

WHERE 
`korisnik_id`= :ID";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            
            //echo "<br><br><br><br><br><br>".$_POST['korisnicko_ime'];
         //   echo "<br><br><br><br><br><br>".$_POST['korisnik_id'];
            
  $stmt->bindParam(':korime', $_POST['korisnicko_ime'], PDO::PARAM_STR);
      
             $stmt->bindParam(':ime', $_POST['ime'], PDO::PARAM_STR);
       $stmt->bindParam(':prezime', $_POST['prezime'], PDO::PARAM_STR);
       $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
       $stmt->bindParam(':lozinka', $_POST['lozinka'], PDO::PARAM_STR);
       $stmt->bindParam(':lozinka_SHA', $_POST['lozinka_SHA'], PDO::PARAM_STR);
       $stmt->bindParam(':tip_korisnika', $_POST['tip_korisnika'], PDO::PARAM_STR);
       $stmt->bindParam(':verifikacijski_kod', $_POST['verifikacijski_kod'], PDO::PARAM_STR);
       $stmt->bindParam(':verificirano', $_POST['verificirano'], PDO::PARAM_STR);
       $stmt->bindParam(':bnp', $_POST['broj_neuspjesnih_prijava'], PDO::PARAM_STR);
        $stmt->bindParam(':pdk', $_POST['prijavaDvaKoraka'], PDO::PARAM_STR);
       
         $stmt->bindParam(':salt', $_POST['salt'], PDO::PARAM_STR);
        $stmt->bindParam(':dkk', $_POST['dvaKorakaKod'], PDO::PARAM_STR);
       $stmt->bindParam(':VR', $_POST['vrijemeRegistracije'], PDO::PARAM_STR);
         $stmt->bindParam(':vsk', $_POST['vrijemeSlanjaKoda'], PDO::PARAM_STR);
      
         
         $stmt->bindParam(':slika', $_POST['slika'], PDO::PARAM_STR);
         
            
            
            
         $stmt->bindParam(':ID', $_POST['korisnik_id'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}

function updateAktivnosti(){
    global $dbc;
    global $smarty;
    if (!empty($_POST['izmjenaAktivnosti'])) {
        
        
$sql = "UPDATE `aktivnosti` SET 

`Naziv_aktivnosti`=:naziv,
`Opis_aktivnosti`=:opis
 WHERE 
`ID_aktivnosti`= :ID";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            
            //echo "<br><br><br><br><br><br>".$_POST['korisnicko_ime'];
         //   echo "<br><br><br><br><br><br>".$_POST['korisnik_id'];
            
  
      
             $stmt->bindParam(':naziv', $_POST['naziv'], PDO::PARAM_STR);
       $stmt->bindParam(':opis', $_POST['opis'], PDO::PARAM_STR);
       
   
         $stmt->bindParam(':ID', $_POST['ID_aktivnosti'], PDO::PARAM_INT);
       
         
         if ($stmt->execute()) {
             dnevnik_zapis(38);
             $smarty->assign("uspjehBrisanje",true);
         }
         else{
             $smarty->assign("uspjehBrisanje",false);
         }
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
        
        
    }
 
}








$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 



    if (!empty($_GET['show']) && $_GET['show'] == 'aktivnosti' ){
     $smarty->assign('aktivnosti',  true);
       
    }
    elseif (!empty($_GET['show']) && $_GET['show'] == 'blokiraniKorisnici' ) {
         $smarty->assign('blokiraniKorisnici',  true);
          
     
}
    elseif (!empty($_GET['show']) && $_GET['show'] == 'diskusije' ) {
         $smarty->assign('diskusije',  true);
          
     
}
 elseif (!empty($_GET['show']) && $_GET['show'] == 'dizajn' ) {
         $smarty->assign('dizajn',  true);
          
     
}
 elseif (!empty($_GET['show']) && $_GET['show'] == 'dnevnik_rada' ) {
         $smarty->assign('dnevnik_rada',  true);
          
     
}
elseif (!empty($_GET['show']) && $_GET['show'] == 'komentari' ) {
         $smarty->assign('komentari',  true);
          
     
}
elseif (!empty($_GET['show']) && $_GET['show'] == 'kosarica' ) {
         $smarty->assign('kosarica',  true);
          
     
}
elseif (!empty($_GET['show']) && $_GET['show'] == 'kupljeni_kuponi' ) {
         $smarty->assign('kupljeniKuponi',  true);
          
     
}

elseif (!empty($_GET['show']) && $_GET['show'] == 'kuponi_clanstva' ) {
         $smarty->assign('kuponiClanstva',  true);
          
     
}
elseif (!empty($_GET['show']) && $_GET['show'] == 'podrucja_interesa' ) {
         $smarty->assign('podrucja_interesa',  true);
          
     
}
elseif (!empty($_GET['show']) && $_GET['show'] == 'korisnik' ) {
         $smarty->assign('korisnik',  true);
          
     
}



 else {
     $smarty->assign('Tema',  true);
}







   echo '<br><br><br>';
$smarty->display('predlosci/CRUD.tpl');
include_once 'footer.php';


?>