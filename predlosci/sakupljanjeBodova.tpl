




        <div class="tijelo">


            <div class="section">

                <div class="naslov">
                    <h1>Pregled sakupljenih bodova</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">


                        <table class="tablica1" >
                            <caption class="tablica1">Ispis bodova</caption>

                            <thead class="tablica1">
                                <tr  class="tablica1_zaglavlje ">
                                    <th> Akcija</th>
                                    <th>Vrijeme</th>
                                    <th>Aktivnost</th>
                                    <th> Opis aktivnosti</th>
                                    <th> Broj bodova</th>



                                </tr>
                            </thead>

                            <tbody class="tablica1">


  {foreach from=$ispis  item=elem}
      <tr class="tablica1_redak1" {if $elem['Vrsta_prometa'] eq kupnja }style="background-color: #FF806F; "  {/if}>
                                   
   <td>
                                       {$elem['Vrsta_prometa']|upper}
                                    </td>
                                    <td>
                                        {$elem['Datum']|date_format:"%d.%m.%Y."}
                                    </td>

                                    <td>
                                      {$elem['Naziv_aktivnosti']}
                                    </td>

                                    <td>
                                        {$elem['Opis_aktivnosti']}
                                    </td>

                                    <td>
                                       {$elem['Kolicina_bodova']}
                                    </td>
                                    
                                  

                                </tr>

                      {/foreach}         



                            </tbody>
                        </table>  

                    </div>

                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>
                        
                        <h1>{$brojBodova}</h1>

                    </div>
                </div>


            </div>

        </div>
  