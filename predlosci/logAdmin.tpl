

        <div ng-app="log" ng-controller="ctrlRead" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Pregled dnevnika rada sustava </h1>

                </div>


                <div style="width: 100%;">
                    <div   class="glavniDio" style="width: 98%" >

                        <nav style="width:20%;">

                            <h4> PRETRAŽIVANJE: </h4>
                          
                            <ul>
                             
                                    <li> <a href="logAdmin.php?show=interval">Prema intervalu</a></li>
                                    <li> <a href="logAdmin.php?show=tipuZapisa">Prema aktivnosti</a></li>
                              <li> <a href="logAdmin.php?show=korisniku">Prema korisniku</a></li>
                            </ul>


                        </nav>

                        <div class="galerija">
                         
{if isset($Tema) && $Tema }
    
                            <div style="text-align: left">
                                 <div class="naslov">
                                <h3 > Svi zapisi dnevnika </h3>

                            </div>
                                 
                                
                                
                                <table style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Pregled dnevnika sustava</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:400px" custom-sort order="'id'" sort="sort">Vrijeme&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Adresa&nbsp;</th>
                        <th class="description" custom-sort order="'description'" sort="sort">Skripta&nbsp;</th>
                        <th class="field3" custom-sort order="'field3'" sort="sort">Ime&nbsp;</th>
                        <th class="field4" custom-sort order="'field4'" sort="sort">Prezime &nbsp;</th>
                        <th class="field5" custom-sort order="'field5'" sort="sort">Aktivnost&nbsp;</th>
                    </tr>
                </thead>
                <tfoot class="tablica1">
                    <td colspan="6">
                        <div style="width:50%; margin-left:29%; margin-bottom: 5px;margin-top: 5px" >
                            <ul>
                                <li class="preNext" 
                                    
                                    ng-class="{ disabled: currentPage == 0 }" 
                                    
                                    >
                                    <a href ng-click="prevPage()">« Prethodna</a>
                                </li>
                            
                                <li class="preNext" ng-repeat="n in range(pagedItems.length, currentPage, currentPage + gap) "
                                   
                                    ng-class="{ active: n == currentPage }"
                                    
                                    
                                ng-click="setPage()">
                                    <a href ng-bind="n + 1">1</a>
                                </li>
                             
                                <li class="preNext"
                                    
                                    ng-class="{ disabled: (currentPage) == pagedItems.length - 1 }"
                                     >
                                  
                                    <a href ng-click="nextPage()">Sljedeća»</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tfoot>
              
                <tbody class="tablica1">
                    <tr class="tablica1_redak1" ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse">
                        <td style="width:400px">{{item.Vrijeme}}</td>
                        <td>{{item.Adresa}}</td>
                         <td>{{item.Skripta}}</td>
                         <td>{{item.Ime}}</td>
                        <td>{{item.Prezime}}</td> 
                        <td>{{item.Aktivnost}}</td>
                        
                       
                       
                    </tr>
                </tbody>
            </table>
                    
                    
                    
                    
                    
                    
                               



                            </div>
{/if}

 {if isset($korisnik) && $korisnik}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Pregled po korisniku </h3> 
                            </div>

         <div style="margin-left: 33%"> 

    <label  style="margin-left: -33%"id = "Lnaziv" for="kod">Ime korisnika:      
                              </label>

                                
                                
             <select name="aktivnost" ng-model="aktivnost"  style = "height: 30px"  required="">
     
                                    {if isset($ispisSvihAktivnosti) && $ispisSvihAktivnosti}
                                  {foreach from=$ispisSvihAktivnosti  item=elem}

 

  <option  value="{$elem['korisnik_id']}">{$elem['ime']} {$elem['prezime']} </option>
  
                                  
                                  {/foreach}     
  {/if}
</select>

