


        <div ng-app="popisDiskusija" ng-controller="cijelo" class="tijelo">

        <section id="sadrzaj">

   <div class="naslov">
                    <h1 >{$NazivPodrucja} </h1>

                </div>
             
   <div class="naslov" style="background: white">
                       <button id="btnUspjeh"> Dodaj područje interesa </button> 

                </div>


                <ul>
                    
                    {foreach from=$ispis  item=elem}
                    
                    
                    <li class="karticaDiskusije">
                        <a href="diskusija.php?IDdiskusije={$elem['ID_diskusije']}" > <h3 class="nazivPodrucjaInteresa" > {$elem['Naziv']} </h3></a>
                    </li>
                    
                       {/foreach}
                    
                    
                    
                   

                </ul>
                
                  <div class="naslov" style="background: white">
                       <button id="btnZatvori" ng-click="doTheBack()"> Povratak</button> 

                </div>


        </section>

 </div>

