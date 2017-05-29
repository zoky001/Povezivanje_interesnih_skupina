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
?>
        <!-- Header neprijavljeni -->
        
        
<?php $naslov = "Područja interesa - ADMINISTRATOR";
include_once 'header.php';
updatePodrucja();
novoPodrucje();

$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 

echo '<br><br><br><br><br>';

//sviKorisnici();








$sql = "SELECT * FROM `podrucja_interesa`
WHERE 1";
   
$ispisTema = array();
try {
    $stmt = $dbc->prepare($sql);

    
     //$stmt->bindParam(':IDmoderatora', korisnikID(), PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisTema, $row);
    }
    
    $smarty->assign('ispisTema',  $ispisTema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


     
    if (!empty($_GET['IDpodrucja'])) {
        sviKorisnici($_GET['IDpodrucja']);
        $sql = "SELECT * FROM `podrucja_interesa`
WHERE `ID_podrucja` = :ID";
   

try {
    $stmt = $dbc->prepare($sql);

    
     $stmt->bindParam(':ID',$_GET['IDpodrucja'], PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    $tema = $stmt->fetch();

        
    
    
    $smarty->assign('Tema',  $tema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


 $sql = "SELECT `ID_moderatora`
 FROM `moderatori_podrucja` 
WHERE `ID_podrucja` = :ID";
   

try {
    $stmt = $dbc->prepare($sql);

    
     $stmt->bindParam(':ID',$_GET['IDpodrucja'], PDO::PARAM_INT);
     
     
     if ($stmt->execute()) {
         $IDmod = $stmt->fetch();
          $smarty->assign('IDmod',  $IDmod);
     }
   


    

        
    
  
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}
        
        
    }

function updatePodrucja(){
    global $dbc;
    if (!empty($_POST['izmjenaPodrucja'])) {
      //  echo '<br><br><br> unutar if>br>';
$sql = "UPDATE `podrucja_interesa` SET 
`Naziv`= :Naziv,
`Opis_podrucja`= :Opis,
`URLSlike`=:Slika1 
WHERE 
`ID_podrucja`= :IDpodrucja;


DELETE FROM `moderatori_podrucja` 
WHERE `ID_podrucja` = :IDpodrucja;

INSERT INTO `moderatori_podrucja`
(`ID_moderatora`, `ID_podrucja`, `prava_dodjelio`)
 VALUES 
(:ID_moderatora, :IDpodrucja,  :ID);

UPDATE `korisnik` SET
`tip_korisnika`= 3
 WHERE `korisnik_id` = :IDstari;
 
UPDATE `korisnik` SET
`tip_korisnika`= 2
 WHERE `korisnik_id` = :ID_moderatora;


";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
             $stmt->bindParam(':ID_moderatora', $_POST['IDmoderatora'], PDO::PARAM_INT);
             $stmt->bindParam(':ID', korisnikID(), PDO::PARAM_INT);
            $stmt->bindParam(':IDstari', $_POST['IDstari'], PDO::PARAM_INT);
           
           
          // echo"<br><br><br><br><br>"
         //  . "<br><br><br><br><br>".$_POST['naziv']."<br>".$_POST['Slika1']."<br>".$_POST['opis']."<br>".$_POST['ID_podrucja'];
            
           
           /*
upload
                  */
           
           	$uploadOk = 0;	
                
               // echo '<br><br><br><br><br><br><br><br> psotoji1111111';
                 if (!empty($_FILES["fileToUpload"]["name"])) {
                     
                		// echo '<br><br><br><br><br><br><br><br> psotoji';
			$target_dir = "/var/www/WebDiP/2016_projekti/WebDiP2016x052/slike/podrucjeInteresa/";
			$target_dir1 = "https://barka.foi.hr/WebDiP/2016_projekti/WebDiP2016x052/slike/podrucjeInteresa/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file1 = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if ($target_file1 == $target_dir1 )
{/*
$target_file = $target_dir."room.png";
$target_file1 = $target_dir1."room.png";
	
*/
	
	
}

else {


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
		
		
        $uploadOk = 0;
    }




	
	

// Check if file already exists 

$i = 1;
while (file_exists($target_file)) {
    $target_file1 =$target_dir1 .$i.  basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir .$i. basename($_FILES["fileToUpload"]["name"]);
	$i++;
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}



	 }	

           
           
           /*upload*/
           
           
           //echo '<br><br><br><br><br><br><br><br>'.$target_file1;
           
           
          
            $stmt->bindParam(':Naziv', $_POST['naziv'], PDO::PARAM_STR);
            
            if ($uploadOk) {
      $stmt->bindParam(':Slika1', $target_file1, PDO::PARAM_STR);
}
else{
    
    $stmt->bindParam(':Slika1', $_POST['Slika1'], PDO::PARAM_STR);
}
          
 
 $stmt->bindParam(':Opis', $_POST['opis'], PDO::PARAM_STR);
         $stmt->bindParam(':IDpodrucja', $_POST['ID_podrucja'], PDO::PARAM_INT);
         if ( $uspjeh = $stmt->execute()) {
             
             
             //promjena podrucja
         } 
            
             
           


        
            $stmt->closeCursor();
            
            if ($uspjeh) {
                 dnevnik_zapis(32);
            }
           
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        } 
        
        
        
        
    }
    
    
}
function sviKorisnici($ID){
    global $dbc;
    global $smarty;




    $ispisKorisnika = array();
$sql = "SELECT  `korisnik_id` ,  `ime` ,  `prezime` 
FROM  `korisnik` 
WHERE  `tip_korisnika` = 3 
UNION
SELECT  k.`korisnik_id` ,  k.`ime` ,  k.`prezime` 
FROM  `korisnik`  k
LEFT JOIN `moderatori_podrucja` mp
ON mp.`ID_moderatora` = k.`korisnik_id`
WHERE  mp.`ID_podrucja` = :ID";


try {
    $stmt = $dbc->prepare($sql);

    $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
    
    $stmt->execute();


    while ($row = $stmt->fetch()) {

        array_push($ispisKorisnika, $row);
    }
$smarty -> assign('ispisSvihKorisnika',$ispisKorisnika);



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}


    
    
    
}


function novoPodrucje(){
    global $dbc;
    if (!empty($_POST['novoPodrucje']) && !empty($_POST['naziv']) && !empty($_POST['opis'])) {
       // echo '<br><br><br> unutar if>br>';
$sql = "INSERT INTO `podrucja_interesa`
( `Naziv`, `Opis_podrucja`) 
VALUES
 (:Naziv, :Opis)
";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':Naziv', $_POST['naziv'], PDO::PARAM_STR);
            
            $stmt->bindParam(':Opis', $_POST['opis'], PDO::PARAM_STR);
          
             
      

       
         if ($stmt->execute()) {
            dnevnik_zapis(33);
             //nova podrucje
             
         } 
            
             
           


        
            $stmt->closeCursor();
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        } 
        
        
        
        
    }
    
    
}









   echo '<br><br><br>';
$smarty->display('predlosci/podrucja_admin.tpl');
include_once 'footer.php';?>