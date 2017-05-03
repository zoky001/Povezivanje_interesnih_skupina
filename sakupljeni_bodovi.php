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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src ="js/zorhrncic.js"></script>
        <script type="text/javascript" src ="js/zorhrncic_jquery.js"></script>
        <script type="text/javascript" src ="js/podrucjaInteresa.js"></script>
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body  onload = "kreirajDogadjajeNoviProizvod();">
        <!-- Header neprijavljeni -->
        <?php include_once 'header.php'; ?>






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
                                    <th >Redni broj</th>
                                    <th>Vrijeme</th>
                                    <th>Aktivnost</th>
                                    <th> Opis aktivnosti</th>
                                    <th> Broj bodova</th>



                                </tr>
                            </thead>

                            <tbody class="tablica1">



                                <tr class="tablica1_redak1">
                                    <td>
                                        1.
                                    </td>

                                    <td>
                                        15:15 15.15.2151.
                                    </td>

                                    <td>
                                        Najbolji komentar
                                    </td>

                                    <td>
                                        Prema broju lajkova
                                    </td>

                                    <td>
                                        5
                                    </td>

                                </tr>

                                <tr class="tablica1_redak1">
                                    <td>
                                        1.
                                    </td>

                                    <td>
                                        15:15 15.15.2151.
                                    </td>

                                    <td>
                                        Najbolji komentar
                                    </td>

                                    <td>
                                        Prema broju lajkova
                                    </td>

                                    <td>
                                        5
                                    </td>

                                </tr>



                            </tbody>
                        </table>  

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
