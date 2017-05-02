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
        <link rel="stylesheet" media="screen" type="text/css" href="css/zorhrncic.css"/>
        <link rel="stylesheet" media="screen" type="text/css" href="css/podrucjaInteresa.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">





        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src ="js/zorhrncic.js"></script>
        <script type="text/javascript" src ="js/zorhrncic_jquery.js"></script>
        <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body  onload = "kreirajDogadjajeNoviProizvod();">
        <!-- Header neprijavljeni -->
        <header class="header" id="myHeader">
            <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> -->
            <div class="text-centar">
                <h4 class="white">Povezivanje interesnih skupina</h4>
                <h1 class="white" style="font-size: 36pt">PRIDRUŽI NAM SE...</h1>
                <div >
                    <button class="btnPrijava" id="myBtn"> Registracija</button> 
                    <button class="btnReg" id="myBtn1"> Prijava</button> 
                </div>
            </div>



        </header>











        <form class="forma"  style="width:50%; margin-left: 25%" id="prijava" method="post" name="prijava novalidate"  
              action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php">




            <label  id = "Lkorime" for="korime">Korisničko ime:</label>
            <input  type="text" id="korime" name="korime"> <br> 



            <label   id = "Llozinka" for="lozinka">Lozinka:</label>
            <input  type="password" id="lozinka" name="lozinka" >  <br> 

            <label  id = "Lzapamti" for="zapamtime">Zapamti me:</label> 


            <div style="width:40% ;float:left">

                <p class="rad"><input  type="radio" checked="checked" id="zapamtime" name="zapamtime" value="DA"> DA</p>



                <p class="rad"> <input  type="radio"  name="zapamtime" value="NE"> NE </p> 
            </div>


            <!--
                                <label  id = "reg" > <a href="registracija.html" class="reg">Registracija  </a></label> 
            -->


            <input class="gumb" type="submit" value="Prijavi se">



        </form>
        <!-- modal registracija-->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>


                <div class = "naslov">
                    <h3><i> Registracija novog korisnika</i> </h3>
                </div>


                <form class=" forma" id="registracija" method="post"   name="registracija"  
                      action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php" novalidate>


                    <div>

                        <label  for="ime">Ime</label>
                        <input  type="text" id="ime" name="ime"> <br> 
                    </div>
                    <div>
                        <label  for="prezime">Prezime</label>
                        <input  type="text" id="prezime" name="prezime"> <br> 
                    </div>
                    <label  for="korimer">Korisničko ime:</label>
                    <input  disabled="disabled" type="text" id="korimer" name="korime" required="required"> <br> 



                    <label  for="mail">E-mail</label>
                    <input  type="email" id="mail" name="mail" required="required"> <br> 

                    <label  for="lozinkar">Lozinka:</label>
                    <input  type="password" id="lozinkar" name="lozinka" required="required">  <br> 

                    <label  for="lozinka2">Ponovi lozinku:</label>
                    <input disabled="disabled" type="password" id="lozinka2" name="lozinka2" required="required">  <br> 


                    <div class="ui-widget">
                        <label  for="drzava">Država:</label>
                        <input  id="drzava" name="drzava" required="required" >  <br> 
                    </div>


                    <input  class="gumb" type="button" id="btnUcitaj"  value = "Učitaj pozivne brojve">  <br>


                    <div id="padajuci" style="display:block">

                        <label  for="padajuciIzbornik">Pozivni brojevi:</label>
                        <select name="pozivniBroj" class="pozivni" id="padajuciIzbornik" style="border: 3px solid #4E5247;">


                        </select>
                    </div>

                    <label  for="telBroj">Telefonski broj:</label>
                    <input  type="text" id="telBroj" name="telBroj" required="required"> <br> 



                    <input class="gumb" type="submit" value="Registriraj me">



                </form>
                
                

                <div id ="greske" style="width:30%; float:left"> 
                    <p>Korisničko ime postoji. Promjenite korisničko ime!!</p>
                </div>



            </div>

        </div>


        <!-- modal diskusije-->
        <div id="myModalDiskusije" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                

                <div class="naslov">
                    <h1 >Naziv područja interesa </h1>

                </div>
             



                <ul>
                    <li class="karticaDiskusije">
                        <h3 class="nazivPodrucjaInteresa" >naziv</h3>
                    </li>
                    <li class="karticaDiskusije">
                        <h3 class="nazivPodrucjaInteresa" >naziv</h3>
                    </li>
                    <li class="karticaDiskusije">
                        <h3 class="nazivPodrucjaInteresa" >naziv</h3>
                    </li>
                   

                </ul>
                
                  <div class="naslov" style="background: white">
                       <button id="btnZatvori"> Zatvori pregled</button> 

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


                    <button class="btnDiskusije"> Pregledaj diskusije</button> 

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
