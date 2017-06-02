<?php



if (isset($sat) && $sat) {
    $smarty->assign('sat', $sat);
}


$smarty->assign('aktivnaSkriptaa', $_SERVER['PHP_SELF']);



$smarty->display('predlosci/foot.tpl');
?>