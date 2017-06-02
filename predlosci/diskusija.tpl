


        <div class="tijelo">
            
            
      

            <section id="sadrzaj" class="section1">

            <div class="naslov">
                <h1 >{$Diskusija['Naziv']} </h1>

            </div>



   <div class="temaDiskusije">
        
       <img src="{$Diskusija['slika']}" alt="Avatar" class="slikaKomntar" style="width:60px">
       <span class="vrijemekomentara"><strong>Datum otvranja diskusije: </strong>{$Diskusija['Datum_pocetka']|date_format:"%d. %m. %Y."}</span>
        <h4> {$Diskusija['ime']} {$Diskusija['prezime']}</h4>
        <br>
        <hr>
        <p>{$Diskusija['Opis_pravila']}</p>
       
        
         
       
        
        <a href="#newKomentar"><button type="button" class=""> Komentiraj </button> </a>
    </div>  
            {foreach from=$ispisKomentara item=elem}


<div class="komentar">
        
       <img src="{$elem['slika']}" alt="Avatar" class="slikaKomntar" style="width:60px">
        <span class="vrijemekomentara">{$elem['Vrijeme']|date_format:"%d. %m. %Y."}</span>
   
        <h4>{$elem['ime']} {$elem['prezime']}</h4>
        <br>
        <hr>
        <p>{$elem['Tekst']}</p>
       
        {if $pravo || $korisnikID eq $elem['ID_korisnika']}
        <a href="diskusija.php?IDdiskusije={$Diskusija['ID_diskusije']}&obrisi=komentari&ID={$elem['ID_komentara']}"> <button type="button" class="">Obrisi</button> </a>
       
        {/if}
        
        <!--
        <button type="button" class=""> Comment</button> 
        -->
    </div>  


{/foreach}
            
               
            
            {if $pravoKomentiranjaIF}
             <div class="noviKomentar">
                 
                 
                 <form  id="newKomentar"  method="post" name="noviKomentar"  
               action="diskusija.php?IDdiskusije={$Diskusija['ID_diskusije']}">
                     <textarea style="width:100%"name="komentar" rows="4"  placeholder="Upišite komentar" required></textarea><br>
                     <input style="width:100%"class="btn" type="submit" name="submit" value="Komentiraj">
                 </form>
              
              
            </div>

{/if}
        </section>

  </div>
     
