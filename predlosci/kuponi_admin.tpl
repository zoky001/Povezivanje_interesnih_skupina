

        <div ng-app="diskusijeModerator" ng-controller="cijelo" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Uređenje kupona članstva </h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4> Kuponi </h4>
                            {if isset($ispisTema)&& $ispisTema}
                            <ul>
                                {foreach from=$ispisTema  item=elem}
                                    <li> <a href="kuponiAdmin.php?IDkupona={$elem['ID_kupona']}">{$elem['Naziv_kupona']}</a></li>
                               {/foreach}
                            </ul>

{/if}
                        </nav>

                        <div class="galerija">
                         
{if isset($Tema) && $Tema}
    
                            <div style="text-align: left">
                                 <div class="naslov">
                                <h3 >{$Tema['Naziv_kupona']} </h3>

                            </div>
                                   <a href='kupon.php?IDkupona={$Tema['ID_kupona']}'>  <button style="width: 90%;margin-left: -20%" class="gumb"> Pregled kupona </button></a>
                                
                               <form class="formaNovaDiskusija" method="post" name="Diskusija"  
                                  action="kuponiAdmin.php" enctype="multipart/form-data">

                                 <div >
                                     <div style="text-align: center">
                    <figure >
                        <img style="max-width: 250px" src="{$Tema['Slika']}" alt="Slika kupona" class="slikaKarticePodrucja" >


                    </figure> 
                                     </div>

                  
                </div>
                                <input  style="display: none"type="text" id="naziv"  name="IDkupona" value="{$Tema['ID_kupona']}" > <br> 
                                
                                   <input  style="display: none"type="text" id="naziv"  name="Slika1" value="{$Tema['Slika']}" > <br> 
                                
                               

                                <label  id = "Lnaziv" for="naziv">Naziv kupona:      
                               </label>

                                <input   type="text" id="naziv"  name="naziv"  value="{$Tema['Naziv_kupona']}" required > <br> 
                                
                                
                                <label   id = "Lopis" for="opis">Opis kupona:
                                   
                                </label>  
                                <label style="width: 95%" >(za <b>podebljanje</b> teksta koristite: &lt;<b>b</b>&gt; tekst &lt;/<b>b</b>&gt;)</label>
                                <label style="width: 95%">(za novi red koristite: &lt;<b>br</b>&gt;)</label>
                                <textarea required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" >{$Tema['Opis_kupona']}</textarea><br>
                         
                                  
                                
                              
                                  
                                  
                 
                                

 <label  >Dodaj sliku kupona: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload" id="fileToUpload">
  
  <label  style="visibility: hidden">Dodaj sliku kupona: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload1" id="fileToUpload">
   <label  style="visibility: hidden">Dodaj sliku kupona: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload2" id="fileToUpload">
  <label  style="visibility: hidden">Dodaj sliku kupona: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload3" id="fileToUpload">

    <label  id = "Lnaziv" for="naziv">URL video (samo YouTube):      
                               </label>

                                <input   type="url" id="video"  name="video"  value="{$Tema['Video']}" required > <br> 
                                


                                <input class= "gumb" type ="submit"  name="izmjenaKupona" value="Izmjeni kupon">
 
                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                            </form>



                            </div>
{/if}

                        </div>


                    </div>




                    <div class="desnoOglasi">
                        <button ng-click="otvoriModal()"id="btnNovaDiskusija"class="btnDiskusijaNova"> Novi kupon</button>

                    </div>

                    <!-- modal diskusije-->
                    <div ng-show="prikaziModal" id="myModalNovaDiskusija" style="display: block"class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span ng-click="zatvoriModal()" class="close">&times;</span>



                            <div class="naslov">
                                <h1 >Novi kupon </h1>

                            </div>
   <div ng-show="Diskusija.naziv.$error.email2 || (Diskusija.danKraj.$invalid &&Diskusija.danKraj.$dirty )" class="greskeRegistracija" style=""> 

                 

                    <span ng-show="Diskusija.naziv.$error.email2" > Postojeći  naziv</span>

                    <span ng-show="Diskusija.danKraj.$invalid" > Datum kraja je maji od početnog </span>
                </div>

                            <form style="clear:both"class="formaNovaDiskusija" id="novi_proizvod" method="post" name="Diskusija"  
                                  action="kuponiAdmin.php" enctype="multipart/form-data"  >

                                
                               
                                
                                
                                

                                <label  id = "Lnaziv" for="naziv">Naziv kupona:      
                                  
                                </label>

                                <input   ng-model="nazivDiskusije" type="text" id="naziv"  name="naziv"  required > <br> 
                                <!--
                                <input  ng-model="nazivDiskusije" type="text" id="naziv"  name="naziv" email2 required > <br> 
                                
                                   <span ng-show="Diskusija.naziv.$pending.email2">Provjera postojanja naziva...</span>
-->
                                   
                                   
                           
                                <label  id = "Lopis" for="opis">Opis:
                               </label>  
                                <label style="width: 95%">(za <b>podebljanje</b> teksta koristite: &lt;<b>b</b>&gt; tekst &lt;/<b>b</b>&gt;)</label>
                                <label style="width: 95%">(za novi red koristite: &lt;<b>br</b>&gt;)</label>
                                <textarea ng-model="opis" required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" placeholder="Ovdje unesite opis kupona"></textarea><br>



 

                               

                                <input ng-disabled="Diskusija.naziv.$invalid || Diskusija.danPoc.$invalid || Diskusija.danKraj.$invalid || Diskusija.opis.$invalid" class="gumb" type="submit" name="novoKupon" value="Pohrani kupon">

                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                            </form>



                            </ul>

                            <div class="naslov" style="background: white">
                                <button ng-click="zatvoriModal()" id="btnZatvori"> Zatvori pregled</button> 

                            </div>








                        </div>

                    </div>
                </div>


            </div>

        </div>
