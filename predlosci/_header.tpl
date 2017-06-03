  <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>{$naslov}</title>
        <meta charset="UTF-8">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Novi proizvod">
        <meta name="author" content="Zoran Hrnčić">
        <meta name="keywords" content="novi_proizvod">
        <meta name="date" content="07.03.2016">
  
        <link rel="stylesheet" media="screen" type="text/css" href="css/podrucjaInteresa.css"/>


   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>


<!--
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src ="js/zorhrncic.js"></script>
        <script type="text/javascript" src ="js/zorhrncic_jquery.js"></script>
        <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
        -->
        
        
             <script src="js/myApp.js"></script>
        
        <script src="js/myCtrl.js"></script>
        
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
  
    <style>
        
    {if isset($dizajnIF) && $dizajnIF} 
        
.section1{
    
        background-color:{$pozSekcije};
    
       

    border-color:{$obrubSekcije};
 
    
    

    
  
}  

body{ background-color:{$body};
      color:{$slova}; 
}
   {/if}     
</style>
    <body>    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hr_HR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header>
    
    
            <div class="text-centar">

                <div class="navigacija"> 
                    
               
                
                
                 <!--  navigacija admin-->
                 {if isset($administrator) && $administrator} 
                         
            

<div  class="navigacijaAdmin1" style=" color: white;margin-left: 0%">
 
     
   
  
                 
    <ul style="margin-left: -2%; margin-right: -5%;">
                        
                        
        <li style="border-left: none; ">
            <a href="podrucjaAdmin.php" style="padding-right: 7px">   Pregled područja interesa  </a>
                    </li>
                    
                    <li >
               
                    <a href="kuponiAdmin.php" style="padding-right: 7px; padding-left: 7px"> Definiranje kupona članstva</a>
                    </li> 
         
                    <li>
                        <a href="statistikaAdmin.php">   Statistike </a>   
                    </li>
                    <li>
                          <a href="logAdmin.php">  LOG sustava</a>  
                    </li>
                    
                     <li>
                          <a href="otkljucavanjeKorisnika.php"> Otključavanje korisnika</a>  
                    </li>
                    
                     <li>
                          <a href="postavkeAdmin.php"> Postavke</a>  
                    </li>
                    
                    <li>
                          <a href="CRUD.php">  CRUD</a>  
                    </li>
                 
                
                  
                   
               
                    </ul>
    
    
    <ul style="float: right; margin-left: -5%">
        
        <li style="border-left: none; margin-top: -15px; ">
            <a> <b>Administrator</b>  &nbsp;&nbsp;</a>
        </li>
        
    </ul>
    <br>

    <br>
    
    
                </div>
            


                {/if}
                 <!--  navigacija moderator-->
                {if isset($moderator) && $moderator} 
                         

<div  class="navigacijaModerator" style=" color: white;margin-left: 0%">
 
     
   
  
                 
    <ul style="margin-left: -2%; margin-right: -5%;">
                        
                        
        <li style="border-left: none; ">
                    <a href="diskusijeModerator.php">   Diskusije  </a>
                    </li>
                    
                    <li >
               
                    <a href="pretplatnici.php"> Pretplatnici</a>
                    </li> 
         
                    <li>
                        <a href="kuponiModerator.php">   Kuponi</a>   
                    </li>
                    <li>
                          <a href="dizajn.php">  Dizajn</a>  
                    </li>
                
                  
                   
               
                    </ul>
    
    
    <ul style="float: right; margin-left: -5%">
        
        <li style="border-left: none; margin-top: -15px; ">
            <a> <b>Moderator:</b> {$podrucjeMOD} &nbsp;&nbsp;</a>
        </li>
        
    </ul>
    <br>

    <br>
    
    
                </div>
            

                {/if}
                
                

                {if isset($neprijavljeni) && neprijavljeni}
                   
                {else}
                    <div  class="navigacijaNormalno"style="clear: both; "> 
                    <a href="kosarica.php">  <button class="btnNavL"> Košarica</button> </a>
                    <a href="podrucja_interesa.php"> <button class="btnNav"> Područja interesa</button> </a>
                    <a href="moja_podrucja_interesa.php"> <button class="btnNav"> Moja područja interesa</button> </a>
                    <a href="pregled_kupona.php">  <button class="btnNav"> Pregled kupona</button> </a>
                    <a href="sakupljeni_bodovi.php">  <button class="btnNav"> Sakupnjanje bodova</button> </a>
                    
                     <a href="postavkeProfila.php">  <button class="btnNav">Moj profil</button> </a>
                    
                    
                    <a  href="{$odjava}">  <button class="btnNavD"> Odjava</button> </a>
                    </div>
                    {/if}
                    
                    
                   
                    
                    
                    
                  
                </div>
            </div>



        </header>
            
    