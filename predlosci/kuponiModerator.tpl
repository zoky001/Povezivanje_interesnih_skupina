



        <div ng-app="kuponiModerator" ng-controller="cjelo" class="tijelo  tijeloAdmin">


            <div class="section">

                <div class="naslov">
                    <h1>Odabir kupona</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4>Aktivnosti:</h4>
                            <ul>
                                <li ng-click="PrikaziSve()"> <a>Svi kuponi</a></li>
                                <br>
                                <li ng-click="PrikaziKupljene()"> <a>Aktivni kuponi</a></li>
                                <br>
                                <li ng-click="PrikaziProvjeru()"> <a>Provjera kupona</a></li>
                            </ul>


                        </nav>
                        
                        
                       
                        
                        {if isset($otvoriFormuKupona) && $otvoriFormuKupona}
                            <div class="galerija" >
                            
                                <div class="naslov">
                                    <h1 >Dodavanje novog kupona </h1>

                                </div>

                                <form style="text-align: left" class="formaNovaDiskusija" id="novi_proizvod" method="post" name="novi_proizvod"  
                                      action="kuponiModerator.php">





                                    <input  style="display: none" id="IDkupona"  name="IDkupona" value="{$IDkupona}" >


                                    <label  for="kolBodova"> Potreban broj bodova:
                                     
                                    </label>
                                    <input type="number" id="kolBodova"  min = "1" name="kolBodova" required>

                                    <br>

                                    <label   for="danPocetka">Početak:
                                  </label>
                                    <input type="date" id="danPocetka" placeholder = "dd.mm.gggg." name="danPocetka" required>


                                    <br>


                                    <label  for="danKraj">Kraj:
                                   </label>
                                    
                                    <input type="date" id="danKraj" placeholder = "dd.mm.gggg." name="danKraj" required>

                                    <br>





                                    <input class="gumb" name="dodajKupon" type="submit" value="Dodaj kupon"> <br>

                                    <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">







                                </form>
                        </div>
                                    {else if isset($ispisUspjeha) || isset($ispisGreske)}
                       
                                     <div class="galerija">
                           {if isset($ispisUspjeha) && $ispisUspjeha} 
                             <div  class="uspjeh" style="display: block;width:50%;margin-left: 25%;"> 
                                 <p>Kod je ispravan!!</p>
                             </div>
                           {/if}
                             {if isset($ispisGreske) && $ispisGreske} 
                             <div  class="greske" style="display: block;width:50%;margin-left: 25%;"> 
                                 <p>Uneseni je nepostojeći kod kupona!!</p>
                             </div>
                           {/if}
                        
                                         
                                         
                                    <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  action="kuponiModerator.php">


                                 <div class="naslov">
                                
 <h3 >Provjera kupona</h3> 
                            </div>

                                <label  style="width: 17%"id = "Lnaziv" for="kod">Kod:      
                              </label>

                                <input style="width: 70%;" type="text" id="kod"  name="kod" required> <br> 







                                <input style="margin-left: -20%"class="gumb" name="provjeraKod" type="submit" value="Provjeri valjanost"> <br>









                            </form>         
                                         
                        </div>
                                    
                                    {else}




                        


                               








                        
                        <div ng-show="prikaziSve" class="galerija">
                            
                               <div class="naslov">
                                
 <h3 >Svi kuponi</h3> 
                            </div>

                            <div style="text-align: left">
                               
         {if isset($ispisSvihKupona)&& $ispisSvihKupona}                       
 {foreach from=$ispisSvihKupona item=elem}                               
                                <div class="kupon">
                                    <img src="{$elem['Slika']}"style="max-width: 100%;height: 200px;">
                                    <p><b>{$elem['Naziv_kupona']}</b></p>

                                    <div class="ikonaKupi">
                                        <a href='kupon.php?IDkupona={$elem['ID_kupona']}'>  <button class="gumbKupnjaKupona"> Pregled </button></a>
                                         <a href='kuponiModerator.php?IDkupona={$elem['ID_kupona']}&aktivnost=dodaj'><button class="gumbKupnjaKupona dodajKupon">Dodaj</button></a>

                                    </div>


                                </div>
                                
       {/foreach}
{/if}
                            </div>
                        </div>
                        
                        <div ng-show="prikaziKupljene" class="galerija">
                            
                           
   <div class="naslov">
                                
 <h3 >Aktivni kuponi</h3> 
                            </div>
                           

                            <div style="text-align: left">
                               
                        {if isset($ispisAktivnihKupona)&& $ispisAktivnihKupona}                       
 {foreach from=$ispisAktivnihKupona item=elem}                  
                                
                                <div class="kupon">
                                    <img src="{$elem['Slika']}"style="max-width: 100%;height: 200px;">
                                    <p>{$elem['Naziv_kupona']}<br><b><strong>CIJENA: </strong>{$elem['Min_broj_bodova']}</b></p>

                                    <div class="ikonaKupi">
                                         <button class="gumbKupnjaKupona" onclick="window.location.href='kupon.php?IDkupona={$elem['ID_kupona']}&IDpodrucja={$elem['ID_podrucja']}'"> Pregled </button>
                                         <a href="kuponiModerator.php?IDkupona={$elem['ID_kupona']}&aktivnost=obrisiKupon">  <button class="gumbKupnjaKupona">Obriši</button></a>

                                    </div>


                                </div>
                                
                       {/foreach}
                       {/if}

                            </div>
 
                        </div>
                        
                        
                        <div ng-show="prikaziProvjeru" class="galerija">
                            




                            <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  action="kuponiModerator.php">


                                 <div class="naslov">
                                
 <h3 >Provjera kupona</h3> 
                            </div>

                                <label  style="width: 17%"id = "Lnaziv" for="kod">Kod:      
                              </label>

                                <input style="width: 70%;" type="text" id="kod"  name="kod" required> <br> 







                                <input style="margin-left: -20%"class="gumb" name="provjeraKod" type="submit" value="Provjeri valjanost"> <br>









                            </form>


                        </div>

{/if}
                    </div>

                    <div class="desnoOglasi">
                        <p >Trenutno aktivnih kupona:</p>

                        
                            {if isset($ukpKupona) && $ukpKupona}
                          <h1>  {$ukpKupona}</h1>
                        {else}
                             <h1> 0 </h1>
                            
                            {/if}
                        

                    </div>
                </div>


            </div>

        </div>
