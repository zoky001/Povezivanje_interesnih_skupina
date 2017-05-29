



        <div ng-app="kupon" ng-controller="cijelo" class="tijelo">


            <div class="section">
{if isset($ispisKupona) && $ispisKupona }
                <div class="naslov">
                    <h1>{$ispisKupona['Naziv_kupona']}  </h1>
               
                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">


                      


                        <div ng-init="izvor = '{$ispisKupona['Slika']} '"   class="galerijaKupon">
{if isset($kupljen) && $kupljen}
    {else if}
                            <div >
                                <a href="kosarica.php?IDkupona={$ispisKupona['ID_kupona']}&IDpodrucja={$ispisKupona['ID_podrucja']}">  <button class="gumbKupi" style="width: 100%"> U košaricu za - <b>{$ispisKupona['Min_broj_bodova']} </b> bodova</button></a>
                            </div>
{/if}
                            <div>
                                <img ng-src="{{izvor}}" style="width:100%; max-height: 400px;margin-bottom:-6px">
                              
                            </div>

                            <div style="text-align: left">
                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" ng-model="slika1" src="{$ispisKupona['Slika']}"style="max-width: 100%;height: 200px;">



                                </div>
                                
                                {if isset($galerija) && $galerija }
                                  {foreach from=$galerija item=elem}


                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" src="{$elem['Slika']}" style="max-width: 100%;height: 200px;">



                                </div>
{/foreach}
                                {/if}
                               




                            </div>
                            <br>
                            <hr style="width: 100%">
                            <br>
                            
                            {if isset({$ispisKupona['Video']}) && $ispisKupona['Video']}
                            <video width="400" controls>
                                <source src="https://www.youtube.com/watch?v=90JmmMbFKfw" type="video/mp4">
                                <source src="https://www.youtube.com/watch?v=90JmmMbFKfw" type="video/ogg">
                                Your browser does not support HTML5 video.
                            </video>
                            <br>
                            <hr style="width: 100%">
                            <br>

                            <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/XGSy3_Czz8k">
                            </iframe>
                            
                            {/if}
                            <br>
                            <hr style="width: 100%">
                            <br>


                            <div style="text-align: left">
                                <h3><b>Opis kupona</b></h3>
                                <p>{$ispisKupona['Opis_kupona']}</p>
                            </div>

                        </div>


                    </div>

                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>

                        <h1>{$brojBodova}</h1>

                    </div>
                </div>


            </div>
{/if}
        </div>
   