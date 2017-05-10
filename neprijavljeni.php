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
        <meta name="keywords" content="Povezivanje interesnih skupina">
        <meta name="date" content="09.05.2017">

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>



        <script src="js/myApp.js"></script>
        
        <script src="js/myCtrl.js"></script>



        <link rel="stylesheet" media="screen" type="text/css" href="css/podrucjaInteresa.css"/>







        <script src='https://www.google.com/recaptcha/api.js'></script>




        <!-- 
               <script type="text/javascript" src ="js/zorhrncic.js"></script>
       
       
               <script type="text/javascript" src ="js/zorhrncic_jquery.js"></script>
       
       
              <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
       
       
              <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body ng-app="prijava"  ng-controller="cjelo">
        <!-- Header neprijavljeni -->
        <header class="header" id="myHeader"  >
            <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> -->
            <div class="text-centar">
                <h4 class="white">Povezivanje interesnih skupina</h4>
                <h1 class="white" style="font-size: 36pt">PRIDRUŽI NAM SE...</h1>
                <div >
                    <button ng-click="otovoriRegistraciju()"class="btnPrijava" id="myBtn"> Registracija</button> 
                    <button ng-click="otovoriPrijavu()" class="btnReg" id="myBtn1"> Prijava</button> 
                </div>
            </div>



        </header>



        <form  ng-show="showPrijava" ng-controller="kontrolaPrijava" class="forma" id="prijava1" style="width:50%; margin-left: 25%"  method="post" name="prijava"  
               action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php">




            <label  id = "Lkorime" for="korime">Korisničko ime:</label>
            <input ng-model="firstName" type="text" id="korime" name="korime" required=> <br> 



            <label   id = "Llozinka" for="lozinka">Lozinka:</label>
            <input  ng-model="password" type="password" id="lozinka" name="lozinka" required="">  <br> 

            <label  id = "jedinstveniKod" for="kod">Jedinstveni kod:</label> 
 <input  ng-model="kod" type="text" id="kod" name="kod" >  <br> 

           


            <!--
                                <label  id = "reg" > <a href="registracija.html" class="reg">Registracija  </a></label> 
            -->


            <input class="gumb" type="submit" value="Prijavi se">



        </form>
        <!-- modal registracija-->
        <div ng-show="showRegistracija" style="display: block"id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span ng-click="zatvoriModal()" class="close">&times;</span>


                <div class = "naslov">
                    <h3><i> Registracija novog korisnika</i> </h3>
                </div>



                <div ng-show="(registracija.confirmPassword.$invalid && registracija.confirmPassword.$dirty) || registracija.mail.$error.email || registracija.prezime.$error.pattern || registracija.ime.$error.pattern || registracija.name.$error.username || registracija.mail.$error.email1" class="greskeRegistracija" style=""> 

                    <p ng-show="registracija.mail.$error.email">  Pogrešan format mail adrese. </p>

                    <span ng-show="registracija.prezime.$error.pattern || registracija.ime.$error.pattern" > Ime ili prezime ne počinje velikim POČETNIM slovom</span>



                    <span ng-show="registracija.name.$error.username">Postojeće korisničko ime!</span>

                    <span ng-show="registracija.mail.$error.email1"> Postojeći email!!</span>

                    <span ng-show="registracija.confirmPassword.$invalid && registracija.confirmPassword.$dirty">Lozinke se ne podudaraju</span>

                </div>


                <form   class="forma" id="registracija" method="post"  name="registracija"  
                        action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php" >


                    <div>

                        <label  for="ime">Ime</label>
                        <input ng-model="ime" type="text" id="ime" name="ime" required ng-pattern="velikoSlovo" ng-keyup="onChange($event)" ng-blur="onChange($event)"> <br> 
                    </div>
                    <div>
                        <label  for="prezime">Prezime</label>
                        <input ng-model="prezime" type="text" id="prezime" name="prezime"  required ng-pattern="velikoSlovo"  ng-keyup="onChange($event)" ng-blur="onChange($event)">  <br> 
                    </div>
                    <label  for="korimer">Korisničko ime:</label>
                    <input type="text" id="name" ng-model="name" name="name" username  required="required" ng-keyup="onChange($event)" ng-blur="onChange($event)"> <br> 

                    <span ng-show="registracija.name.$pending.username">Provjera postojanja korisničkog imena...</span>





                    <label  for="mail">E-mail</label>
                    <input type="email" id="mail" name="mail" ng-model="emailAdresa"   email1 required> <br>
                    <span ng-show="registracija.mail.$pending.email1">Provjera postojanja email adrese...</span>

                 

                    <label  for="lozinkar">Lozinka:</label>

                    <input type="password" name="password" class="form-control" ng-model="registration.user.password" required />


                    <label  for="lozinka2">Ponovi lozinku:</label>
                    <input type="password" name="confirmPassword" class="form-control" 
                           ng-model="registration.user.confirmPassword" 
                           required compare-to="registration.user.password" />

                    <label  for="dvaKoraka">Prijava u dva koraka:</label>
                    <input  class="" type="checkbox" id="dvaKoraka"  value = "1" name="dvaKoraka" >  <br>

                    <div class="g-recaptcha" data-sitekey="6LdcTB8UAAAAAF-356Rles1gF9-lIVUA_VcSpukv" style="width:60%; margin-left: 19%; padding-top: 5px;" required></div>












                    <input ng-disabled="(registracija.confirmPassword.$invalid && registracija.confirmPassword.$dirty) || registracija.mail.$error.email || registracija.prezime.$error.pattern || registracija.ime.$error.pattern || registracija.name.$error.username || registracija.mail.$error.email1" class="gumb" type="submit" value="Registriraj me">



                </form>







            </div>

        </div>


        <!-- modal diskusije-->
        <div ng-show="otvoriModal" style="display: block" id="myModalDiskusije" class="modal"   >

            <!-- Modal content -->
            <div class="modal-content">
                <span ng-click="zatvoriModalDiskusije()" class="close">&times;</span>



                <div class="naslov">
                    <h1 >{{triDiskusije[0].Podrucje}} </h1>

                </div>




                <ul ng-repeat="x in triDiskusije">
                    <li class="karticaDiskusije">
                        <h3 class="nazivPodrucjaInteresa" >{{x.Naziv}}</h3>
                    </li>



                </ul>

                <div class="naslov" style="background: white">
                    <button ng-click="zatvoriModalDiskusije()" id="btnZatvori"> Zatvori pregled</button> 

                </div>








            </div>

        </div>


        <section id="sadrzaj">


            <div class="naslov">
                <h1 >   Popis područja interesa </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button data-id = "7" ng-click="otovoriModalDiskusija($event)" class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button data-id = "10" ng-click="otovoriModalDiskusija($event)" class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button data-id = "3" ng-click="otovoriModalDiskusija($event)" class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button data-id = "1" ng-click="otovoriModalDiskusija($event)"class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>


                <div class ="karticaPodrucja">
                    <h3 class="nazivPodrucjaInteresa" >naziv</h3>

                    <figure >
                        <img src="slike/header.jpg" alt="logo" class="slikaKarticePodrucja" >


                    </figure> 


                    <button class="btnDiskusije"> Pregledaj diskusije</button> 

                </div>
            </div>




        </section>


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
