
<!DOCTYPE html>
<html>
    <head>
        <title>{$naslov}</title>
        <meta charset="UTF-8">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Popis proizvoda">
        <meta name="author" content="Zoran Hrnčić">
        <meta name="keywords" content="popis_proizvoda">
        <meta name="date" content="07.03.2016">
        <meta name="description" content="stranica popisa proizvoda">
        <link rel="stylesheet" media="screen" type="text/css" href="css/zorhrncic.css"/>
        <!-- <meta http-equiv="refresh" content="7; url=http://arka.foi.hr/">-->
    </head>
    <body>
        <header>
            <h1 id="pocetak" class="naslov_header "> {$naslov}</h1>
            <!-- <p> HTML/CSS </p>-->


            <figure >
                <img src="slike/header.jpg" usemap="#mapa1" alt="logo" style = "width:100%; height:200px">

                <map name="mapa1">
                    <area href="index.html" alt="pravokutnik" shape="rect" coords="0,0,2000,67" target="_blank" />
                    <area href="#sadrzaj" alt="pravokutnik" shape="rect" coords="0,67,2000,140"  />

                    <area href="http://www.ess.hr/" alt="pravokutnik" shape="rect" coords="0,140,2000,210" target="_blank" />

                </map>

                <figcaption>Interaktivna slika</figcaption>
            </figure> 
        </header>