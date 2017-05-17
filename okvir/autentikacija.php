<?php
function autentikacija($user, $pass) {
    global $dbc;
    
    $result = -1;

    $sql = "SELECT * FROM `korisnik` WHERE `korisnicko_ime` = :username";
    

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);
        
            $stmt->execute();
            
              $broj = $stmt->rowCount();
            
               while ($row = $stmt->fetch()) {
                  $korisnikID = $row['korisnik_id'];
                   $prezime = $row['prezime'];
                   $ime= $row['ime'];
                   $lozinka = $row['lozinka_SHA'];
                   $email = $row['email'];
                   $vrsta = $row['tip_korisnika'];
                   $verificirano = $row['verificirano'];
                   $broj_ne_prijava = $row['broj_neuspjesnih_prijava'];
                   $dvakoraka = $row['prijavaDvaKoraka'];
                   $salt = $row['salt'];
                   $dvakorakaKod = $row['dvaKorakaKod'];
                   


               
            }
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            echo "greska";
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }

      


    $korisnik = new Korisnik();
    

    
 if ($broj == 1) {

        if ( $lozinka == (string) sha1($salt . '--' . $pass)) {
            
           
          
            $korisnik->set_podaci($user, $ime, $prezime, $lozinka, $vrsta, $email, $verificirano, $broj_ne_prijava, $dvakoraka, $dvakorakaKod, $korisnikID);
            print_r($korisnik);

            $result = 1;
        } else {
           
            $result = 0;
        }
    } else {
       
        $result = -1;
    }

    $korisnik->set_status($result);


   return $korisnik;
}
?>
