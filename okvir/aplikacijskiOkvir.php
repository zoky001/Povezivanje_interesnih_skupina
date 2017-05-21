<?php
define('ADMINISTRATOR', '1');
define('MODERATOR', '2');
define('KORISNIK', '3');
include_once ('vanjske_biblioteke/Smarty/libs/Smarty.class.php');
include_once ('filtri.php');

include_once('korisnik.php');
include_once('vrijeme.php');
include_once('base.php');
include_once('obradaPogresaka.php');


include_once('sesija.class.php');
include_once('autentikacija.php');
include_once('provjeraKorisnika.php');
include_once('dnevnik.php');

//uključivanje potrebnih datoteka





//kreiranje potrebnih objekata
$smarty = new Smarty();

$smarty->autoload_filters = array('pre' => array('angularjsescape'),'post' => array('angularjsescape'));

// Change the default template directories 
$smarty->setTemplateDir("predlosci"); 
$smarty->setCompileDir("templates_c"); 
?>