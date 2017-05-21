     
{if $zadnjiIspisIF}
  <section id="sadrzaj">


            <div class = "naslov">
                <h1 > Uspješno obavljen upis podataka </h1>
                <h2> Vrijednost kolačiča je: {$zadnjiIspis }</h2>
            </div>
    
      
      
  </section>
{/if}

        <section id="sadrzaj">


            <div class = "naslov">
                <h1 >   Dodavanje novog proizvoda</h1>
            </div>

{if $sveZakljucajIF}
                <div id ="greskeRefresh" class="naslov obavjestRefresh" > 
                    <h1 class="obavjestRefresh">Proteklo je 5 minuta od učitavanja stranice, potrebno je pričekati još {$cekatiJos} i ponovno učitati stranicu!!</h1>
                </div>
{/if}

           {if $postojiGreska}
                <div id ="greske"> 

                    <ul id = "popisGresaka" style=" font-size: 12pt;">

              {if $g1}
                            <li class = "greske1">
                                <p>Naziv ne počinje velikim početnim slovom ili ne sadrži minimalno 5 znakova</p>
                            </li>
               {/if}

                         {if $g2}
                            <li class = "greske1">
                                <p>Naziv ne sadrži minimalno 5 slova</p>
                            </li>
                         {/if}

                      {if $g3}
                            <li class = "greske1">
                                <p>Upisan je nedozvoljeni znak npr( /, $, \, (, ), ', !, #, “, \, /)</p>
                            </li>
                       {/if}

                       {if $g4}
                            <li class = "greske1">
                                <p>Nije upisan naziv</p>
                            </li>
                         {/if}

                         {if $g5}
                            <li class = "greske1">
                                <p>Nije upisan opis proizvoda</p>
                            </li>
                        {/if}

                         {if $g6}
                            <li class = "greske1">
                                <p>Nije upisan datum proizvodnje</p>
                            </li>
                         {/if}

                       {if $g7}
                            <li class = "greske1">
                                <p>Nije upisano vrijeme proizvodnje</p>
                            </li>
                         {/if}

                       {if $g8}
                            <li class = "greske1">
                                <p>Nije odabrana količina proizvodnje</p>
                            </li>
                        {/if}

                        {if $g9}
                            <li class = "greske1">
                                <p>Nije upisana tezina proizvoda</p>
                            </li>
                        {/if}

                         {if $g10}
                            <li class = "greske1">
                                <p>Nije odabrana minimalno JEDNA kategorijja</p>
                            </li>
                        {/if}

                         {if $g11}
                            <li class = "greske1">
                                <p>Datum mora biti manji od današnjeg. (Uzorak: dd.mm.gggg.)</p>
                            </li>
                     {/if}

                        {if $g12}
                            <li class = "greske1">
                                <p>Pogrešan format datuma. (Uzorak: dd.mm.gggg.)</p>
                            </li>
                         {/if}

                    </ul>

                </div>

            {/if}

            <form class=" forma_unos_proiz" id="novi_proizvod" method="post" name="novi_proizvod"  
                  action="novi_proizvod.php" novalidate>

                <div id="refreshDiv" style="display:none">
                    <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                </div>


                <label  id = "Lnaziv" for="naziv">Naziv proizvoda:  
{if $gu1}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
{/if}
                </label>

                <input  type="text" id="naziv"  name="naziv" 
                        
                        {if $empNaziv }
                            value="{$eNaziv}"
                            
                            {/if}
                            
                            maxlength="15" size="15" 
                            
                           {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}
                        
                        
                        ><br>

                <label  id = "Lopis" for="opis"> Opis proizvoda:
                   {if $gu2}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
{/if}
                </label>  <br>
                <textarea class = "opis_area" id= "opis" name="opis" rows="50" cols="100" placeholder="Ovdje unesite opis proizvoda"    {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}  > 
                              
                              
                              {if $empOpis}
                                  
                                 {$eOpis}
                                  
                                  {/if}
                          
                          
                          
                          
                          </textarea><br>

                <label  id = "LdanPro" for="danPro">Datum proizvodnje:
                    {if $gu3}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                   {/if}
                </label>
                <input type="text" id="danPro" placeholder = "dd.mm.gggg." name="danPro" 
                       
                       {if $empDan}
                           value="{$eDan}" 
                           {/if}
                       
                       
                      {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}
                       
                       
                       ><br>

                <label  id = "LvriPro" for="vriPro">Vrijeme proizvodnje:
                    {if $gu4}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                    {/if}
                </label>
                <input type="time" id="vriPro" name="vriPro" 
                       
                       
                      {if $empVri}
                         value="{$eVri}"
                        
                      {/if}
                       
                       
                       {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}
                       
                       
                       
                       ><br>

                <label  id = "LkolPro" for="kolPro">Količina proizvodnje:
                  {if $gu5}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                   {/if}

                </label>
                <input type="number" id="kolPro"  min = "1" name="kolPro"
                       
                       
                       {if $empKol}
                           value="{$eKol}"
                       {/if}
                        {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}
                       
                       
                       
                       ><br>

                <label  id = "LtezPro" for="tezPro">Težina proizvoda:

                    {if $gu6}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
{/if}
                </label>
                <input type="range" id="tezPro" min="0" max="100" name="tezPro" {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}><br>

                <label for="kategorija">Kategorije:
                   {if $gu7}
                        <img  class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                   {/if}
                </label>


                <div style="float:left; width: 40%; text-align: left;">

                    <input type="checkbox" name="kategorija" id = "kategorija" value="0"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >Vozila
                    <br>
                    <input type="checkbox" checked="checked" name="kategorija" id = "kategorija0" value="1"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}>Hrana
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija1" value="2"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >Odjeća
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija2" value="3"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if}>Hobi alat
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija3" value="4"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >Prfesionalni alat
                    <br>
                    <input type="checkbox" name="kategorija" id = "kategorija4" value="5"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >Cvijeće
                    <br>
                </div>
                <br>

           
                <br>





                <input name ="submit" class="gumb" type="submit" value="Pošalji podatke"  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >

                <input  class="gumb" style ="color:red" id="reset1" type="reset" value="Inicijaliziraj "  {if $sveZakljucajIF}
                            
                           disabled
                            
                          {/if} >



            </form>




        </section>