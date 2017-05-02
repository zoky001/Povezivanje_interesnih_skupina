/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function kreirajDogadjajeRegistracija() {}




function kreirajDogadjajeNoviProizvod() {

    trenutakPosjete = new Date();
    console.log("trekutakposjete" + trenutakPosjete);



    var formular = document.getElementById("novi_proizvod");
    greske = document.getElementById("greske");
    var datum = document.getElementById("danPro");
    var opis = document.getElementById("opis");
    var naziv = document.getElementById("naziv");
    var erNaziv = document.getElementById("erNaziv");
    exGreske = document.getElementsByClassName("greska_usklicnik");
    greskaNaziv = false;
    greskeIspis = document.getElementById("greske");
    greskePopis = document.getElementsByClassName("greske1");
    refreshButton = document.getElementById("refreshPage");
    greskeRefresh = document.getElementById("greskeRefresh");

    naziv.addEventListener("keyup", function (evt) {
        provjera();
    }, false);

    /*
     osluškuje gumb za refresh stranice
     */
    refreshButton.addEventListener("click", function (evt) {
       // console.log("pritisnut gumb");
        location.reload();

    }, false);

    formular.addEventListener("submit", function (event) {
        /* prikazivanje prozora ako postoje greške*/
        greskeIspis.style.display = "block";

console.log("ispis formulara 0"+ formular[0].value);
        /*provjera proteklog vremena od posjeta stranici*/
        if (ispitajVrijeme(30000)) { // 5 minuta je 300000
            //console.log("nije prošlo 5 minuta");
        } else {
            //console.log("prošlo je 5 minuta");
            event.preventDefault();
            blokirajUnos(formular);
            var refreshDiv = document.getElementById("refreshDiv");
            refreshDiv.style.display = "block";
            refreshButton.disabled = false;
            refreshButton.focus();
            /* prikazivanje prozora ako postoje greške*/
            greskeIspis.style.display = "none";
            greskeRefresh.style.display = "block";
        }













        /*provjerava da su unešeni svi podaci*/
        ispitajPopunjenost(formular);


        /* ispituje jeli se javila greška u nazivu.. on key up i ispisuje usklicnik*/
        if (greskaNaziv === true)
        {
            console.log("javila se greška u nazivu");
            event.preventDefault();
            exGreske[0].style.visibility = "visible";
        }


        /* minimalno jedna kategorija odabrana*/

        if (minJednaKategorija(formular)) {
            event.preventDefault();
            exGreske[6].style.visibility = "visible";
            prikaziGresku(9);
        } else {
            sakrijGresku(9);
            exGreske[6].style.visibility = "hidden";

        }


        /*ispituje jesu li 3 recenice u opisu*/
        if (!ispitajTriRecenice(opis)) {
            event.preventDefault();
            exGreske[1].style.visibility = "visible";
            prikaziGresku(10);
        } else {
            sakrijGresku(10);
            exGreske[1].style.visibility = "hidden";
        }




        ispitajDatum(datum);








        /*ispituje nedozvoljene znakove*/
        var brojKrivihZnakova = 0;
        for (i = 0; i < 5; i++) {

            if (ispitajZnak(formular[i]) === 0)
            {
                brojKrivihZnakova++;
                exGreske[i].style.visibility = "visible";
                event.preventDefault();

            }



        }


        if (brojKrivihZnakova > 0) {

            prikaziGresku(2);
        } else {

            sakrijGresku(2);
        }



        greske.className = "greske";




    }, false);
}
function blokirajUnos(formular) {

    var brojElemenata = formular.length;


    // console.log("Broj elemenata je " + brojElemenata);

    for (i = 0; i < brojElemenata; i++) {

        formular[i].disabled = true;


    }


}

