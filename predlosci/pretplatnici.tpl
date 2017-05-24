

        <div ng-app="pretplatnici" ng-controller="cjelo"  class="tijelo  tijeloAdmin">


            <section id="sadrzaj" >


                <div class = "naslov">
                    <h3><i>Popis pretplatnika</i> </h3>
                </div>
                <div class="asocijativna">
                    
                    
                    
                    <button ng-click="otvoriModal()" id="btnNovaObavijest" class="gumb" style="margin-left: -50%"> Pošalji obavijest korisnicima</button> 
                    
              <form id="novi_proizvod" method="post" name="novi_proizvod"  
                    action="pretplatnici.php" novalidate>



                  <div  ng-show="prikaziModal" id="myModalNovaObavijest" style="display: block"class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span ng-click="zatvoriModal()"class="close">&times;</span>


                              
                                <div class="naslov">
                                    <h1 >Nova obavijest </h1>

                                </div>

                                <div class="formaNovaDiskusija" style="text-align: left"> 


                                <div id="refreshDiv" style="display:none">
                                    <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                                </div>

                                    <label  id = "Lnaziv" for="naziv">Naslov:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>

                                    <input required ng-model="naslov" type="text" id="naziv"  name="naziv" > <br> 



                                <label   id = "Ltekst" for="opis">Text poruke:
                                    <img   id = "erOpis" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>  
                                <textarea required ng-model="tekstPoruke"style="margin-left: -50%"class = "opis_area" id= "tekst" name="tekstPoruke" rows="5" cols="100" placeholder="Ovdje unesite tekst poruke"></textarea><br>








                                <input class="gumb" name="obavjest" type="submit" value="Pošalji obavijest korisnicima"> <br>

                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                                </div>





                                <div class="naslov" style="background: white">
                                    <button ng-click="zatvoriModal()" type="button" id="btnZatvori"> Zatvori pregled</button> 

                                </div>








                            </div>

                        </div>







                        <table class="tablica1" >
                            <caption class="tablica1">Pretplatnici</caption>

                            <thead class="tablica1">
                                <tr  class="tablica1_zaglavlje sh480">
                                    <th>Odabir</th>
                                    <th >Ime</th>
                                    <th>Prezime</th>
                                   
                                    <th> Status</th>
                                    <th> Aktivnost</th>


                                </tr>
                            </thead>

                            <tbody class="tablica1">

{if isset($korisnici)&& $korisnici}
{foreach from=$korisnici  item=elem}
                                <tr class="tablica1_redak1" {if $elem['Blokiran'] eq "1" }style="background-color: #FF806F; "  {/if}>

                                    <td>
                                        <input type="checkbox" name="Odabir[]" value = "{$elem['email']}">
                                    </td>
                                    <td>

                                        {$elem['ime']}

                                    </td>

                                    <td >
                                       {$elem['prezime']}
                                    </td>

                                    <td>
                                       {$elem['Blokiran']|replace:"0":"Aktivan"|replace:"1":"Blokiran"}
                                    </td>

                                   
                                    <td>
                                        {if $elem['Blokiran'] eq "0"}
                                        <a href ="pretplatnici.php?IDkorisnika={$elem['korisnik_id']}&aktivnost=blokiraj">Blokiraj</a>
                                    {else}
                                     <a href ="pretplatnici.php?IDkorisnika={$elem['korisnik_id']}&aktivnost=odblokiraj">Odblokiraj</a>
                                    {/if}
                                    </td>


                                </tr>

           {/foreach}                   

{/if}

                            </tbody>
                        </table>








                    </form>



                </div>










            </section>



