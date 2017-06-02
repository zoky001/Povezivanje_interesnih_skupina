<?php



include_once('../okvir/aplikacijskiOkvir.php');


$ispis = array();
$sql = "SELECT  `korisnicko_ime`, `lozinka`, tk.naziv FROM `korisnik` k
LEFT JOIN  tip_korisnika tk ON k.`tip_korisnika` = tk.tip_id
 WHERE 1";
  

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
	
	
	
	foreach ($ispis as $row) {
		echo "Username: " . $row["korisnicko_ime"] . "<br>";
		echo "Tip: " . $row["naziv"] . "<br>";
		echo "Password: " . $row["lozinka"] . "<br><br>";
	}
?>