<br>



                                <input ng-click="prikaziKorisniku()" style="margin-left: -25%"class="gumb" name="provjeraKod" type="submit" value="Pregled"> <br>


         </div>






                            </form>
    
                                
                               
    {/if}
    
    
    
    {if isset($tipZapisa) && $tipZapisa}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3 >Pregled po tipu zapisa</h3> 
                            </div>

         <div style="margin-left: 33%"> 

    <label  style="margin-left: -33%"id = "Lnaziv" for="kod">Tip aktivnosti:      
                              </label>

                                
                                
             <select name="aktivnost" ng-model="aktivnost"  style = "height: 30px"  required="">
     
                                    {if isset($ispisSvihAktivnosti) && $ispisSvihAktivnosti}
                                  {foreach from=$ispisSvihAktivnosti  item=elem}

 

  <option  value="{$elem['ID_aktivnosti']}">{$elem['Naziv_aktivnosti']}</option>
  
                                  
                                  {/foreach}     
  {/if}
</select>
<br>




                                <input ng-click="prikaziAktivnosti()" style="margin-left: -25%"class="gumb" name="provjeraKod" type="submit" value="Pregled"> <br>


         </div>






                            </form>
    
                                
                               
    {/if}
    
    
    
{if isset($interval) && $interval}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3 >Pregled po intervalu</h3> 
                            </div>

         <div style="margin-left: 33%"> 

    <label  style=""id = "Lnaziv" for="kod">OD:      
                              </label>

                                <input ng-model="ODinterval" style="width: 50%;" type="date" id="kod"  placeholder = "gggg-mm-dd" required> <br> 

    <label  style=""id = "Lnaziv" for="kod">DO:      
                              </label>

                                <input ng-model="DOinterval" style="width: 50%;" type="date" id="kod"  placeholder = "gggg-mm-dd" required> <br> 





                                <input ng-click="prikazIntervala()" style="margin-left: -25%"class="gumb" name="provjeraKod" type="submit" value="Pregled"> <br>


         </div>






                            </form>
    
                                
                               
    {/if}
 <table ng-show="prikaziPoIntervalu" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Pregled dnevnika sustava</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:200px" custom-sort order="'id'" sort="sort">Vrijeme&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Adresa&nbsp;</th>
                        <th class="description" custom-sort order="'description'" sort="sort">Skripta&nbsp;</th>
                        <th class="field3" custom-sort order="'field3'" sort="sort">Ime&nbsp;</th>
                        <th class="field4" custom-sort order="'field4'" sort="sort">Prezime &nbsp;</th>
                        <th class="field5" custom-sort order="'field5'" sort="sort">Aktivnost&nbsp;</th>
                    </tr>
                </thead>
                <tfoot class="tablica1">
                    <td colspan="6">
                        <div style="width:50%; margin-left:29%; margin-bottom: 5px;margin-top: 5px" >
                            <ul>
                                <li class="preNext" 
                                    
                                    ng-class="{ disabled: currentPage == 0 }" 
                                    
                                    >
                                    <a href ng-click="prevPage()">« Prethodna</a>
                                </li>
                            
                                <li class="preNext" ng-repeat="n in range(pagedItems.length, currentPage, currentPage + gap) "
                                   
                                    ng-class="{ active: n == currentPage }"
                                    
                                    
                                ng-click="setPage()">
                                    <a href ng-bind="n + 1">1</a>
                                </li>
                             
                                <li class="preNext"
                                    
                                    ng-class="{ disabled: (currentPage) == pagedItems.length - 1 }"
                                     >
                                  
                                    <a href ng-click="nextPage()">Sljedeća»</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tfoot>
              
                <tbody class="tablica1">
                    <tr class="tablica1_redak1" ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse">
                        <td style="width:200px">{{item.Vrijeme}}</td>
                        <td>{{item.Adresa}}</td>
                         <td>{{item.Skripta}}</td>
                         <td>{{item.Ime}}</td>
                        <td>{{item.Prezime}}</td> 
                        <td>{{item.Aktivnost}}</td>
                        
                       
                       
                    </tr>
                </tbody>
            </table>
                        </div>


                    </div>





                    <!-- modal diskusije-->
                    <div ng-show="prikaziModal && 0" id="myModalNovaDiskusija" style="display: block"class="modal">

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
