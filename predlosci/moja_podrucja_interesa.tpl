
 <div class="tijelo">
        <section id="sadrzaj">


            <div class="naslov">
                <h1 >  Moja područja interesa </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">


            
                
                   {foreach from=$ispisPodrucja  item=elem}


                
                
                     <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >{$elem['Naziv']}</h3>

                    <figure >
                        <img src="{$elem['URLSlike']}" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 

                    <a href="popis_diskusija.php?IDpodrucja={$elem['ID_podrucja_interesa']}"> <button class="btnNav"> Pregledaj diskusije</button>  </a>
                
                  

                </div>
                
                
                {/foreach}
                
                
                
         
            </div>




        </section>
     </div>

  
