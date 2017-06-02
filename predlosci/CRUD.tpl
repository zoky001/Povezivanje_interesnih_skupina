

        <div ng-app="crud" ng-controller="ctrlRead" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1> CRUD - tablica iz baze podataka </h1>

                </div>


                <div style="width: 100%;">
                    <div   class="glavniDio" style="width: 98%" >

                        <nav style="width:20%;">

                            <h4> TABLICE: </h4>
                          
                            <ul>
                             
                                    <li> <a href="CRUD.php?show=aktivnosti">Akivnosti</a></li>
                                    <li> <a href="CRUD.php?show=blokiraniKorisnici">Blokirani korisnici</a></li>
                             <li> <a href="CRUD.php?show=diskusije">Diskusije</a></li>
                             <li> <a href="CRUD.php?show=dizajn">Dizajn</a></li>
                             <li> <a href="CRUD.php?show=dnevnik_rada">Dnevnik rada</a></li>
                             <li> <a href="CRUD.php?show=komentari">Komentari</a></li>
                             <li> <a href="CRUD.php?show=kosarica">Košarica</a></li>
                                 <li> <a href="CRUD.php?show=korisnik">Korisnik</a></li>
                             <li> <a href="CRUD.php?show=kupljeni_kuponi">Kupljeni kuponi</a></li>
                             <li> <a href="CRUD.php?show=kuponi_clanstva">Kuponi clanstva</a></li>
                             <li> <a href="CRUD.php?show=kuponi_podrucja">Kuponi-podrucja</a></li>
                             <li> <a href="CRUD.php?show=moderatori_podrucja">Moderatori-podrucja</a></li>
                             <li> <a href="CRUD.php?show=aktivnosti">Akivnosti</a></li>
                             <li> <a href="CRUD.php?show=odabrana_podrucja_interesa"> O. P. Interesa</a></li>
                            <li> <a href="CRUD.php?show=podrucja_interesa">Podrucja interesa</a></li>
                            <li> <a href="CRUD.php?show=postavke">Postavke</a></li>
                            <li> <a href="CRUD.php?show=promet_bodova">Promet bodova</a></li>
                            <li> <a href="CRUD.php?show=slikeKuponi">Slike Kuponi</a></li>
                            <li> <a href="CRUD.php?show=tip_korisnika">Tip korisnika</a></li>
                            </ul>


                        </nav>

                        <div class="galerija">
                         

                            
                            
                               {if isset($uspjehBrisanje) && $uspjehBrisanje}
                                   
                                     <div  class="uspjeh" style="display: block;width:50%;margin-left: 25%;"> 
                                 <p>Uspješno izvršena operacija!!</p>
                             </div>
                                   
                                   {/if}
                                    {if isset($uspjehBrisanje) && !$uspjehBrisanje}
                                   
                                     <div  class="greske" style="display: block;width:50%;margin-left: 25%;"> 
                                 <p>Neuspješno izvršena operacija!!</p>
                             </div>
                                   
                                   {/if}
                                   

                                   
                                   
   
 {if isset($korisnik) && $korisnik}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica korisnika</h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikaziTablicu('korisnici')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     <br>
     <form ng-show="prikazIzmjene"  class="formaNovaDiskusija" method="post" name="Diskusija"  
                                  action="CRUD.php">

                    
                                
                               
         <div style="text-align: left;">
                               

                                <input style="display: none" ng-model="korisnik_id" type="text" id="naziv"  name="korisnik_id"  value="{{korisnik_id}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">ime:      
                               </label>

                                <input  ng-model="ime"  type="text" id="naziv"  name="ime"  value="{{ime}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">prezime:      
                               </label>

                                <input    ng-model="prezime" type="text" id="naziv"  name="prezime"  value="{{prezime}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">korisnicko_ime:      
                               </label>

                                <input   ng-model="korisnicko_ime"  type="text" id="naziv"  name="korisnicko_ime"  value="{{korisnicko_ime}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">email:      
                               </label>

                                <input  ng-model="email" type="text" id="naziv"  name="email"  value="{{email}}" required > <br> 
                                
                                
                                
                                 <label  id = "Lnaziv" for="naziv">lozinka:      
                               </label>

                                <input ng-model="lozinka"  type="text" id="naziv"  name="lozinka"  value="{{lozinka}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">lozinka_SHA:      
                               </label>

                                <input  ng-model="lozinka_SHA" type="text" id="naziv"  name="lozinka_SHA"  value="{{lozinka_SHA}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">tip_korisnika:      
                               </label>

                                <input   ng-model="tip_korisnika" type="text" id="naziv"  name="tip_korisnika"  value="{{tip_korisnika}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">verifikacijski_kod:      
                               </label>

                                <input  ng-model="verifikacijski_kod" type="text" id="naziv"  name="verifikacijski_kod"  value="{{verifikacijski_kod}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">verificirano:      
                               </label>

                                <input  ng-model="verificirano" type="text" id="naziv"  name="verificirano"  value="{{verificirano}}" required > <br> 
                                
                                
          
                                
                                
                                
                                   <label  id = "Lnaziv" for="naziv">broj_neuspjesnih_prijava:      
                               </label>

                                <input   ng-model="broj_neuspjesnih_prijava" type="text" id="naziv"  name="broj_neuspjesnih_prijava"  value="{{broj_neuspjesnih_prijava}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">prijavaDvaKoraka	:      
                               </label>

                                <input  ng-model="prijavaDvaKoraka" type="text" id="naziv"  name="prijavaDvaKoraka"  value="{{prijavaDvaKoraka}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">salt:      
                               </label>

                                <input   ng-model="salt" type="text" id="naziv"  name="salt"  value="{{salt}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">dvaKorakaKod:      
                               </label>

                                <input ng-model="dvaKorakaKod"  type="text" id="naziv"  name="dvaKorakaKod"  value="{{dvaKorakaKod}}"> <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">vrijemeRegistracije:      
                               </label>

                                <input   ng-model="vrijemeRegistracije" type="text" id="naziv"  name="vrijemeRegistracije"  value="{{vrijemeRegistracije}}" required > <br> 
                                
                                
                                
                                
                                   <label  id = "Lnaziv" for="naziv">vrijemeSlanjaKoda:      
                               </label>

                                <input  ng-model="vrijemeSlanjaKoda" type="text" id="naziv"  name="vrijemeSlanjaKoda"  value="{{vrijemeSlanjaKoda}}" > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">slika:      
                               </label>

                                <input  ng-model="slika" type="text" id="naziv"  name="slika"  value="{{slika}}" required > <br> 
                         
