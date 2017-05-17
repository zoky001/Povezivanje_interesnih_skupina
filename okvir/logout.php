<?php
include_once('aplikacijskiOkvir.php');

dnevnik_zapis(10);// pdjava korisnika


Sesija::obrisiSesiju();
header("Location: index.php");
?>