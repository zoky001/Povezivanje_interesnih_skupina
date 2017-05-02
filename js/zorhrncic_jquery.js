/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 
 * 
 * u regeistraciji treba koristiti ovaj queri umjesto onload*/
/* toj e umjesto onload*/





$(document).ready(function () {

    $("#slika1").mouseover(function () {

        $("#greske").empty();
        $("#greske").append('<ul><li> Visina:  ' + $("#slika1").height() + ' px </li>\n\
                                  <li> Širina:  ' + $("#slika1").width() + ' px </li>   \n\
                                  <li> Alt:  ' + $("#slika1").attr("alt") + '</li> \n\
                             </ul>');
        $("#greske").show();
    });

    $("#slika1").mouseout(function () {
        $("#greske").hide();

    });

    $("#slika2").mouseover(function () {

        $("#greske").empty();
        $("#greske").append('<ul><li> Visina:  ' + $("#slika2").height() + ' px </li>\n\
                                  <li> Širina:  ' + $("#slika2").width() + ' px </li>   \n\
                                  <li> Alt:  ' + $("#slika2").attr("alt") + '</li> \n\
                             </ul>');
        $("#greske").show();
    });

    $("#slika2").mouseout(function () {
        $("#greske").hide();

    });
    
       $("#slika3").mouseover(function () {

        $("#greske").empty();
        $("#greske").append('<ul><li> Visina:  ' + $("#slika3").height() + ' px </li>\n\
                                  <li> Širina:  ' + $("#slika3").width() + ' px </li>   \n\
                                  <li> Alt:  ' + $("#slika3").attr("alt") + '</li> \n\
                             </ul>');
        $("#greske").show();
    });

    $("#slika3").mouseout(function () {
        $("#greske").hide();

    });

    $('#tablicaProizvoda').DataTable({
        "language": {
            "lengthMenu": "Prikaz _MENU_ rezultata na stranici",
            "zeroRecords": "Nije pronađeni traženi rezultat",
            "info": "Stranica _PAGE_ od _PAGES_",
            "infoEmpty": "Nema rezultata",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Pretraži:",
            "paginate": {
                "first": "Prva",
                "last": "Posljednja",
                "next": "Sljedeća",
                "previous": "Prethodna"
            },

            "infoPostFix": "",
            "thousands": ",",

            "loadingRecords": "Učitavanje...",
            "processing": "Processing..."
        }
    });

    /*
     * 
     * kriraj događaje za registraciju
     */
    var ime = document.getElementById("ime");
    var prezime = document.getElementById("prezime");
    var korimer = document.getElementById("korimer");
    var lozinka = document.getElementById("lozinkar");
    var lozinka2 = document.getElementById("lozinka2");


    formularR = document.getElementById("registracija");

    /*
     formularR.addEventListener("submit", function (evt) {
     console.log("lozinka ispravnaaa"); 
     event.preventDefault();
     var re = new RegEx((/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,20}$/));
     var ok = re.test(document.getElementById("lozinkar").value);
     
     
     if(!ok) {
     console.log("lozinka ispravnaaa");
     event.preventDefault();
     }
     else{
     
     
     }
     
     },false);
     */

    /*
     * 
     * provjera unosa imena
     */
    $("#ime").keyup(function () {


        if (provjeraImena(ime.value) && ime.value.length > 0)
        {
            ime.className = "ispravno";
            if (provjeraImena(prezime.value))
            {
                //console.log("prezime:" + prezime.value);
                korimer.disabled = false;
            } else {

                korimer.disabled = true;
            }

        } else {
            ime.className = "greske";
            korimer.disabled = true;


        }


    });

    /*
     ime.addEventListener("keyup", function (evt) {
     //console.log("ime:" + ime.value);
     if (provjeraImena(ime.value) && ime.value.length > 0)
     {
     ime.className = "ispravno";
     if (provjeraImena(prezime.value))
     {
     //console.log("prezime:" + prezime.value);
     korimer.disabled = false;
     } else {
     
     korimer.disabled = true;
     }
     
     } else {
     ime.className = "greske";
     korimer.disabled = true;
     
     
     }
     
     
     }, false);
     
     */


    /*
     * 
     * provjera unosa prezimena
     */



    $("#prezime").keyup(function () {


        //console.log("ime:" + ime.value);

        if (ime.value.length !== 0 && prezime.value.length !== 0)
        {
            //console.log("prezime:" + prezime.value);
            korimer.disabled = false;
        } else if (ime.value.length === 0 || prezime.value.length === 0) {

            korimer.disabled = true;
        }


        if (provjeraImena(prezime.value))
        {
            prezime.className = "ispravno";
            if (provjeraImena(ime.value))
            {
                //console.log("prezime:" + prezime.value);
                korimer.disabled = false;
            } else {

                korimer.disabled = true;
            }

        } else {
            prezime.className = "greske";
            korimer.disabled = true;


        }


    });

    /*
     prezime.addEventListener("keyup", function (evt) {
     //console.log("ime:" + ime.value);
     
     if (ime.value.length !== 0 && prezime.value.length !== 0)
     {
     //console.log("prezime:" + prezime.value);
     korimer.disabled = false;
     } else if (ime.value.length === 0 || prezime.value.length === 0) {
     
     korimer.disabled = true;
     }
     
     
     if (provjeraImena(prezime.value))
     {
     prezime.className = "ispravno";
     if (provjeraImena(ime.value))
     {
     //console.log("prezime:" + prezime.value);
     korimer.disabled = false;
     } else {
     
     korimer.disabled = true;
     }
     
     } else {
     prezime.className = "greske";
     korimer.disabled = true;
     
     
     }
     
     
     
     
     }, false);*/

    /*
     * 
     * provjera unosa prve LOZINKE i omogucavanje unosa potvrde
     */



    $("#lozinkar").keyup(function () {

        if (provjeraLozinke(lozinka.value))
        {
            lozinka.className = "ispravno";
            lozinka2.disabled = false;
        } else {
            lozinka.className = "greske";
            lozinka2.disabled = true;


        }

    });

    /*
     lozinka.addEventListener("keyup", function (evt) {
     //console.log("ime:" + ime.value);
     
     
     
     
     
     }, false);*/



    /*
     * 
     provjera dali su lozinka i potvrda pozinke isti
     */


    $("#lozinka2").keyup(function () {

        if (lozinka.value === lozinka2.value)
        {
            console.log("lozinke jednake:");
            lozinka2.className = "ispravno";

        } else {
            lozinka2.className = "greske";
            console.log("lozinke različite:");
        }

    });

    /*
     lozinka2.addEventListener("keyup", function (evt) {
     //console.log("ime:" + ime.value);
     
     if (lozinka.value === lozinka2.value)
     {
     console.log("lozinke jednake:");
     lozinka2.className = "ispravno";
     
     } else {
     lozinka2.className = "greske";
     console.log("lozinke različite:");
     }
     }, false);*/



    // alert("jquery");
    $("#korimer").focusout(function (event) {
        console.log($("#korimer").val());
        var korime = $("#korimer").val();
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        $.ajax({
            url: 'http://barka.foi.hr/WebDiP/2016/materijali/zadace/dz3/korisnikImePrezime.php?ime=' + ime + '&prezime=' + prezime,
            type: 'GET',
            dataType: 'xml',
            success: function (xml) {

                console.log(xml);
                $(xml).find('korisnicko_ime').each(function () {

                    console.log($(this).text());
                    if (korime === $(this).text())
                    {
                        $("#greske").show();
                        console.log("postoji kor ime: " + $(this).text());
                        $("#korimer").removeClass("ispravno");
                        $("#korimer").addClass("greske");
                        //korimer.className = "greske";
                        $("#korimer").focus();

                    } else if ($("#korimer").val().length === 0) {
                        // korimer.className = "greske";
                        $("#korimer").removeClass("ispravno");
                        $("#korimer").addClass("greske");

                    } else {
                        console.log("ispravno ");
                        $("#korimer").removeClass("greske");
                        $("#korimer").addClass("ispravno");
                        //  korimer.className = "ispravno";

                        $("#greske").hide();
                    }


                });
            }
            /*
             var inHTML = '<select id="kolegij" name="kolegij" size="20">';
             $(xml).find('name').each(function() {
             inHTML += '<option value="' + $(this).attr('studij') + "#" + $(this).attr('sifra') + '">' +
             $(this).attr('studij') + " / " + $(this).text() + '</option>';
             });
             inHTML += '</select>';
             $('#cilj')[0].innerHTML = inHTML;
             */
            // error: function(xml){}
        });

    });


    var gradovi = new Array();

    $.getJSON("xml_json/drzave.json", function (data) {



        $.each(data, function (key, value) {
            // console.log(value);
            gradovi.push(value);
        });
    });


    $(function () {


        $("#drzava").autocomplete({
            source: gradovi
        });
    });




    $("#btnUcitaj").click(function () {
//alert("The paragraph was clicked.");


        $.getJSON("xml_json/drzave-brojevi.json", function (data) {



            $.each(data, function (key, value) {
                //console.log("ključ: " + key+" Value: " + value);

                $("#padajuciIzbornik").append('<option value="' + value + '">' +
                        value + " - " + key + '</option>');

            });

            //$("#padajuci").show();

        });




    });



});


function provjeraImena(ime) {


    var patt = new RegExp("^([A-Z]|[Ž]|[Ć]|[Č]|[Đ]|[Š])");
    // var res = patt.test(str);

    if (patt.test(ime))
    {

        return true;
    } else
        return false;

}


function provjeraLozinke(lozinka) {

    var brojZnakova = new RegExp("^.{5,15}$");
    var jedanBroj = new RegExp("[0-9]{1,}");
    
    var maloSlovo = new RegExp("(([a-z]|[čćžšđ]){2,}|([a-z]|[čćžšđ]).*([a-z]|[čćžšđ]))"); //dva ili više
    var velikoSlovo = new RegExp("(([A-Z]|[ČĆŽŠĐ]){2,}|([A-Z]|[ČĆŽŠĐ]).*([A-Z]|[ČĆŽŠĐ]))");

    //  var res = jedanBroj.test(lozinka); // provjera velikog slova
    console.log("lozinka: " + lozinka);
    if (jedanBroj.test(lozinka) && brojZnakova.test(lozinka) && maloSlovo.test(lozinka) && velikoSlovo.test(lozinka))
    {

        return true;
    } else
        return false;

}




