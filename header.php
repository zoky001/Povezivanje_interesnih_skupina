<?php 
include_once 'okvir/aplikacijskiOkvir.php';
?>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script> 
        
        $(document).ready(function () {
/*
 slide down prijava
 */

 $("#meni").hide();
    $("#meniBtn").click(function () {

        $("#meni").slideToggle();
    });
      $(".klik").click(function () {

        $("#meni").hide();
    });
    
    
    
    
});
        
        
        </script>
        
        
       
        
        <?php 
 
        
$smarty->assign('odjava', 'odjava.php');

if (provjeraUlogeBool(MODERATOR)) {
    $smarty->assign('moderator', true);
$smarty->assign('podrucjeMOD',podrucjeModeriranja());
$smarty->assign('IDpodrucjaMOD',podrucjeModeriranjaID());
    
    
}
if (provjeraUlogeBool(ADMINISTRATOR)) {
    $smarty->assign('administrator', true);
}



$smarty->assign('naslov', $naslov);
$smarty->display('predlosci/_header.tpl');


?>