</div> 
                                <div style="margin-left:-25%">
                                <input style="margin-left:-25%" class= "gumb" type ="submit"  name="izmjenaKorisnika" value="Izmjeni korisnika">
                                <br>
                                <input style="margin-left:-25%" class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">
                                </div>


                            </form>
                                
                                
                                
     
     <br>
     <div style="overflow: scroll; max-width: 100%">
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "korisnici"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">korisnik_id&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ime&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">prezime&nbsp;</th>
                       
                      
                         <th  custom-sort order="'id'" sort="sort">korisnicko_ime&nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">email&nbsp;</th>
                     
                       <th  custom-sort order="'name'" sort="sort">lozinka&nbsp;</th>
                       
                       <th  custom-sort order="'id'" sort="sort">lozinka_SHA&nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">tip_korisnika&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">verifikacijski_kod&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">verificirano&nbsp;</th>
                       
                       <th  custom-sort order="'id'" sort="sort">broj_neuspjesnih_prijava&nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">prijavaDvaKoraka &nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">salt&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">dvaKorakaKod&nbsp;</th>
                       
                       
                       <th  custom-sort order="'id'" sort="sort">vrijemeRegistracije&nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">vrijemeSlanjaKoda &nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">slika&nbsp;</th>
                    
                       
                       
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
                        <TD>
                            <A href="CRUD.php?obrisi=korisnici&ID={{item.korisnik_id}}">OBRISI</A>
                              <a  ng-click="izmjenaPopuni($event)"  data-id="{{item}}" href="">IZMJENI</a>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </TD>
                        <td>{{item.korisnik_id}}</td>
                         <td>{{item.ime}}</td>
                              <td>{{item.prezime}}</td>
                              
                               <td>{{item.korisnicko_ime}}</td>
                         <td>{{item.email}}</td>
                              <td>{{item.lozinka}}</td>
                              
                                 <td>{{item.lozinka_SHA}}</td>
                         <td>{{item.tip_korisnika}}</td>
                              <td>{{item.verifikacijski_kod}}</td>
                      <td>{{item.verificirano}}</td>
                      
                      
                                   <td>{{item.broj_neuspjesnih_prijava}}</td>
                         <td>{{item.prijavaDvaKoraka }}</td>
                         
                        
                              
                           <td>{{item. salt}}</td>
                         <td>{{item.dvaKorakaKod}}</td>
                              <td>{{item.vrijemeRegistracije}}</td>
                      <td>{{item.vrijemeSlanjaKoda}}</td>
                     
                      
                         <td>{{item.slika}}</td>
                    </tr>
                </tbody>
            </table>
                    
 </div>
    
                                
                               
    {/if}                                
                                   
                                   
                                   
                                   
                                   
 {if isset($aktivnosti) && $aktivnosti}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica Aktivnosti </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikaziTablicu('aktivnosti')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
        <form ng-show="prikazIzmjeneAKT"  class="formaNovaDiskusija"  method="post" name="Diskusija"  
              action="CRUD.php">
            
            
             <div style="text-align: left;">
                               

                                <input style="display: none" ng-model="ID_aktivnosti" type="text" id="naziv"  name="ID_aktivnosti"  value="{{ID_aktivnosti}}" required > <br> 
                                
                                <label  id = "Lnaziv" for="naziv"> Naziv:      
                               </label>

                                <input  ng-model="naziv"  type="text" id="naziv"  name="naziv"  value="{{naziv}}" required > <br> 
                                
                                   <label  id = "Lnaziv" for="naziv">Opis:      
                               </label>
