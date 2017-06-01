

        <div ng-app="log" ng-controller="ctrlRead" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Pregled zaključanih korisnika </h1>

                </div>


                <div style="width: 100%;">
                    <div   class="glavniDio" style="width: 98%" >

                        <nav style="width:20%;">

                            <h4> PREGLED: </h4>
                          
                            <ul>
                             
                                    <li ng-click="dohvatiZakljucane()" > <a>ZAKLJUČANI</a></li>
                                    <li ng-click="dohvatiOtkljucane()"> <a>OTKLJUČANI</a></li>
                             
                            </ul>


                        </nav>

                        <div class="galerija">
                         



    
                            <div ng-show ="prikazKorisnikaOTK">

                                 <div class="naslov">
                                
 <h3> Upravljanje korisnicima </h3> 
                            </div>
     
      <table  style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Prikaz korisnika</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                         <th  custom-sort order="'name'" sort="sort">Ime &nbsp;</th> 
                         <th  custom-sort order="'name'" sort="sort">Prezime &nbsp;</th>
                        <th  style="width:200px" custom-sort order="'id'" sort="sort">Aktivnost&nbsp;</th>
                       
                       
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
                    <tr class="tablica1_redak1" style="background-color:{{boja}}"  ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse">
                     
                        <td>{{item.Ime}}</td>
                         <td>{{item.Prezime}}</td>
                       <td><a href =otkljucavanjeKorisnika.php?{{gget}}={{item.Korisnik}}>{{akcija}}</a></td>
                        
                       
                       
                    </tr>
                </tbody>
            </table>
    
                                
                        </div>                        
 
    
    
    
 
    
                    
    

 


    
  
                        </div>


                    </div>





                   
                </div>


            </div>

        </div>
