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






        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body >
        <!-- Header neprijavljeni -->
        <?php include_once 'header.php'; ?>






        <div class="tijelo  tijeloAdmin">


            <div class="section">

                <div class="naslov">
                    <h1>Odabir dizajna stranica</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">









                        <div class="galerijaKupon">


                            <form style="text-align: left"  class="provjraKupona" method="post" name="OdabirDizajna"  
                                  action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php">


                                <div class="naslov">
                                    <h4>Naziv područja interesa</h4>

                                </div>



                                <div id="refreshDiv" style="display:none">
                                    <input class= "gumbRef" id="refreshPage" type="button" value="Osvježi stranicu" >
                                </div>


                                <label  style="width: 50%"id = "Lnaziv" for="bojaBody">Boja pozadine (Body):      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>



                                <input style="width: 40%;" type="color" name="bojaBody" value="#F5FFDC" required>

                                <br>


                                <label  style="width: 50%"id = "Lnaziv" for="bojaSlova">Boja slova:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>



                                <input id ="bojaSlova" style="width: 40%;" type="color" name="bojaSlova" value="#000000" required>

                                <br>
                                
                                
                                   <label  style="width: 50%"id = "Lnaziv" for="bojaSekcije">Boja pozadine sekcije:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>



                                <input id ="bojaSekcije" style="width: 40%;" type="color" name="bojaSekcije" value="#EFFFC7" required>

                                <br>
                                
                                      <label  style="width: 50%"id = "Lnaziv" for="bojaObrubaSekcije">Boja obruba sekcije:      
                                    <img  id ="erNaziv" class = "greska_usklicnik"  src="slike/exclamation.jpg"  alt="exclamation">
                                </label>



                                <input id ="bojaObrubaSekcije" style="width: 40%;" type="color" name="bojaObrubaSekcije" value="#4E5247" required>

                                <br>



                                <input class="gumb" name="submit" type="submit" value="Pohrani dizajn"> <br>









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
