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


            <section id="sadrzaj" >


                <div class = "naslov">
                    <h3><i>Popis pretplatnika</i> </h3>
                </div>
                <div class="asocijativna">
         <form   method="post" name="saljiObavijest"  
                              action="http://barka.foi.hr/WebDiP/2016/materijali/zadace/ispis_forme.php" novalidate>
             
             
             <input style="width:50%;margin-left:-50%;"class="gumb" type="submit" value="Pošalji obavijest">
               
               
               
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
                                    <input type="checkbox" name="Odabir" value = "IdKorisnika">
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