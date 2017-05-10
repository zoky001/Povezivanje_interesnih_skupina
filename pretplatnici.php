<!DOCTYPE html>


<?php 

if (!empty($_POST['submit'])) {
    

foreach ($_POST['Odabir'] as  $value) {
    
    
    echo $value."<br>";

}

}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Povezivanje interesnih skupina</title>
        <meta charset="UTF-8">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Novi proizvod">
        <meta name="author" content="Zoran Hrnčić">
        <meta name="keywords" content="novi_proizvod">
        <meta name="date" content="07.03.2016">

        <link rel="stylesheet" media="screen" type="text/css" href="css/podrucjaInteresa.css"/>


     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>



        <script src="js/myApp.js"></script>

        <script src="js/myCtrl.js"></script>


        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body >
        <!-- Header neprijavljeni -->

        <?php include_once 'header.php'; ?>


        <div ng-app="pretplatnici" ng-controller="cjelo"  class="tijelo  tijeloAdmin">


            <section id="sadrzaj" >


                <div class = "naslov">
                    <h3><i>Popis pretplatnika</i> </h3>
                </div>
                <div class="asocijativna">
                    
                    
                    
                    <button ng-click="otvoriModal()" id="btnNovaObavijest" class="gumb" style="margin-left: -50%"> Pošalji obavijest korisnicima</button> 
                    
              <form id="novi_proizvod" method="post" name="novi_proizvod"  
                    action="pretplatnici.php" novalidate>



                  <div  ng-show="prikaziModal" id="myModalNovaObavijest" style="display: block"class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span ng-click="zatvoriModal()"class="close">&times;</span>


                              
                                <div class="naslov">
                                    <h1 >Nova obavijest </h1>

                                </div>

                                <div class="formaNovaDiskusija" style="text-align: left"> 


                                <div id="refreshDiv" style="display:none">
                                    <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                                </div>

                                    <label  id = "Lnaziv" for="naziv">Naslov:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>

                                    <input required ng-model="naslov" type="text" id="naziv"  name="naziv" > <br> 



                                <label   id = "Ltekst" for="opis">Text poruke:
                                    <img   id = "erOpis" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>  
                                <textarea required ng-model="tekstPoruke"style="margin-left: -50%"class = "opis_area" id= "tekst" name="tekstPoruke" rows="5" cols="100" placeholder="Ovdje unesite tekst poruke"></textarea><br>








                                <input class="gumb" name="submit" type="submit" value="Pošalji obavijest korisnicima"> <br>

                                <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">



                                </div>





                                <div class="naslov" style="background: white">
                                    <button ng-click="zatvoriModal()" type="button" id="btnZatvori"> Zatvori pregled</button> 

                                </div>








                            </div>

                        </div>







                        <table class="tablica1" >
                            <caption class="tablica1">Pretplatnici</caption>

                            <thead class="tablica1">
                                <tr  class="tablica1_zaglavlje sh480">
                                    <th>Odabir</th>
                                    <th >Ime</th>
                                    <th>Prezime</th>
                                    <th> Korisničko ime</th>
                                    <th> Status</th>
                                    <th> Aktivnost</th>


                                </tr>
                            </thead>

                            <tbody class="tablica1">



                                <tr class="tablica1_redak1" >

                                    <td>
                                        <input type="checkbox" name="Odabir[]" value = "342432423432">
                                    </td>
                                    <td>

                                        bfbf

                                    </td>

                                    <td >
                                        bfbf
                                    </td>

                                    <td>
                                        bfbf
                                    </td>

                                    <td>
                                        <a> fbfb</a>
                                    </td>
                                    <td>
                                        <a href ="pretplatnici.php">Blokiraj</a>
                                    </td>


                                </tr>

                                <tr class="tablica1_redak1" >

                                    <td>
                                        <input type="checkbox" name="Odabir[]" value = "342424">
                                    </td>
                                    <td>

                                        bfbf

                                    </td>

                                    <td >
                                        bfbf
                                    </td>

                                    <td>
                                        bfbf
                                    </td>

                                    <td>
                                        <a> fbfb</a>
                                    </td>
                                    <td>
                                        <a href ="pretplatnici.php">Blokiraj</a>
                                    </td>


                                </tr>



                            </tbody>
                        </table>








                    </form>



                </div>










            </section>


            <footer   >

                <div class = "footer_left">
                    <figure  >
                        <a href="https://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2016/zadaca_04/zorhrncic/otkljucavanje_korisnika.php">
                            <img src="slike/HTML5.png" width = "150" height="150" alt="HTML5">

                        </a>
                        <figcaption>HTML</figcaption>
                    </figure> 
                </div>


                <div class = "footer_left">
                    <p class = " vrijeme_izrade"><strong>Vrijeme potrebno za izradu:</strong> 2 sata </p>

                </div>

                <div class = "footer_left">
                    <figure >
                        <a  href="https://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2016/zadaca_04/zorhrncic/css/zorhrncic.css"><img   src="slike/CSS3.png" width = "150" height="150" alt="CSS3"></a> 
                        <figcaption>CSS3</figcaption>
                    </figure> 
                </div>

                <div style="width: 100%; text-align: center">
                    <address> <strong> Kontakt: </strong><a href = "mailto:zorhrncic@foi.hr"> Zoran Hrnčić</a></address>
                    <p>Izdario 18.03.2016</p>

                    <p> <small>&copy;   18.03.2016 Z. Hrncic</small></p>
                </div>

            </footer>



        </div>
    </body>
</html>
