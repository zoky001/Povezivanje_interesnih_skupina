


        <div ng-app="kosarica" ng-controller="cijelo" class="tijelo tijeloAdmin">

            <!-- modal diskusije-->
            <div ng-show="otvoriModal" style="display: block"id="myModalKod" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span ng-click="zatvoriModalKod()" class="close">&times;</span>



                    <div class="naslov">
                        <h1 >{{kodKupona[0].Naziv}} </h1>

                    </div>




                    <ul>
                        <li class="karticaDiskusije">
                            <h3 class="nazivPodrucjaInteresa" > <strong> KOD: </strong> {{kodKupona[0].Kod}}</h3>
                            <h3 class="nazivPodrucjaInteresa" > <strong> Datum kupnje: </strong> {{kodKupona[0].Datum}}</h3>
                        </li>



                    </ul>

                    <div class="naslov" style="background: white">
                        <button ng-click="zatvoriModalKod()" id="btnZatvori"> Zatvori pregled</button> 

                    </div>
                        
                         <div class="naslov" style="background: white">
                        <button onclick="myFunctionispis()" id="btnZatvori"> Ispis</button> 


<script>
function myFunctionispis() {
    window.print();
}
</script>
                    </div>








                </div>

            </div>
         



            <div class="section">

                <div class="naslov">
                    <h1>Košarica</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">




                        <div ng-show="kupljeniArtikli" class="galerijaKupon kosarica">

                        <a>  <button ng-click="PrikaziKosaricu()" class="btnNavL"> Artikli u košarici</button> </a>
                        <a>  <button ng-click="PrikaziKupljene()" class="btnNavD"> Kupljeni artiki</button> </a>


                            <h3>Kupljeni artikli</h3>

{foreach from=$ispisKupljenih  item=elem}
                            <div class="kupon">
                                <img src="{$elem['Slika']}"style="max-width: 100%;height: 200px;">
                                <p>{$elem['Naziv_kupona']}<br><b>Plačeno: {$elem['Iznos']}</b></p>

                                <div class="ikonaKupi">
                                     <button class="gumbKupnjaKupona" onclick="window.location.href = 'kupon.php?IDkupona={$elem['ID_kupona']}&IDpodrucja={$elem['ID_podrucja']}&kupljen=true'"> Pregled </button>
                                    <button ng-click="otovoriModalKod($event)" data-id="{$elem['ID_kupljlenoga']}" class="gumbKupnjaKupona"> Prikaži kod</button>
                                    <!-- data_id je id_kupljenog-->
                                </div>


                            </div>
{/foreach}


                  

                        </div>
                        <div ng-show="artikliKosarica"class="galerijaKupon kosarica">
    <a>  <button ng-click="PrikaziKosaricu()" class="btnNavL"> Artikli u košarici</button> </a>
                        <a>  <button ng-click="PrikaziKupljene()" class="btnNavD"> Kupljeni artiki</button> </a>


                            <h3>Artikli u  košarici</h3>

                            <div >
                                <button class="gumbKupi" style="width: 100%">Kupi sve u košarici </button>
                            </div>
{foreach from=$ispis  item=elem}
                            <div class="kupon">
                                <img src="{$elem['Slika']}"style="max-width: 100%;height: 200px;">
                                <p>{$elem['Naziv_kupona']}<br><b>{$elem['Min_broj_bodova']} bodova</b></p>

                                <div class="ikonaKupi">
                                    <button class="gumbKupnjaKupona" onclick="window.location.href = 'kupon.php?IDkupona={$elem['ID_kupona']}&IDpodrucja={$elem['ID_podrucja']}&kupljen=true'"> Pregled </button>
                                    <form  action="kosarica.php" method="post">  
                                       
                                        <input name = "IDstavke" value="{$elem['ID_stavke']}" style="display: none">
                                            
                                            
                                        
                                        <button class="gumbKupnjaKupona" type="submit" name="kupovina"> Kupi </button>
                                    
                                            </form>

                                </div>


                            </div>
                            
                            
                            {/foreach}
       
                        </div>


                    </div>
                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>

                        <h1>{$brojBodova}</h1>

                    </div>

                </div>

            </div>
  
