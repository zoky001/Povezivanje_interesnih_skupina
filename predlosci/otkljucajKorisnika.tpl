






        <section id="sadrzaj" >


            <div class = "naslov">
                <h3><i>{$oNaslov} </i> </h3>
            </div>
            <div class="asocijativna">
                <table style="width: 90%;margin: 5px; margin-left: 5%;">
                   

                    <thead >
                        <tr  >
                            <th >Ime</th>
                            <th>Prezime</th>
                            <th>Korisničko ime</th>
                            <th>Akcija</th>

                        </tr>
                    </thead>
                    <tbody>



                       
                       {foreach from=$dohvatZakljucane item=value}







                         
                        <tr >
                            <td>
                            
{$value['ime'] }
                                
                            </td>

                            <td >
                             {$value['prezime'] }
                            </td>

                            <td>
                              {$value['korisnicko_ime']}
                            </td>

                            <td>
                                <a href = "otkljucavanje_korisnika.php?korisnik_ID={$value['korisnik_id']}"> Otkljucaj </a>
                            </td>

                           
                        </tr>
                       
                        
                        
                        {/foreach}
                        
                        
                    </tbody>
                </table>






            </div>










        </section>