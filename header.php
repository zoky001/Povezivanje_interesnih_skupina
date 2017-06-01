<?php 
include_once 'okvir/aplikacijskiOkvir.php';

 
        
$smarty->assign('odjava', 'odjava.php');


if (isset($neprijavljeni) && $neprijavljeni) {
    $smarty->assign('neprijavljeni',TRUE);
}
else{
if (provjeraUlogeBool(MODERATOR)) {
    $smarty->assign('moderator', true);
$smarty->assign('podrucjeMOD',podrucjeModeriranja());
$smarty->assign('IDpodrucjaMOD',podrucjeModeriranjaID());
    
    
}
if (provjeraUlogeBool(ADMINISTRATOR)) {
    $smarty->assign('administrator', true);
}

}



$smarty->assign('naslov', $naslov);
$smarty->display('predlosci/_header.tpl');


?>