<input  ng-model="opis"  type="text" id="naziv"  name="opis"  value="{{opis}}" required > <br> 
                                
                               

             </div>   
  <div style="margin-left:-25%">
                                <input style="margin-left:-25%" class= "gumb" type ="submit"  name="izmjenaAktivnosti" value="Izmjeni">
                                <br>
                                <input style="margin-left:-25%" class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">
                                </div>
            
        </form>
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Aktivnosti"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_aktivnosti&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Naziv_aktivnosti&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Opis_aktivnosti&nbsp;</th>
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
                      
                        
              
                        
                        <TD>
                            <A href="CRUD.php?obrisi=aktivnosti&ID={{item.ID_aktivnosti}}">OBRISI</A>
                               <a  ng-click="izmjenaPopuniAKT($event)"  data-id="{{item}}" href="">IZMJENI</a>
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </TD>
                        <td>{{item.ID_aktivnosti}}</td>
                         <td>{{item.Naziv_aktivnosti}}</td>
                              <td>{{item.Opis_aktivnosti}}</td>
                      
                       
                     
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
 {if isset($blokiraniKorisnici) && $blokiraniKorisnici}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Blokirani korisnici" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikaziTablicu('blokiraniKorisnici')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Blokirani korisnici"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">IDkorisnika&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">IDpodrucja&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Zabranio&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">datumZabrane&nbsp;</th>
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
                        <TD>
                            <A href="CRUD.php?obrisi=blokiraniKorisnici&ID={{item.IDkorisnika}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </TD>
                        <td>{{item.IDkorisnika}}</td>
                         <td>{{item.IDpodrucja}}</td>
                              <td>{{item.Zabranio}}</td>
                         <td>{{item.datumZabrane}}</td>
                       
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
     {if isset($diskusije) && $diskusije}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Diskusije" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikaziTablicu('diskusije')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Diskusije"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_diskusije&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Naziv&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Datum_pocetka&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Datum_zavrsetka&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Opis_pravila&nbsp;</th>
                         <th  custom-sort order="'name'" sort="sort">ID_podrucja_interesa&nbsp;</th>
                          <th  custom-sort order="'name'" sort="sort">ID_moderatora&nbsp;</th>
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
                        <TD>
                            <A href="CRUD.php?obrisi=diskusije&ID={{item.ID_diskusije}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </TD>
                        <td>{{item.ID_diskusije}}</td>
                         <td>{{item.Naziv}}</td>
                              <td>{{item.Datum_pocetka}}</td>
                         <td>{{item.Datum_zavrsetka}}</td>
                        <td>{{item.Opis_pravila}}</td>
                         <td>{{item.ID_podrucja_interesa}}</td>
                          <td>{{item.ID_moderatora}}</td>
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
        {if isset($dizajn) && $dizajn}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Dizajn" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>

   <input ng-click="prikaziTablicu('dizajn')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Dizajn"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                       
                        <th  custom-sort order="'id'" sort="sort">bojaPozadine&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">bojaSlova&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">bojaPozadineSekcije&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">bojaObrubaSekcije&nbsp;</th>
                      
                         <th  custom-sort order="'name'" sort="sort">ID_podrucja_interesa&nbsp;</th>
                       
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
                       
                        <td>{{item.bojaPozadine}}</td>
                         <td>{{item.bojaSlova}}</td>
                              <td>{{item.bojaPozadineSekcije}}</td>
                         <td>{{item.bojaObrubaSekcije}}</td>
                        <td>{{item.podrucja_interesa}}</td>
                         
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
       {if isset($dnevnik_rada) && $dnevnik_rada}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Dnevnik rada" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('dnevnikRada')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Dnevnik rada"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_dnevnik_rada&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">vrijeme&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">aktivnosti&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_korisnika&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Adresa&nbsp;</th>
                         <th  custom-sort order="'name'" sort="sort">skripta&nbsp;</th>
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=dnevnikRada&ID={{item.ID_dnevnik_rada}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_dnevnik_rada}}</td>
                       
                              <td>{{item.vrijeme}}</td>
                         <td>{{item.aktivnosti}}</td>
                        <td>{{item.ID_korisnika}}</td>
                         <td>{{item.adresa}}</td>
                          <td>{{item.skripta}}</td>
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
       {if isset($komentari) && $komentari}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Komentari" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('komentari')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Komentari"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_komentara&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Tekst&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Vrijeme&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_diskusije&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_korisnika&nbsp;</th>
                   
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=komentari&ID={{item.ID_komentara}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_komentara}}</td>
                       
                              <td>{{item.Tekst}}</td>
                         <td>{{item.Vrijeme}}</td>
                        <td>{{item.ID_diskusije}}</td>
                         <td>{{item.ID_korisnika}}</td>
                        
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
       {if isset($kosarica) && $kosarica}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Košarica" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('kosarica')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Kosarica"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_stavke&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Vrijeme&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">ID_kupona&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_korisnika&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_podrucja&nbsp;</th>
                      <th  custom-sort order="'name'" sort="sort">Potvrda_kupovine&nbsp;</th>
                   
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=kosarica&ID={{item.ID_stavke}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_stavke}}</td>
                       
                              <td>{{item.Vrijeme}}</td>
                         <td>{{item.ID_kupona}}</td>
                        <td>{{item.ID_korisnika}}</td>
                         <td>{{item.ID_podrucja}}</td>
                          <td>{{item.Potvrda_kupovine}}</td>
                       
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
           {if isset($kupljeniKuponi) && $kupljeniKuponi}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Kupljeni kuponi" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('kupljeniKuponi')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Kupljeni kuponi"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_kupljenoga&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Generirani_kod&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">ID_kupona&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">ID_korisnika&nbsp;</th>
                       
                      <th  custom-sort order="'name'" sort="sort">Datum_kupnje&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Iznos&nbsp;</th>
                    <th  custom-sort order="'name'" sort="sort">ID_podrucja&nbsp;</th>
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=kupljeniKuponi&ID={{item.ID_kupljenoga}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_kupljenoga}}</td>
                       
                              <td>{{item.Generirai_kod}}</td>
                         <td>{{item.ID_kupona}}</td>
                        <td>{{item.ID_korisnika}}</td>
                         <td>{{item.Datum_kupnje}}</td>
                          <td>{{item.Iznos}}</td>
                     
                        <td>{{item.ID_podrucja}}</td>
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
         {if isset($podrucja_interesa) && $podrucja_interesa}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Područja interesa" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('podrucjaInteresa')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Podrucja interesa"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_podrucja&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Naziv&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Opis_podrucja&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">URLSlike&nbsp;</th>
                       
                     
                   
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=podrucjainteresa&ID={{item.ID_podrucja}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_podrucja}}</td>
                       
                              <td>{{item.Naziv}}</td>
                         <td>{{item.Opis_podrucja}}</td>
                        <td>{{item.URLSlike}}</td>
                       
                     
                      
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
         {if isset($kuponiClanstva) && $kuponiClanstva}
    
     <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  >


                                 <div class="naslov">
                                
 <h3> Tablica "Kuponi clanstva" </h3> 
                            </div>

         <div style="margin-left: 33%"> 


