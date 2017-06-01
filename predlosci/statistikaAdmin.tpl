

        <div ng-app="log" ng-controller="ctrlRead" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Pregled statistika </h1>

                </div>


                <div style="width: 100%;">
                    <div   class="glavniDio" style="width: 98%" >

                        <nav style="width:20%;">

                            <h4> STATISTIKA: </h4>
                          
                            <ul>
                             
                                    <li> <a href="statistikaAdmin.php?show=BpoK">Bodovi po korisniku</a></li>
                                    <li> <a href="statistikaAdmin.php?show=BpoA">Bodovi po aktivnosti</a></li>
                             
                            </ul>


                        </nav>

                        <div class="galerija">
                         


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
 
<div ng-show="prikaziStatistikaBPA">
    
    <button style="margin-left: -30%" class="gumb" name="provjeraKod" type="submit" ng-click="printDiv('i')" >Ispiši statistiku</button>
    <br>


<div id="i">
    <table  style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Prikaz statistike bodova po aktivnosti</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:200px" custom-sort order="'id'" sort="sort">Aktivnost&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">{{aktivnost}}&nbsp;</th>
                       
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
                     
                        <td>{{item.Aktivnost}}</td>
                         <td>{{item.Bodova}}</td>
                       
                        
                       
                       
                    </tr>
                </tbody>
            </table>
   
                         
                         
                         
<canvas style ="margin: 10px;" id="platno" width="1000" height="400">
</canvas>
                                        
   </div>                
                         
     <table  style = "margin-left: 0;width:100%" class="tablica1">
              <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:200px" >Legenda&nbsp;</th>
                      
                    </tr>
                </thead>
               
              
                <tbody class="tablica1">
                    <tr class="tablica1_redak1" ng-repeat="item in boje">
                     
                     <td style ="background-color:{{item.boja}}; color:black">   {{item.naziv}}</td>
                       
                        
                       
                       
                    </tr>
                </tbody>
            </table>                     

</div>
    
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
    
   
    
    <div ng-show="prikaziStatistikaBPK" >
        <br>
         <button style="margin-left: -30%" class="gumb" name="provjeraKod" type="submit" ng-click="printDiv('j')" >Ispiši statistiku</button>
    <br>

       <div id="j">    
 <table  style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Prikaz statistike bodova po korisniku</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:200px" custom-sort order="'id'" sort="sort">Korisnik&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">{{aktivnost}}&nbsp;</th>
                       
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
                     
                        <td>{{item.Korisnik}}</td>
                         <td>{{item.Bodova}}</td>
                       
                        
                       
                       
                    </tr>
                </tbody>
            </table>
     </div>                    
 <canvas style ="margin: 10px;" id="platno1" width="1000" height="400">
</canvas>
                                        
                         
                         
     <table  style = "margin-left: 0;width:100%" class="tablica1">
              <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  style="width:200px" >Legenda&nbsp;</th>
                      
                    </tr>
                </thead>
               
              
                <tbody class="tablica1">
                    <tr class="tablica1_redak1" ng-repeat="item in boje">
                     
                     <td style ="background-color:{{item.boja}}; color:black">   {{item.naziv}}</td>
                       
                        
                       
                       
                    </tr>
                </tbody>
            </table>  
                         
    
                        </div>








              
                </div>


            </div>

        </div>
 </div>

        </div>
