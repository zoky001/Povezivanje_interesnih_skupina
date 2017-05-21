


        <section id="sadrzaj">






            <div class = "naslov">
                <h3><i> {$naslovPrijava}</i> </h3>
            </div>

   {if $postojiUspjeh}
           
                <div style="width:100% ">


                    <div id ="uspjeh" style="width:50%;margin-left: 25%"> 

{foreach from=$Uspjeh item=elem}
    
<p>{$elem}</p>

{/foreach}
                    
                    </div>
                </div>
          
    {/if}

{if $postojiGreska}
          


                <div id ="greske" style="width:50%;margin-left: 25%"> 

{foreach from=$Greska item=elem}
    
<p>{$elem}</p>

{/foreach}
                  
                </div>

        
{/if}

{if $Prijavljen}
           
                <form class="forma"  style="width:50%; margin-left: 25%" id="prijava" method="post" name="prijava novalidate"  
                      action="prijava.php">




                    <label  id = "Lkorime" for="korime">Korisničko ime:</label>
                    <input  required type="text" id="korime" name="korime"
                            {if $empIme}
                            value="{$KorIme}"
                            {/if}
                            > <br> 



                    <label   id = "Llozinka" for="lozinka">Lozinka:</label>
                    <input  required type="password" id="lozinka" name="lozinka" 
                            
                           {if $empLoz}
                            value="{$Lozinka}"
                            
                            {/if}
                            
                            
                            >  <br> 
              {if $PrijavaDvaKoraka}
                
                        <label  id = "kodzaprijavu" for="korime">{$PrijavaDvaKorakaTekst}</label>
                        <input  required type="text" id="kodzaprijavu" name="kodPrijava"> 
                                
{/if}
                    <br> 
                    <label  id = "reg" > <a href="registracija.php" class="reg">Registracija  </a></label> 



                    <input class="gumb" type="submit" name ="submit" value="Prijavi se">



                </form>

           {/if}







            <div class = "footer_left" style = "margin-left: 20%; width: 60%">
                <p class = " vrijeme_izrade"><strong>Korisničko ime:</strong> {$kor1} <br>
                    <strong>Lozinka:</strong> {$loz1}</p>

                <br>
                <p class = " vrijeme_izrade"><strong>Korisničko ime (admin):</strong>{$kor2} <br>
                    <strong>Lozinka:</strong> {$loz2}</p>
                <br>
                <p class = " vrijeme_izrade"><strong>Korisničko ime (moderator):</strong>{$kor3}  <br>
                    <strong>Lozinka:</strong> {$loz3} </p>
                <br>
                <p class = " vrijeme_izrade"><strong>Korisničko ime (dva koraka):</strong>{$kor4} <br>
                    <strong>Lozinka:</strong> {$loz4} </p>
            </div>







        </section>