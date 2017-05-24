

        <div class="tijelo">


            <div class="section">

                <div class="naslov">
                    <h1>Popis kupona za kupnju</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4>Popis kategorija:</h4>
                            <ul>
                                {foreach from=$ispisPodrucja  item=elem}
                                    <li> <a href="pregled_kupona.php?IDpodrucja={$elem['ID_podrucja_interesa']}">{$elem['Naziv']}</a></li>
                                
                                {/foreach}
                            </ul>


                        </nav>

                        <div class="galerija">
                            
                            {if isset($ispisKupona) && $ispisKupona}
                            <h3 style="text-align: left; margin-left: 20px;">{$ispisKupona[0]['Naziv']}  </h3> 

                            <div style="text-align: left">
                                
                                
                                {foreach from=$ispisKupona  item=elem}
                                <div class="kupon">
                                    <img src="{$elem['Slika']}"style="max-width: 100%;height: 200px;">
                                    <p>{$elem['Naziv_kupona']}<br><b><strong>CIJENA: </strong>{$elem['Min_broj_bodova']}</b></p>

                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona" onclick="window.location.href='kupon.php?IDkupona={$elem['ID_kupona']}&IDpodrucja={$elem['ID_podrucja']}'"> Pregled </button>
                                        <a href="kosarica.php?IDkupona={$elem['ID_kupona']}&IDpodrucja={$elem['ID_podrucja']}"><button class="gumbKupnjaKupona">U košaricu</button></a>
                                       
                                    </div>
                                    
                                    
                                </div>
                                
                                {/foreach}
                            
                            </div>

{/if}
                        </div>


                    </div>

                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>

                        <h1>{$brojBodova}</h1>

                    </div>
                </div>


            </div>

        </div>
