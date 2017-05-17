<?php
include_once('aplikacijskiOkvir.php');

//dnevnik_zapis("Neuspješna autorizacija");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        $e = $_GET["e"];
        $message = "";
        switch ($e) {
            case -1: $message = "Korisnik ne postoji.";
                break;
            case 0: $message = "Neispravno korisničko ime/lozinka.";
                break;
            case 2: $message = "Neautorizirani pristup.";
                break;
            default: $message = "Nepoznata pogreska.";
                break;
        }
        print $message;
        ?>
        <p align="right"><a href="index.php">Početak</a></p>        
    </body>
</html>