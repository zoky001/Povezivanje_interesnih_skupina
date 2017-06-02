

        <div ng-app="diskusijeModerator" ng-controller="cijelo" class="tijelo"  >


            <div class="section">

                <div class="naslov">
                    <h1>Uređenje postavki profila </h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio" style="width:99%;">

                      
                        <div class="galerija" style="width: 50%; margin-left: 25%">
                         
{if isset($Tema) && $Tema}
    
                            <div style="text-align: left">
                                 <div class="naslov">
                                <h3 >{$Tema['ime']} {$Tema['prezime']} </h3>

                            </div>
                                 
                               <form class="formaNovaDiskusija" method="post" name="Diskusija"  
                                  action="postavkeProfila.php" enctype="multipart/form-data">

                                 <div >
                                     <div style="text-align: center">
                    <figure >
                        <img style="max-width: 250px" src="{$Tema['slika']}" alt="Slika profila" class="slikaKarticePodrucja" >


                    </figure> 
                                     </div>

                  
                </div>
                                <input  style="display: none"type="text" id="naziv"  name="IDkupona" value="{$Tema['korisnik_id']}" > <br> 
                                
                                   <input  style="display: none"type="text" id="naziv"  name="Slika1" value="{$Tema['slika']}" > <br> 
                                
                               

                                <label  id = "Lnaziv" for="naziv">Ime:      
                               </label>

                                <input   type="text" id="naziv"  name="ime"  value="{$Tema['ime']}" required > <br> 
                                
                                      <label  id = "Lnaziv" for="naziv">Prezime:      
                               </label>

                                <input   type="text" id="prezime"  name="prezime"  value="{$Tema['prezime']}" required > <br> 
                                
                                       <label  id = "Lnaziv" for="naziv">Korisničko ime:      
                               </label>

                                <input   type="text" id="naziv"  name="korime"  value="{$Tema['korisnicko_ime']}" required readonly> <br> 
                                
                                              <label  id = "Lnaziv" for="naziv">Email:      
                               </label>

                                <input   type="text" id="naziv"  name="email"  value="{$Tema['email']}" required readonly> <br> 
                                
                          <label  id = "Lnaziv" for="naziv">Prijava u dva koraka:      
                               </label>
                                
                                
                                <select name="dvaKoraka">
  <option value="0">NE</option>  
  <option {if $Tema['prijavaDvaKoraka'] eq '1'}selected{/if} value="1">DA</option>
 
</select>
                                
                                
 <label  >Dodaj sliku profila: </label>
  

 <input   style="height: 30px" type="file" name="fileToUpload" id="fileToUpload">
  


                                <input class= "gumb" type ="submit"  name="izmjenaPodataka" value="Izmjeni">
 
                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                            </form>



                            </div>
{/if}

                        </div>


                    </div>


                </div>


            </div>

        </div>
