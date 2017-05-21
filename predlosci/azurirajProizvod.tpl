



        <section id="sadrzaj">


            <div class = "naslov">
                <h1 >  {$sNaslov}</h1>
            </div>
            
            
{if $izmjenaIF}
    
  
    
    

            
            <form class=" forma_unos_proiz" id="novi_proizvod" method="post" name="novi_proizvod"  
                  action="azuriraj_proizvod.php" novalidate>

            

                <label  id = "Lnaziv" for="naziv">Naziv proizvoda:  

                    <input  style="display: none"type="text" id="naziv"  name="id"   maxlength="15" size="15"  value= "{$Podatci['ID_proizvoda'] }"  >

                </label>

                <input  type="text" id="naziv"  name="naziv"   maxlength="15" size="15"  value= "{$Podatci['Naziv']}"  ><br>

                <label  id = "Lopis" for="opis"> Opis proizvoda:



                </label>  <br>
                <textarea class = "opis_area" id= "opis" name="opis" rows="50" cols="100" placeholder="Ovdje unesite opis proizvoda">  {$Podatci['Opis']} </textarea>  <br>

                <label  id = "LdanPro" for="danPro">Datum proizvodnje:



                </label>
                <input type="date" id="danPro" placeholder = "dd.mm.gggg." name="danPro" value= "{$Podatci['Datum']}" ><br>

                <label  id = "LvriPro" for="vriPro"  >Vrijeme proizvodnje:



                </label>
                <input type="time" id="vriPro" name="vriPro" value=  "{$Podatci['Vrijeme']}"><br>

                <label  id = "LkolPro" for="kolPro">Količina proizvodnje:




                </label>
                <input type="number" id="kolPro"  min = "1" name="kolPro"  value= "{$Podatci['Kolicina']}"><br>

                <label  id = "LtezPro" for="tezPro">Težina proizvoda:



                </label>
                <input type="range" id="tezPro" min="0" max="100" name="tezPro" value= "{$Podatci['Tezina']}"><br>

                <label for="kategorija">Kategorije:



                </label>


                <div style="float:left; width: 40%; text-align: left;">

                    <input type="checkbox" name="kategorija" id = "kategorija" value="0" >Vozila
                    <br>
                    <input type="checkbox" checked="checked" name="kategorija" id = "kategorija0" value="1" >Hrana
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija1" value="2" >Odjeća
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija2" value="3" >Hobi alat
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija3" value="4" >Prfesionalni alat
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija4" value="5" >Cvijeće
                    <br>
                </div>
                <br>

        
                <br>





                <input name ="submit" class="gumb" type="submit" value="Pošalji podatke" >

                <input  class="gumb" style ="color:red" id="reset1" type="reset" value="Inicijaliziraj ">



            </form>
            
       {/if}

            <div class="popis_proizvoda">



                <table class="tablica1" >
                    <caption class="tablica1">Popis proizvoda</caption>

                    <thead class="tablica1">
                        <tr  class="tablica1_zaglavlje sh480">
                            <th >Naziv proizvoda</th>
                            <th>Opis proizvoda</th>
                            <th>Datum proizvodnje</th>
                            <th>Vrijeme proizvodnje</th>
                            <th  >Količina proizvoda</th>
                            <th >Težina proizvoda</th>
                            <th >Akcija</th>
                        </tr>
                    </thead>

                    <tbody class="tablica1">
                        
                       

                  
                      {foreach from=$ispisProizvoda  item=row}


                            
                            

                               <tr class='tablica1_redak1 s480'>
                            <td>
                                
                                  {$row['Naziv']}
                                
                            </td>

                            <td class='opis_proizvoda'>
                              
{$row['Opis']}

                            </td>

                            <td>
                                {$row['Datum']}
                            </td>

                            <td>
                              {$row['Vrijeme']}
                            </td>

                            <td>
                                 {$row['Kolicina']} kom
                            </td>

                            <td>
                                {$row['Tezina']} kg
                            </td>

                            <td>
                                <a href = "azuriraj_proizvod.php?izmjeni={$row['ID_proizvoda']}"  >Izmjeni</a>
                            </td>
                        </tr>
                            
                      {/foreach}
                     
                        

                    </tbody>
                </table>

            </div>




        </section>