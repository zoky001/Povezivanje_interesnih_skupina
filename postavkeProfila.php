<?php
if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    header("Location: $adresa");
    exit();
}

include_once 'okvir/aplikacijskiOkvir.php';
if (provjeraPrijaveKorisnika() == null) {

    header("Location: neprijavljeni.php");
}
dnevnik_zapis(9); //uspjesna autorizacija reg korisnika
?>
        <!-- Header neprijavljeni -->
        
        
<?php $naslov = "Postavke profila";
include_once 'header.php';

echo '<br><br><br><br>';
updateKorisnika();


$smarty->assign ('vrijeme',date('Y-m-d', vrijeme_sustava())); 

echo '<br><br><br><br><br>';


     
  
     
        $sql = "SELECT `korisnik_id`,
`ime`,
`prezime`,
`korisnicko_ime`,
`email`,
`lozinka`,
`prijavaDvaKoraka`,
`slika`
FROM 
`korisnik`
 WHERE `korisnik_id` = :ID";
   

try {
    $stmt = $dbc->prepare($sql);

    
     $stmt->bindParam(':ID', korisnikID(), PDO::PARAM_INT);
     
     
     
    $stmt->execute();


    $tema = $stmt->fetch();

        
    
    
    $smarty->assign('Tema',  $tema);
    
    
 



    $stmt->closeCursor();
} catch (PDOException $e) {
    trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
}

     
        
    

function updateKorisnika(){
    global $dbc;
    if (!empty($_POST['izmjenaPodataka'])) {
      //  echo '<br><br><br> unutar if>br>';
$sql = "UPDATE `korisnik` SET 
`ime`=:ime,
`prezime`=:prezime,
`prijavaDvaKoraka`=:dvaKoraka,
`slika` = :Slika1
WHERE 
`korisnik_id`=:ID";

    $vrijeme = date('Y-m-d H:i:s', vrijeme_sustava());

       try{
            $stmt = $dbc->prepare($sql);
             
 $stmt->bindParam(':ime', $_POST['ime'], PDO::PARAM_STR);
            
   $stmt->bindParam(':prezime', $_POST['prezime'], PDO::PARAM_STR);
             
             $stmt->bindParam(':ID',$_POST['IDkupona'] , PDO::PARAM_INT);
      
        $stmt->bindParam(':dvaKoraka', $_POST['dvaKoraka'], PDO::PARAM_STR);
           
           
           
          // echo"<br><br><br><br><br>"
         //  . "<br><br><br><br><br>".$_POST['naziv']."<br>".$_POST['Slika1']."<br>".$_POST['opis']."<br>".$_POST['ID_podrucja'];
            
           
           /*
upload
                  */
           
           	$uploadOk = 0;	
                
               // echo '<br><br><br><br><br><br><br><br> psotoji1111111';
                 if (!empty($_FILES["fileToUpload"]["name"])) {
                     
                		// echo '<br><br><br><br><br><br><br><br> psotoji';
			$target_dir = "/var/www/WebDiP/2016_projekti/WebDiP2016x052/slike/profil/";
			$target_dir1 = "https://barka.foi.hr/WebDiP/2016_projekti/WebDiP2016x052/slike/profil/";
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
       // echo "File is an image - " . $check["mime"] . ".";
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
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}



	 }	

       
           
           /*upload*/
           
           
           //echo '<br><br><br><br><br><br><br><br>'.$target_file1;
           
           
          
            
            
            if ($uploadOk) {
      $stmt->bindParam(':Slika1', $target_file1, PDO::PARAM_STR);
}
else{
    
    $stmt->bindParam(':Slika1', $_POST['Slika1'], PDO::PARAM_STR);
}
       
        
 if ( $uspjeh = $stmt->execute()) {
             
             
             //promjena podrucja
         } 
            
             
           


        
            $stmt->closeCursor();
            
            if ($uspjeh) {
                 dnevnik_zapis(34);
            }
           
        } catch (PDOException $e) {
            
               trigger_error("Problem kod citanja iz baze!" . $e->getMessage(), E_USER_ERROR);
          
        } 
        
      
             
             
         
        
        
        
        
    }
    
    
}










   echo '<br><br><br>';
$smarty->display('predlosci/postavkeProfila.tpl');
include_once 'footer.php';?>