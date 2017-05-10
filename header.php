        <header  >
            
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
         
            <div class="text-centar">

                <div class="navigacija"> 
                    
                
<?php include_once 'navigacija_moderator.php';?>
                     <?php //include_once 'navigacijaAdmin.php';?>   
                
                    <div  class="navigacijaNormalno"style="clear: both; "> 
                    <a href="kosarica.php">  <button class="btnNavL"> Košarica</button> </a>
                    <a href="podrucja_iteresa.php"> <button class="btnNav"> Područja interesa</button> </a>
                    <a href="moja_podrucja_interesa.php"> <button class="btnNav"> Moja područja interesa</button> </a>
                    <a href="pregled_kupona.php">  <button class="btnNav"> Pregled kupona</button> </a>
                    <a href="sakupljeni_bodovi.php">  <button class="btnNav"> Sakupnjanje bodova</button> </a>
                    <a  >  <button class="btnNavD"> Odjava</button> </a>
                    </div>
                    
                    
                    
                    <div class="navigacijaNormalnoMali">
                        <p id="meniBtn" style="float: left; max-width: 20%;color:black; height: 20px " class="btn">  Meni </p>
                    </div>
                    
                    
                    <div id="meni" class="navigacijaNormalnoMeni">
                        <ul>
                            
                            
                            <li>
                                
                                <a class="klik" href="podrucja_iteresa.php"> Područja interesa</a>
                            </li>
                            
                             <li>
                                 <a class="klik" href="moja_podrucja_interesa.php">  Moja područja interesa </a>
                                
                            </li>
                             <li>
                                  <a class="klik" href="pregled_kupona.php">   Pregled kupona</a>
                                
                            </li>
                            <li>
                                   <a class="klik" href="sakupljeni_bodovi.php">   Sakupnjanje bodova </a>
                            </li>
                        </ul>
                    </div>
                  
                </div>
            </div>



        </header>