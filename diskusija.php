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
        <?php include_once 'header.php'; ?>






        <div class="tijelo">
            
            
      

        <section id="sadrzaj">

            <div class="naslov">
                <h1 >Naslov diskusije </h1>

            </div>



   <div class="temaDiskusije">
        
       <img src="slike/avatar.png" alt="Avatar" class="slikaKomntar" style="width:60px">
        <span class="vrijemekomentara">16 min</span>
        <h4>Jane Doe</h4>
        <br>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
       
        
        <button type="button" class="">Like</button> 
       
        
        <button type="button" class=""> Comment</button> 
    </div>  
            
            
               <div class="komentar">
        
       <img src="slike/avatar.png" alt="Avatar" class="slikaKomntar" style="width:60px">
        <span class="vrijemekomentara">16 min</span>
        <h4>Jane Doe</h4>
        <br>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
       
        
        <button type="button" class="">Like</button> 
       
        
        <button type="button" class=""> Comment</button> 
    </div>  
            
            
             <div class="noviKomentar">
                 
                 
                 <form>
                     <textarea style="width:100%"name="opis" rows="4"  placeholder="Upišite komentar"></textarea><br>
                     <input style="width:100%"class="btn"type="submit" value="Komentiraj">
                 </form>
              
              
            </div>


        </section>

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
