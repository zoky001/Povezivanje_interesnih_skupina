

        <div ng-app="diskusijeModerator" ng-controller="cijelo" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Uređenje područja interesa </h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4>PODRUČJA INTERESA </h4>
                            {if isset($ispisTema)&& $ispisTema}
                            <ul>
                                {foreach from=$ispisTema  item=elem}
                                    <li> <a href="podrucjaAdmin.php?IDpodrucja={$elem['ID_podrucja']}">{$elem['Naziv']}</a></li>
                               {/foreach}
                            </ul>

{/if}
                        </nav>

                        <div class="galerija">
                         
{if isset($Tema) && $Tema}
    
                            <div style="text-align: left">
                                 <div class="naslov">
                                <h3 >{$Tema['Naziv']} </h3>

                            </div>
                               <form class="formaNovaDiskusija" method="post" name="Diskusija"  
                                  action="podrucjaAdmin.php" enctype="multipart/form-data">

                                 <div >
                                     <div style="text-align: center">
                    <figure >
                        <img style="max-width: 250px" src="{$Tema['URLSlike']}" alt="Slika područja" class="slikaKarticePodrucja" >


                    </figure> 
                                     </div>

                  
                </div>
                                <input  style="display: none"type="text" id="naziv"  name="ID_podrucja" value="{$Tema['ID_podrucja']}" > <br> 
                                
                                   <input  style="display: none"type="text" id="naziv"  name="Slika1" value="{$Tema['URLSlike']}" > <br> 
                                
                               

                                <label  id = "Lnaziv" for="naziv">Naziv područja:      
                               </label>

                                <input   type="text" id="naziv"  name="naziv"  value="{$Tema['Naziv']}" required > <br> 
                                
                                
                                <label   id = "Lopis" for="opis">Opis područja:
                                   
                                </label>  
                                <label style="width: 95%" >(za <b>podebljanje</b> teksta koristite: &lt;<b>b</b>&gt; tekst &lt;/<b>b</b>&gt;)</label>
                                <label style="width: 95%">(za novi red koristite: &lt;<b>br</b>&gt;)</label>
                                <textarea required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" >{$Tema['Opis_podrucja']}</textarea><br>
                         
                                  <label   for="moderator">Moderator:    
                                  
                                </label>
                                
                                  {if isset($IDmod) && $IDmod['ID_moderatora'] }   
                                      
                           <input  style ="display:none" type="text" id="naziv"  name="IDstari"  value="{$IDmod['ID_moderatora']}" > <br> 
                                
                                      
                                  
                                  
                                  {/if} 
                                  
                                  
                                <select style = "height: 30px" name="IDmoderatora" required="">
                                    {if isset($ispisSvihKorisnika) && ispisSvihKorisnika}
                                  {foreach from=$ispisSvihKorisnika  item=elem}

 

  <option  {if isset($IDmod) && $IDmod['ID_moderatora'] == $elem['korisnik_id'] }   selected {/if} value="{$elem['korisnik_id']}">{$elem['ime']} {$elem['prezime']}</option>
  
                                  
                                  {/foreach}     
  {/if}
</select>
                                

 <label  >Dodaj sliku podrucja: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload" id="fileToUpload">
  




                                <input class= "gumb" type ="submit"  name="izmjenaPodrucja" value="Izmjeni diskusiju">
 
                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                            </form>



                            </div>
{/if}

                        </div>


                    </div>




                    <div class="desnoOglasi">
                        <button ng-click="otvoriModal()"id="btnNovaDiskusija"class="btnDiskusijaNova"> Novo područje interesa </button>

                    </div>

                    <!-- modal diskusije-->
                    <div ng-show="prikaziModal" id="myModalNovaDiskusija" style="display: block"class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span ng-click="zatvoriModal()" class="close">&times;</span>



                            <div class="naslov">
                                <h1 >Novo područje interesa </h1>

                            </div>
   <div ng-show="Diskusija.naziv.$error.email2 || (Diskusija.danKraj.$invalid &&Diskusija.danKraj.$dirty )" class="greskeRegistracija" style=""> 

                 

                    <span ng-show="Diskusija.naziv.$error.email2" > Postojeći  naziv</span>

                    <span ng-show="Diskusija.danKraj.$invalid" > Datum kraja je maji od početnog </span>
                </div>

                            <form style="clear:both"class="formaNovaDiskusija" id="novi_proizvod" method="post" name="Diskusija"  
                                  action="podrucjaAdmin.php" enctype="multipart/form-data"  >

                                
                               
                                
                                
                                

                                <label  id = "Lnaziv" for="naziv">Naziv područja interesa:      
                                  
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
                                <textarea ng-model="opis" required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" placeholder="Ovdje unesite opis proizvoda"></textarea><br>



 

                               

                                <input ng-disabled="Diskusija.naziv.$invalid || Diskusija.danPoc.$invalid || Diskusija.danKraj.$invalid || Diskusija.opis.$invalid" class="gumb" type="submit" name="novoPodrucje" value="Objavi područje interesa">

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
