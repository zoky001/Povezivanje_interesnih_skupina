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






        <div ng-app="kupon" ng-controller="cijelo" class="tijelo">


            <div class="section">

                <div class="naslov">
                    <h1>Kupon New Yorker    </h1>
               
                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">


                      


                        <div ng-init="izvor = 'slike/mljeko.jpg'"   class="galerijaKupon">

                            <div >
                                <button class="gumbKupi" style="width: 100%">Buy now </button>
                            </div>

                            <div>
                                <img ng-src="{{izvor}}" style="width:100%;margin-bottom:-6px">
                                <div>
                                    <p>Living Room</p>
                                </div>
                            </div>

                            <div style="text-align: left">
                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" ng-model="slika1" src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">



                                </div>
                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" src="slike/mljeko.jpg" style="max-width: 100%;height: 200px;">



                                </div>
                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">


                                </div>
                                <div class="kupon">
                                    <img ng-click="PromjeniSliku($event)" src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">


                                </div>




                            </div>
                            <br>
                            <hr style="width: 100%">
                            <br>
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
                            <br>
                            <hr style="width: 100%">
                            <br>


                            <div style="text-align: left">
                                <h3>Opis kupona</h3>
                                <p>fgervzwztezerze rhebggg grg ergeg</p>
                            </div>

                        </div>


                    </div>

                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>

                        <h1>15</h1>

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
