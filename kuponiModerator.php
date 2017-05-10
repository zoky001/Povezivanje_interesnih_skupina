<!DOCTYPE html>
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






        <div ng-app="kuponiModerator" ng-controller="cjelo" class="tijelo  tijeloAdmin">


            <div class="section">

                <div class="naslov">
                    <h1>Odabir kupona</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">

                        <nav style="width:20%;">

                            <h4>Aktivnosti:</h4>
                            <ul>
                                <li ng-click="PrikaziSve()"> <a>Svi kuponi</a></li>
                                <br>
                                <li ng-click="PrikaziKupljene()"> <a>Aktivni kuponi</a></li>
                                <br>
                                <li ng-click="PrikaziProvjeru()"> <a>Provjera kupona</a></li>
                            </ul>


                        </nav>




                        <div id="myModalNoviKupon" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>



                                <div class="naslov">
                                    <h1 >Dodavanje novog kupona </h1>

                                </div>

                                <form style="text-align: left" class="formaNovaDiskusija" id="novi_proizvod" method="post" name="novi_proizvod"  
                                      action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php" novalidate>





                                    <div id="refreshDiv" style="display:none">
                                        <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                                    </div>


                                    <label  for="kolBodova"> Potreban broj bodova:
                                        <img  id="erKolPro" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">

                                    </label>
                                    <input type="number" id="kolBodova"  min = "1" name="kolBodova" >

                                    <br>

                                    <label   for="danPocetka">Početak:
                                        <img  id="erDanPro" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                    </label>
                                    <input type="date" id="danPocetka" placeholder = "dd.mm.gggg." name="danPocetka" >


                                    <br>


                                    <label  for="danKraj">Kraj:
                                        <img  id="erDanPro" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                    </label>
                                    <input type="date" id="danKraj" placeholder = "dd.mm.gggg." name="danKraj" >

                                    <br>





                                    <input class="gumb" name="submit" type="submit" value="Dodaj kupon"> <br>

                                    <input class= "gumb" style = "color:red" id="reset1" type="reset" value=" Inicijaliziraj">







                                </form>

                                <div class="naslov" style="background: white">
                                    <button  type="button" id="btnZatvori"> Zatvori pregled</button> 

                                </div>








                            </div>

                        </div>

                        <div ng-show="prikaziSve" class="galerija">
                            
                            <h3 style="text-align: left; margin-left: 20px;">Svi kuponi  </h3> 

                            <div style="text-align: left">
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>

                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona" onclick="window.location.href = 'kupon.php'"> Pregled </button>
                                        <button class="gumbKupnjaKupona dodajKupon">Dodaj</button>

                                    </div>


                                </div>
                                <div class="kupon">
                                    <img src="slike/mljeko.jpg" style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona dodajKupon">Dodaj</button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona dodajKupon">Dodaj</button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Pregled </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>



                            </div>
                        </div>
                        
                        <div ng-show="prikaziKupljene" class="galerija">
                            
                           

                            <h3 style="text-align: left; margin-left: 20px;">Aktivni kuponi</h3> 

                            <div style="text-align: left">
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>

                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona" onclick="window.location.href = 'kupon.php'"> Pregled </button>
                                        <button class="gumbKupnjaKupona">Obriši</button>

                                    </div>


                                </div>
                                <div class="kupon">
                                    <img src="slike/mljeko.jpg" style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Pregled </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>
                                <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                        <button class="gumbKupnjaKupona">Buy now </button>
                                    </div>

                                </div>



                            </div>
 
                        </div>
                        
                        
                        <div ng-show="prikaziProvjeru" class="galerija">
                            




                            <form style="text-align: left"  class="provjraKupona" method="post" name="ProvjeraKoda"  
                                  action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php">


                                <div class="naslov">
                                    <h4>Provjera kupona </h4>

                                </div>



                                <div id="refreshDiv" style="display:none">
                                    <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                                </div>


                                <label  style="width: 17%"id = "Lnaziv" for="kod">Kod:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>

                                <input style="width: 70%;" type="text" id="kod"  name="kod" required> <br> 







                                <input class="gumb" name="submit" type="submit" value="Provjeri valjanost"> <br>









                            </form>


                        </div>


                    </div>

                    <div class="desnoOglasi">
                        <p >Trenutno aktivnih kupona:</p>

                        <h1>5</h1>

                    </div>
                </div>


            </div>

        </div>
        <footer   >

            <div class = "footer_left">
                <figure  >
                    <a href="https://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2016/zadaca_03/zorhrncic/novi_proizvod.html">
                        <img src="slike/HTML5.png" width = "150" height="150" alt="HTML5">

                    </a>
                    <figcaption>HTML</figcaption>
                </figure> 
            </div>


            <div class = "footer_left">
                <p class = " vrijeme_izrade"><strong>Vrijeme potrebno za izradu:</strong> 2.5 sati </p>

            </div>

            <div class = "footer_left">
                <figure >
                    <a  href="https://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2016/zadaca_03/zorhrncic/css/zorhrncic.css"><img   src="slike/CSS3.png" width = "150" height="150" alt="CSS3"></a> 
                    <figcaption>CSS3</figcaption>
                </figure> 
            </div>

            <div style="width: 100%; text-align: center">
                <address> <strong> Kontakt: </strong><a href = "mailto:zorhrncic@foi.hr"> Zoran Hrnčić</a></address>
                <p>Izdario 18.03.2016</p>

                <p> <small>&copy;   18.03.2016 Z. Hrncic</small></p>
            </div>

        </footer>




    </body>
</html>
