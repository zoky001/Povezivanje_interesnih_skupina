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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">





        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    

        <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body >
        <!-- Header neprijavljeni -->
        <?php include_once 'header.php'; ?>
        
        
                <!-- modal diskusije-->
        <div id="myModalKod" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                

                <div class="naslov">
                    <h1 >Naziv kupona </h1>

                </div>
             



                <ul>
                    <li class="karticaDiskusije">
                        <h3 class="nazivPodrucjaInteresa" > <strong> KOD: </strong> fwferf94vr9er49gt49er4g9er4gr8e</h3>
                    </li>
                  
                   

                </ul>
                
                  <div class="naslov" style="background: white">
                       <button id="btnZatvori"> Zatvori pregled</button> 

                </div>
         







            </div>

        </div>






        <div class="tijelo tijeloAdmin">


            <div class="section">

                <div class="naslov">
                    <h1>Košarica</h1>

                </div>


                <div style="width: 100%;">
                    <div class="glavniDio">



                        <a>  <button class="btnNavL"> Artikli u košarici</button> </a>
                        <a >  <button class="btnNavD"> Kupljeni artiki</button> </a>
                        <div class="galerijaKupon kosarica">
                          
                          
                            <h3>Artikli u  košarici</h3>
                            
                             <div >
                                <button class="gumbKupi" style="width: 100%">Kupi sve u košarici </button>
                            </div>
                            
                             <div class="kupon">
                                    <img src="slike/kruh.jpg"style="max-width: 100%;height: 200px;">
                                    <p>Kupon u košarici<br><b>$24.99</b></p>

                                    <div class="ikonaKupi">
                                        <button class="gumbKupnjaKupona" onclick="window.location.href='kupon.php'"> Pregled </button>
                                       <button class="gumbKupnjaKupona"> Kupi</button>
                                         
                                    </div>
                                    
                                    
                                </div>
                                <div class="kupon">
                                    <img src="slike/mljeko.jpg" style="max-width: 100%;height: 200px;">
                                    <p>kupljeni kupon<br><b>$24.99</b></p>
                                      <div class="ikonaKupi">
                                        <button class="btnKod gumbKupnjaKupona" > Prikaži kod </button>
                                         <button class="gumbKupnjaKupona"> Pregled kupona</button>
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
                    <div class="desnoOglasi">
                        <p >Ukupan broj bodova:</p>

                        <h1>15</h1>

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