function ispitajVrijeme(vrijeme) {
    var trenutakSlanja = new Date();

    var razlika = trenutakSlanja - trenutakPosjete;

    // console.log("Razlika: " + razlika);
    if (razlika > vrijeme) // prošlo 5 minuta od prijave
    {
        return false;

    } else
        return true;



}
;
function prikaziGresku(index) {
    greskePopis[index].style.display = "block";

}
function sakrijGresku(index) {
    greskePopis[index].style.display = "none";

}
function provjera() {

    var naziv = document.getElementById("naziv");
   // console.log("naziv: " + naziv.value);


    if (naziv.value.length < 5)
    {
       /// console.log("Naziv nije dužine 5 znakova ");
        naziv.className = "greske";
        event.preventDefault();
        prikaziGresku(1);
        exGreske[0].style.visibility = "visible";
        greskaNaziv = true;
    } else {
        sakrijGresku(1);
    }


    if (!isUpperCase(naziv.value[0])) {
       // console.log("Naziv ne počinje velikim početnim slovom");
        prikaziGresku(0);
        naziv.className = "greske";

        event.preventDefault();
        greskaNaziv = true;
        exGreske[0].style.visibility = "visible";

    } else {
        sakrijGresku(0);
    }

    if (naziv.value.length > 4 && isUpperCase(naziv.value[0]))
    {
        naziv.className = "ispravno";

        greskaNaziv = false;
        sakrijGresku(0);
        sakrijGresku(1);
        exGreske[0].style.visibility = "hidden";
    }



}
function minJednaKategorija(formular)
{
    var min = 0;
    for (i = 6; i < 12; i++) {

        if (formular[i].checked)
            min++;

        //console.log("kategorije: " + formular[i].checked);



    }
    if (min === 0) {
        event.preventDefault();
        return true;

    } else {
        return false;

    }

}
function  ispitajTriRecenice(opis) {
    // console.log("tekst opisa" + opis.value);

    brojRecenica = 0;


    for (var i = 0; i < opis.value.length; i++) {
        //console.log("je li veliko slovo: " + i + " " + isUpperCase(opis.value[i])) ;

        if (isUpperCase(opis.value[i]))
        {

            noviDio = opis.value.substring(i, opis.value.length);
            n = noviDio.indexOf('.');
            n = n + i;

            //console.log("je li veliko slovo: " + i + " " + isUpperCase(opis.value[i]));
            // console.log("prva tocka: " + n + " " + noviDio);

            if (n > i)
                brojRecenica = brojRecenica + 1;
        }


    }

    if (brojRecenica > 2)
        return true;


    //console.log("broj recenica: " + brojRecenica);


}

function isUpperCase(character) {

    var znak = character.charCodeAt(0);

    if (znak > 64 && znak < 91) {
        return true;
    } else if (znak === 381 || znak === 272 || znak === 262 || znak === 268 || znak === 352) {

        return true;

    } else
        return false;
    /*
     if (!isNaN(character * 1)) {
     return false;
     } else {
     if (character === '.') {
     return false;
     }
     if (character === character.toUpperCase()) {
     return true;
     }
     if (character === character.toLowerCase()) {
     return false;
     }
     
     
     }
     */
}


