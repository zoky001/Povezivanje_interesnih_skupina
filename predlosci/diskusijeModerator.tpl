

        <div ng-app="diskusijeModerator" ng-controller="cijelo" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Pregled diskusija - {$podrucjeMOD}</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4>Diskusije:</h4>
                            {if isset($ispisTema)&& $ispisTema}
                            <ul>
                                {foreach from=$ispisTema  item=elem}
                                    <li> <a href="diskusijeModerator.php?IDdiskusije={$elem['ID_diskusije']}">{$elem['Naziv']}</a></li>
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
                                  action="diskusijeModerator.php" novalidate>

                                
                                <input  style="display: none"type="text" id="naziv"  name="IDdiskusije" value="{$Tema['ID_diskusije']}" > <br> 
                                
                                
                               

                                <label  id = "Lnaziv" for="naziv">Naziv diskusije:      
                               </label>

                                <input   type="text" id="naziv"  name="naziv"  value="{$Tema['Naziv']}" required > <br> 
                                
                                

                                <label  id = "LdanPoc" for="danPoc">Početak diskusije:
                               </label>
                                <input  type="date" id="danPoc"  name="danPoc" value="{$Tema['Datum_pocetka']}" required >
                                
                                <br>
                                <label  id = "LdanKraja" for="danKraj">Kraj diskusije:
                               </label>
                                <input type="date" id="danKraj"  name="danKraj" value="{$Tema['Datum_zavrsetka']}" required=""><br>

                                <label   id = "Lopis" for="opis">Opis pravila:
                                   
                                </label>  
                                <label style="width: 95%" >(za <b>podebljanje</b> teksta koristite: &lt;<b>b</b>&gt; tekst &lt;/<b>b</b>&gt;)</label>
                                <label style="width: 95%">(za novi red koristite: &lt;<b>br</b>&gt;)</label>
                                <textarea required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" >{$Tema['Opis_pravila']}</textarea><br>








                                <input class= "gumb" type ="submit"  name="izmjenaDiskusije" value="Izmjeni diskusiju">
 
                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                            </form>



                            </div>
{/if}

                        </div>


                    </div>




                    <div class="desnoOglasi">
                        <button ng-click="otvoriModal()"id="btnNovaDiskusija"class="btnDiskusijaNova"> Dodaj novu diskusiju </button>

                    </div>

                    <!-- modal diskusije-->
                    <div ng-show="prikaziModal" id="myModalNovaDiskusija" style="display: block"class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span ng-click="zatvoriModal()" class="close">&times;</span>



                            <div class="naslov">
                                <h1 >Nova diskusija </h1>

                            </div>
   <div ng-show="Diskusija.naziv.$error.email2 || (Diskusija.danKraj.$invalid &&Diskusija.danKraj.$dirty )" class="greskeRegistracija" style=""> 

                 

                    <span ng-show="Diskusija.naziv.$error.email2" > Postojeći  naziv</span>

                    <span ng-show="Diskusija.danKraj.$invalid" > Datum kraja je maji od početnog </span>
                </div>

                            <form style="clear:both"class="formaNovaDiskusija" id="novi_proizvod" method="post" name="Diskusija"  
                                  action="diskusijeModerator.php" novalidate>

                                
                                <input  style="display: none"type="text" id="naziv"  name="IDPodrucja" value="{$IDpodrucjaMOD}" > <br> 
                                
                                
                                

                                <label  id = "Lnaziv" for="naziv">Naziv diskusije:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>

                                <input  ng-model="nazivDiskusije" type="text" id="naziv"  name="naziv" email2 required > <br> 
                                
                                   <span ng-show="Diskusija.naziv.$pending.email2">Provjera postojanja naziva...</span>

                                <label  id = "LdanPoc" for="danPoc">Početak diskusije:
                                    <img  id="erDanPro" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>
                                <input ng-model="pocDiskusije" type="date" id="danPoc"  name="danPoc"  min='{{ today | date :"y-MM-dd"  }}' placeholder ="gggg-mm-dd" required >
                                
                                <br>
                                <label  id = "LdanKraja" for="danKraj">Kraj diskusije:
                                    <img  id="erDanPro" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>
                                <input ng-model="krajDiskusije"type="date" id="danKraj"  placeholder ="gggg-mm-dd" name="danKraj" min='{{pocDiskusije}}'required=""><br>

                                <label  id = "Lopis" for="opis">Opis pravila:
                                    <img   id = "erOpis" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>  
                                <label style="width: 95%">(za <b>podebljanje</b> teksta koristite: &lt;<b>b</b>&gt; tekst &lt;/<b>b</b>&gt;)</label>
                                <label style="width: 95%">(za novi red koristite: &lt;<b>br</b>&gt;)</label>
                                <textarea ng-model="opis" required class = "opis_area" id= "opis" name="opis" rows="5" cols="100" placeholder="Ovdje unesite opis proizvoda"></textarea><br>








                                <input ng-disabled="Diskusija.naziv.$invalid || Diskusija.danPoc.$invalid || Diskusija.danKraj.$invalid || Diskusija.opis.$invalid" class="gumb" type="submit" name="novaDiskusija" value="Objavi diskusiju">

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
