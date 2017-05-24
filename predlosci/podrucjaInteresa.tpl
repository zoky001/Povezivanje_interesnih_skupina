        <div   class="tijelo" >
            
            
            
                    {if isset($coockieNeVrijediIF) && $coockieNeVrijediIF}
               <!-- modal registracija-->
        <div  style="display: block" id="myModal" class="modal">
        
        <!-- Modal content  coockie prihvat-->
            <div class="modal-content">
              


                <div class = "naslov">
                    <h3><i> Prihvačanje uvjeta korištenja </i> </h3>
                </div>



                <form   class="forma" id="uvjeti koristenja" method="post"  name="uvjeti"  
                        action="podrucja_interesa.php" >


                    <div>

                        <label style = "width: 90%; margin:5%;" for="ime">Za nastavak korištenja ovih stranica morate obavezno prihvatiti uvjete košištenja!!!!</label>
                    </div>
                   
  <input  style = "display: none" type="text" id="naziv"  name="coockieAccept" value = "1" ><br>






                    <input  class="gumb" type="submit" value="Prihvati uvjete korištenja">



                </form>






                

            </div>
    </div>
        
        {/if}
        
        
        
        
        <section id="sadrzaj">


            <div class="naslov">
                <h1 >   Popis područja interesa </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">

                   {foreach from=$ispisPodrucja  item=elem}


                
                
                     <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >{$elem['Naziv']}</h3>

                    <figure >
                        <img src="{$elem['URLSlike']}" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 

                    <a href="popis_diskusija.php?IDpodrucja={$elem['ID_podrucja']}"> <button class="btnNav"> Pregledaj diskusije</button>  </a>
                    <a href="moja_podrucja_interesa.php?IDpodrucja={$elem['ID_podrucja']}&add=true"><button class="btnNav"> Prati</button></a>
                  

                </div>
                
                
                {/foreach}

   
            </div>




        </section>
 </div>