function ispitajDatum(datum) {

    var ispravanMjesec = null;
    var ispravanDan = null;
    var ispravnaGodina = null;

    if (datum.type !== 'text')
    {
        prikaziGresku(11);
        // console.log('Datum nije tipa text!');
    } else {
        sakrijGresku(11);

        if (datum.value.length !== 11) {
            prikaziGresku(12);
            //console.log('Datum nema 11 znakova!');
        } else
        {
            sakrijGresku(12);

            /* provjerava točke na pravom mjestu*/
            if (datum.value[2] !== '.' || datum.value[5] !== '.' || datum.value[10] !== '.')
            { //console.log('tocka nije na pravom mjestu');
                prikaziGresku(13);
            } else {
                sakrijGresku(13);


                dan = datum.value.substring(0, 2);
                dan1 = parseInt(dan);
                //console.log(" duljina" + dan.length);
                //console.log(" duljina" + dan1.toString().length);


                if (isNaN(dan[0]) || isNaN(dan[1])) {
                    // console.log('Dan nije broj');
                    prikaziGresku(14);
                } else {  //ako je dan broj
                    sakrijGresku(14);
                    if (dan1 > 0 && dan1 < 32)
                        ispravanDan = dan1;
                }

                // console.log('Dan: ' + dan1);


                mjesec = datum.value.substring(3, 5);
                mjesec1 = parseInt(mjesec);

                if (isNaN(mjesec[0]) || isNaN(mjesec[1])) {
                    // console.log('mjesec nije broj');
                    prikaziGresku(15);
                } else {
                    sakrijGresku(15);
                    //ako je mjesec broj
                    if (mjesec1 > 0 && mjesec1 < 13)
                        ispravanMjesec = mjesec1;

                }

                //console.log('Dan: ' + mjesec1);

                godina = datum.value.substring(6, 10);
                godina12 = parseInt(godina);

                if (isNaN(godina[0]) || isNaN(godina[1]) || isNaN(godina[2]) || isNaN(godina[3]))
                { //console.log('godina nije broj');
                    prikaziGresku(16);

                } else {//ako je godina broj

                    sakrijGresku(16);
                    if (godina12 > 0 && godina12 < 9999)
                        ispravnaGodina = godina12;

                }
                // console.log('Godina: ' + godina);
                // console.log('Godina1: ' + godina12);


                // console.log('Datum je u ispravnom obliku');
            }//else3
        }//else2
    }//else1
    if (ispravnaGodina !== null && ispravanDan !== null && ispravanMjesec !== null)
    {

        var d = new Date();
        d.setDate(ispravanDan);
        d.setMonth(ispravanMjesec - 1);
        d.setYear(ispravnaGodina);

        //console.log('ISPRAVNA godina' + ispravnaGodina);
        // console.log('ISPRAVNA godina' + ispravanMjesec);
        // console.log('ISPRAVNA godina' + ispravanDan);

        var dat = new Date();


        if (d > dat) {
            //  console.log("Unjet je prekasni datum");
            prikaziGresku(17);
            event.preventDefault();
            exGreske[2].style.visibility = "visible";
        } else {
            sakrijGresku(17);
            exGreske[2].style.visibility = "hidden";
        }

        //console.log("ISpravan datum danas " + dat);
        //console.log("ISpravan datum" + d);
        sakrijGresku(18);

    } else {
        prikaziGresku(18);
        event.preventDefault();
        exGreske[2].style.visibility = "visible";
    }

}

function ispitajPopunjenost(formular) {

    var brojElemenata = formular.length;


    // console.log("Broj elemenata je " + brojElemenata);

    for (i = 1; i < 6; i++) {

        if (formular[i].value.length === 0) {
           // console.log("greska: " + i + " " + formular[i].name);

            exGreske[i - 1].style.visibility = "visible";
            event.preventDefault(); //ne šalje formu


            prikaziGresku(2 + i);


        } else {

            if (i < 6) {  //dodatno ogrničenje da se ne pristupa provjeti kategorije i klizača
                sakrijGresku(2 + i);
                exGreske[i - 1].style.visibility = "hidden";
            }
        }

    }
}
function ispitajZnak(znak) {
    for (j = 0; j < znak.value.length; j++)
    {
        switch (znak.value[j]) {

            case '(':
               // console.log("Znak: sadrži zagradu (");
                return 0;
                break;
            case ')':
               // console.log("Znak: sadrži zagradu )");
                return 0;
                break;
            case '}':
               // console.log("Znak: sadrži zagradu } ");
                return 0;
                break;
            case '{':
              //  console.log("Znak: sadrži zagradu { ");
                return 0;
                break;
            case '\'':
              //  console.log("Znak: sadrži  \' ");
                return 0;
                break;
            case '!':
              //  console.log("Znak: sadrži ! ");
                return 0;
                break;

            case '#':
               // console.log("Znak: sadrži #");
                return 0;
                break;

            case '\"':
               // console.log("Znak: sadrži \" ");
                return 0;
                break;

            case '\\':
               // console.log("Znak: sadrži \\");
                return 0;
                break;
            case '/':
              //  console.log("Znak: sadrži zagradu / ");
                return 0;
                break;

        }
    }

}


//console.log(formular);

