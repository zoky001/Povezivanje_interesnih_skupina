


        <div ng-app="popisDiskusija" ng-controller="cijelo" class="tijelo">

            <section id="sadrzaj" class="section1">

   <div class="naslov">
                    <h1 >{$NazivPodrucja} </h1>

                </div>
             



                <ul>
                    
                    {foreach from=$ispis  item=elem}
                    
                    
                    <li class="karticaDiskusije">
                        <a href="diskusija.php?IDdiskusije={$elem['ID_diskusije']}" > <h3 class="nazivPodrucjaInteresa" > {$elem['Naziv']} </h3></a>
                    </li>
                    
                       {/foreach}
                    
                    
                    
                   

                </ul>
                
                  <div class="naslov section1">
                       <button id="btnZatvori" ng-click="doTheBack()"> Povratak</button> 

                </div>


        </section>

 </div>

