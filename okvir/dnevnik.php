<?php



function dnevnik_zapis($aktivnost) {
    global $dbc;
    
    $korisnik1 = new Korisnik();
    
      
        
   //$korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika()->get_ID(): 999;
          
   if (Sesija::dajKorisnika()) {
       
      
       
        $korisnik1 = Sesija::dajKorisnika();
        
      
        
        $korisnik = $korisnik1->get_ID();
        
    
       
   }
   
   else{
    
       
       $korisnik = 999;
   }
    
   

  
    
  
  
  
   
   
   
    $adresa = $_SERVER["REMOTE_ADDR"];
    $skripta = $_SERVER["REQUEST_URI"];
    $preglednik = $_SERVER["HTTP_USER_AGENT"];
    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());
      
  

 $sql = "INSERT INTO `dnevnik_rada`(`ID_dnevnik_rada`, `vrijeme`, `aktivnosti`, `ID_korisnika`, `adresa`, `skripta`) VALUES (NULL, :vrijeme ,:aktivnost,:korisnik,:adresa,:skripta)";

     

        try {
            $stmt = $dbc->prepare($sql);

            $stmt->bindParam(':vrijeme', $vrijeme, PDO::PARAM_STR);

            $stmt->bindParam(':aktivnost', $aktivnost, PDO::PARAM_INT);
            
            $stmt->bindParam(':korisnik', $korisnik, PDO::PARAM_INT);
            $stmt->bindParam(':adresa', $adresa, PDO::PARAM_STR);
            $stmt->bindParam(':skripta', $skripta, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
               trigger_error("Problem kod upisa u bazu podataka!" . $e->getMessage(), E_USER_ERROR);
          
        }

 
}
?>
