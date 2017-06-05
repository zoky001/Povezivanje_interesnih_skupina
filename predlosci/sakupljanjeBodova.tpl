




        <div ng-app="pregledbodova" ng-controller="bodovi" class="tijelo">

            

           
            <div class="section">

                <div class="naslov">
                    <h1>Pregled sakupljenih bodova</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">
                            <form style="text-align: left"  class="provjraKupona"  name="ProvjeraKoda"  
                                  >

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikazSve({$ID},'sve')" style="margin-left: -25%"class="gumb" type="submit" value="Prikaži sve zapise"> <br>
 <input ng-click="prikazSve({$ID},'zarada')" style="margin-left: -25%"class="gumb" type="submit" value="Prikaži zarađene"> <br>
  <input ng-click="prikazSve({$ID},'kupnja')" style="margin-left: -25%"class="gumb" type="submit" value="Prikaži potrošene"> <br>

         </div>






                            </form>
  <br>
  <div ng-show="prikazTablice" >
   <p>  
                                   <label  style="width: 20%"id = "Lnaziv" for="naziv">Traži:      
                               </label> <input type="text" ng-model="test"></p>
     
 <table  style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "korisnici"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">Akcija &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">Vrijeme&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Aktivnost&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Opis aktivnosti&nbsp;</th>
                         <th  custom-sort order="'name'" sort="sort">Broj bodova&nbsp;</th>
                      
                     
                    
                       
                       
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
                    <tr class="tablica1_redak1" ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse | filter:test">
                      
                        <td>{{item.Akcija}}</td>
                         <td>{{item.Vrijeme}}</td>
                              <td>{{item.Aktivnost}}</td>
                              
                               <td>{{item.Opis}}</td>
                         <td>{{item.Broj}}</td>
                           
                    </tr>
                </tbody>
            </table>

</div>
                      

                    </div>

                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>
                        
                        <h1>{$brojBodova}</h1>

                    </div>
                </div>


            </div>

        </div>
  