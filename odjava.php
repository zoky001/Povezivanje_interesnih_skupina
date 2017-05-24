<?php
include_once('okvir/aplikacijskiOkvir.php');

dnevnik_zapis(10);// pdjava korisnika


Sesija::obrisiSesiju();


header("Location: neprijavljeni.php");
?>
