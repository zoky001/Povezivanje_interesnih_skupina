


        <div class="tijelo  tijeloAdmin">


            <div class="section">

                <div class="naslov">
                    <h1>Odabir dizajna stranica</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">









                        <div class="galerijaKupon">
 {if isset($dizajnPromjenaIF) && $dizajnPromjenaIF} 
                             <div  class="uspjeh" style="display: block;width:50%;margin-left: 25%;"> 
                                 <p>Uspješno izmjenjen dizajn područja interesa!!</p>
                             </div>
                           {/if}

                            <form style="text-align: left"  class="provjraKupona" method="post" name="OdabirDizajna"  
                                  action="dizajn.php">


                                <div class="naslov">
                                    <h4>{$podrucjeMOD}</h4>

                                </div>



                                <label  style="width: 50%"id = "Lnaziv" for="bojaBody">Boja pozadine (Body):      
                               </label>



                                <input style="width: 40%;" type="color" name="bojaBody" value="#F5FFDC" required>

                                <br>


                                <label  style="width: 50%"id = "Lnaziv" for="bojaSlova">Boja slova:      
                              </label>



                                <input id ="bojaSlova" style="width: 40%;" type="color" name="bojaSlova" value="#000000" required>

                                <br>
                                
                                
                                   <label  style="width: 50%"id = "Lnaziv" for="bojaSekcije">Boja pozadine sekcije:      
                               </label>



                                <input id ="bojaSekcije" style="width: 40%;" type="color" name="bojaSekcije" value="#EFFFC7" required>

                                <br>
                                
                                      <label  style="width: 50%"id = "Lnaziv" for="bojaObrubaSekcije">Boja obruba sekcije:      
                               </label>



                                <input id ="bojaObrubaSekcije" style="width: 40%;" type="color" name="bojaObrubaSekcije" value="#4E5247" required>

                                <br>



                                <input class="gumb" name="spremiDizajn" type="submit" value="Pohrani dizajn"> <br>









                            </form>


                        </div>


                    </div>
<!--
                    <div class="desnoOglasi">
                        <p >Trenutno aktivnih kupona:</p>

                        <h1>5</h1>

                    </div>-->
                </div>


            </div>

        </div>
  