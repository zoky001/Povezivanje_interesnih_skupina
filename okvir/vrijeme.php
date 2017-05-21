<?php


function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}


function vrijeme_sustava(){
    
    
    global $dbc;
    
         $sql = "SELECT  `pomakVremena` FROM `postavke` WHERE `ID_postavke` = 1";
      
         
         try{
            $stmt = $dbc->prepare($sql);
        
            $stmt->execute();
            
            
               while ($row = $stmt->fetch()) {
                   
                   $pomak = $row['pomakVremena'];


               
            }
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        }
    
    
    $vrijeme_servera = time();
    $vrijeme_sustava = $vrijeme_servera + ($pomak * 60 * 60);
    
    
   //echo  date('Y-m-d H:i:s', $vrijeme_sustava);
   
   return $vrijeme_sustava;
            
}