

        <div ng-app="log" ng-controller="ctrlRead" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Postavke </h1>

                </div>


                <div style="width: 100%;">
                    <div   class="glavniDio" style="width: 98%" >

                        <nav style="width:20%;">

                            <h4> AKCIJA: </h4>
                          
                            <ul>
                             
                                    <li> <a href="postavkeAdmin.php?show=vrijeme">Virtualno vrijeme</a></li>
                                    <li> <a href="postavkeAdmin.php?show=stranicenje">Straničenje</a></li>
                            </ul>


                        </nav>

                        <div class="galerija">
                         


 {if isset($vrijeme) && $vrijeme}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Postavljanje vremena </h3> 
                            </div>
         <br>
         
                    <div class="naslov">
                                
                        <h3> <b>Trenutno vrijeme: </b> {$vrijemeSustava}</h3> 
                            </div>
                                                <div class="naslov">
                                
                        <h3> <b>Datum: </b> {$datum}</h3> 
                            </div>

         <div style="margin-left: 33%"> 
             <p><b>1. KORAK </b> - Odabrati "Postavi vrijeme" i upisati </p> <br>
 <p><b>2. KORAK </b> - Odabrati "Učitaj vrijeme" za pohranu</p> <br>
   

<br>



 <button style="margin-left: -25%"class="gumb"> <a  href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html" target="_blank"> Postavi vrijeme </a></button> <br>
      <button style="margin-left: -25%"class="gumb"> <a  href="postavkeAdmin.php?postavi=vrijeme" > Učitaj vrijeme </a></button> <br>
 

         </div>






                            </form>
    
                                
                               
    {/if}
    
    
    
    {if isset($stranicenje) && $stranicenje}
    
     <form style="text-align: left"  class="provjraKupona"  name="ProvjeraKoda"  
                      action="postavkeAdmin.php"        method="post"    >


                                 <div class="naslov">
                                
 <h3 >Prikaz redaka po stranici</h3> 
                            </div>
         
                             <div class="naslov">
                                
                        <h3> <b>Trenutno: </b> {$brojPrikaza} redaka</h3> 
                            </div>

         <div style="margin-left: 33%"> 

    <label  style="margin-left: -33%"id = "Lnaziv" for="kod">Broj redaka po stranici:      
                              </label>

             <input  ng-model="broj redaka" type="number" min ="0" max="100" name="brojRedaka" value="{$brojPrikaza}"required="">
                                
                                
            
<br>




                                <input style="margin-left: -40%" class="gumb" name="pohranaRedaka" type="submit" value="Pohrani"> <br>


         </div>






                            </form>
    
                                
                               
    {/if}
    
                    
    
{if isset($bpa) && $bpa}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3 >Statistika skupljenih i potrošenih bodova prema aktivnosti</h3> 
                            </div>

         <div style="margin-left: 33%"> 

     <label  style="margin-left: -33%"id = "Lnaziv" for="kod">Aktivnosti:      
                              </label>

                                
                                
             <select name="aktivnost" ng-model="aktivnost"  style = "height: 30px"  required="">
     
                                 
  <option  value="Zarada">Zarada bodova</option>
  
  <option  value="Kupnja">Trošenje bodova</option> 
                                 
 
</select>
<br>




                                <input ng-click="prikazBpA()" style="margin-left: -25%"class="gumb" name="provjeraKod" type="submit" value="Pregled"> <br>


         </div>






                            </form>
    
                                
                               
    {/if}
 

    
{if isset($bpk) && $bpk}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3 >Statistika skupljenih i potrošenih bodova korisnika</h3> 
                            </div>

         <div style="margin-left: 33%"> 

     <label  style="margin-left: -33%"id = "Lnaziv" for="kod">Aktivnost:      
                              </label>

                                
                                
             <select name="aktivnost" ng-model="aktivnost"  style = "height: 30px"  required="">
     
                                 

  <option  value="Zarada">Zarada bodova</option>
  
  <option  value="Kupnja">Trošenje bodova</option>                              
 
</select>
<br>




                                <input ng-click="prikazBpK()" style="margin-left: -25%"class="gumb" name="provjeraKod" type="submit" value="Pregled"> <br>


         </div>






                            </form>
    
                                
 
    
    
    
    {/if}
    
  
                        </div>


                    </div>





                </div>


            </div>

        </div>