<br>
  
                             

   <input ng-click="prikaziTablicu('kuponiClanstva')" style="margin-left: -25%"class="gumb" type="submit" value="Dohvati podatke"> <br>


         </div>






                            </form>
     
     <br>
     
     
     <table ng-show="prikazTablice" style = "margin-left: 0;width:100%" class="tablica1">
                                     <caption class="tablica1">Tablica "Kuponi clanstva"</caption>
                <thead class="tablica1">

                    <tr class="tablica1_zaglavlje sh480">
                        <th  custom-sort order="'id'" sort="sort">AKCIJA &nbsp;</th>
                        <th  custom-sort order="'id'" sort="sort">ID_kupona&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Naziv_kupona&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Opis_kupona&nbsp;</th>
                        <th  custom-sort order="'name'" sort="sort">Slika&nbsp;</th>
                       
                      <th  custom-sort order="'name'" sort="sort">PDF&nbsp;</th>
                       <th  custom-sort order="'name'" sort="sort">Video&nbsp;</th>
                   
                          
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
                        <td>
                            <A href="CRUD.php?obrisi=kuponiClanstva&ID={{item.ID_kupona}}">OBRISI</A>
                            
                            <!--
                            <a ng-click="prikazIzmjenaAktivnosti({{item}})" href="">IZMJENI</a>
                            
                            -->
                        </td>
                        <td>{{item.ID_kupona}}</td>
                       
                              <td>{{item.Naziv_kupona}}</td>
                         <td>{{item.Opis_kupona}}</td>
                        <td>{{item.Slika}}</td>
                         <td>{{item.PDF}}</td>
                          <td>{{item.Video}}</td>
                     
                      
                    </tr>
                </tbody>
            </table>
    
                                
                               
    {/if}
    
    
    
                    
    

                        </div>


                    </div>





                </div>


            </div>

        </div>
