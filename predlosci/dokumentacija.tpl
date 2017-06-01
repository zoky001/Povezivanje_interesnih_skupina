
        <!-- Header neprijavljeni -->
       

        {if isset($coockieNeVrijediIF) && $coockieNeVrijediIF}
               <!-- modal registracija-->
        <div  style="display: block" id="myModal" class="modal">
        
        <!-- Modal content  coockie prihvat-->
            <div class="modal-content">
              


                <div class = "naslov">
                    <h3><i> Prihvačanje uvjeta korištenja </i> </h3>
                </div>



                <form   class="forma" id="uvjeti koristenja" method="post"  name="uvjeti"  
                        action="neprijavljeni.php" >


                    <div>

                        <label style = "width: 90%; margin:5%;" for="ime">Za nastavak korištenja ovih stranica morate obavezno prihvatiti uvjete košištenja!!!!</label>
                    </div>
                   
  <input  style = "display: none" type="text" id="naziv"  name="coockieAccept" value = "1" ><br>






                    <input  class="gumb" type="submit" value="Prihvati uvjete korištenja">



                </form>






                

            </div>
    </div>
        
        {/if}
         <div  style="text-align: center" class="navigacijaNormalno"style="clear: both; "> 
             
             
             
             
                    <a href="dokumentacija.php?show=about">  <button  style="background: #5CFF5A" class="btnNavL"> O meni</button> </a>
                    
                     <a href="dokumentacija.php?show=era">  <button class="btnNav"> ERA model</button> </a>
                    <a href="dokumentacija.php?show=opisPZ"> <button class="btnNav"> Opis projektnog zadatka </button> </a>
                    <a href="dokumentacija.php?show=opisPR"> <button class="btnNav"> Opis projektnog rješenja</button> </a>
                    <a href="dokumentacija.php?show=popisSkripti">  <button class="btnNav"> Popis skripti</button> </a>
                    <a href="dokumentacija.php?show=tech">  <button class="btnNav"> Popis tehnologija</button> </a>
                       <a href="dokumentacija.php?show=bibl">  <button class="btnNav"> Vanjske biblioteke</button> </a>
                
                    
                    
                    <a  href="neprijavljeni.php">  <button style="background: red;" class="btnNavD"> Povratak</button> </a>
                    </div>
  
         
         
         {if isset($era) && $era}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >   ERA model </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">

                 <figure >

                    <a href="slike/era.png" target="_blank">
                        <img   class = "slika_proizvoda"  src="slike/era.png"  alt="era" style="height: 800px; width: 90%;">
                    </a>
                    <figcaption>Era model</figcaption>
                </figure>
               

         

             
            </div>




        </section>

{/if}



{if isset($about) && $about}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >   O meni </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">

                 
                
                
				
			 <article class="omiljeni_proizvod">
                              <div class="naslov">
                <h3>   Zoran Hrnčić </h3>

            </div>
                             
                  <div class = "profilna">  
                <figure >
                    <img src="slike/profil.jpg" width = "150" height="150" alt="profil">
                    <figcaption>Zoran Hrnčić</figcaption>
                </figure>
            </div>

            <div class = "podaci" style="text-align: left">
                <ul >
                    <li>
                        <p> <strong>IME:</strong> Zoran  </p> 
                    </li>
                    <li>
                        <p> <strong>PREZIME:</strong>  Hrnčić </p> 

                    </li>
                    <li>
                        <p> <strong>BROJ INDEXA:</strong>43111 </p> 
                    </li>
                    <li>
                       <address> <strong> KONTAKT: </strong><a href = "mailto:zorhrncic@foi.hr"> Zoran Hrnčić</a></address>
                    </li>

                </ul>
            </div>
                             
                             
                             
                <p class = "opis_proizvoda">  
                    
                </p>

             
            </article>
               

         

             
            </div>




        </section>

{/if}



 {if isset($opisPZ) && $opisPZ}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >   Opis projektnog zadatka </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">

                  <div >
                                <a target="_blank" href="dokumentacija/pis.pdf">  <button class="gumbKupi" style="width: 100%"> Specifikacija zahtjeva - Povezivanje interesnih skupina</button></a>
                  </div>
                             <div >
                                <a target="_blank" href="dokumentacija/opce.pdf">  <button class="gumbKupi" style="width: 100%"> Opći zahtjevi </button></a>
                            </div>
                
                
				
			 <article class="omiljeni_proizvod">
                
                <p class = "opis_proizvoda">                     
                   	E-povezivanje interesnih skupina je projektni zadatak na kolegiju WebDiP. U suštini, cilj ove teme projektnog zadatka je napraviti forum gdje korisnici mogu pričati o različitim temama. Pod pojmom interesne skupine se smatra zajednica (community) vezan za neku određenu temu kao što je faks, sport, posao... Većina foruma su unaprijed specijalizirane na određenu temu pa je tako primjerice bug.hr specijaliziran za stvari vezane uz računala. U našem slučaju, E-povezivanje interesnih skupina se ne specijaliziran na određenu temu već je po potrebi moguće napraviti interesnu skupinu za bilo koju aktivnost. Prema tome, naš projekt je više sličan forum.hr. Za pojedinu interesnu skupinu (primjerice Nogomet) moderator kreira diskusije te određuje kojeg datuma će se diskusija otvoriti i zatvoriti. Korisnici koji su pretplaćeni na tu interesnu skupinu dobivaju mogućnost komentiranja odnosno sudjelovanja u diskusiji te pružanja svojih mišljenja. Korisnici pretplaćeni na određenu interesnu skupinu svojim akcijama kao što su pregled, komentiranje i kreiranje diskusija ostvaruju bodove za tu interesnu skupinu. Kada skupe dovoljan broj bodova, u mogućnosti su iskoristiti te bodove da ih zamijenili za neki od kupona koji su predviđeni za tu interesnu skupinu. S time korisnici svojim doprinosom interesnoj skupini mogu zauzvrat ostvariti neku prednost.<br><br>
						Svaki neprijavljeni korisnik može vidjeti sve interesne skupine, no ograničen je na vidljivost svega tri diskusije. Neprijavljeni korisnik postaje prijavljenim korisnikom nakon što kreira korisnički račun unosom određenih podataka u registracijski obrazac. Nakon aktivacije računa, korisnik dobije mogućnost uređivanja svog profila odnosno pretplaćivanja na interesne skupine. Time je korisnik spreman za ostvarivanje bodova za određenu interesnu skupinu kroz svoje akcije.<br><br>
						Osim običnog korisnika, drugi tipova korisnika su ADMIN i MODERATOR. Moderator je korisnik koji za pojedinu interesnu skupinu (za koju je dodjeljen) otvara diskusije te definira pravila u toj diskusiji (što običan korisnik ne može). Osim toga, moderator može mijenjati dizajn interene skupine koju moderira te zabraniti mogućnost komentiranja korisnicima (primjerice ako prekše neka pravila). Osim toga, moderator određuje kupone koje korisnici pretplaćeni na njegovu interesnu skupinu mogu ostvariti. Za to je također potrebno definiranje koliko bodova nosi određeni kupon da bi si ga korisnik mogao priuštiti. Najviša moguća uloga je uloga administratora. Administrator definira konfiguraciju servera te određuje trajanje sesije, virtualno vrijeme, straničenje... On vidi sve što je zapisano u log-u te je također u mogućnosti vidjeti log za pojedinog korisnika. Administrator vidi sekciju sa statistikom u kojoj su prikazane određene informacije o posjećenosti stranice te su uz to također dodani i grafovi. Admin određuje moderatore pojedinih interesnih skupina te definira kupone koji se mogu koristiti u pojedinim interesnim skupinima. On je također zaslužan za manipulaciju korisničkim podacima kao što su bodovi lojalnosti određene interesne skupine, no također može i uređivati korisničke račune te ih zaključati i otključati po potrebi.
					
                </p>

             
            </article>
               

         

             
            </div>




        </section>

{/if}
{if isset($opisPR) && $opisPR}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >   Opis projektnog rješenja</h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">
<!--
                  <div >
                                <a target="_blank" href="dokumentacija/pis.pdf">  <button class="gumbKupi" style="width: 100%"> Specifikacija zahtjeva - Povezivanje interesnih skupina</button></a>
                  </div>
                    -->        
                
                
				
			 <article class="omiljeni_proizvod">
                
                <p class = "opis_proizvoda">   
                    						Rješenje projektnog zadatka realizirano je mnoštvo različitih skriptnih jezika te framework-a koji podupruju te jezike. Struktura je napravljena u HTML te je dizajn izgleda stranice definiran kroz CSS. Sadržaj koji stranica nudi je velikim djelom dohvaćena putem AJAX-a, tj. http zahtjeva koristeći Angular. Osim toga, pomoću Angular se u određenim djelovima projektnom rješenja koristi za validaciju korisničkih podataka. Na taj način nije potrebno osvježiti stranicu svakim novim dohvaćanjem podataka već se sve promjene dešavaju 'live' što je karakteristika Web 2.0. Iako postoje određeni nedostaci takvog načina pružanja sadržaja (mogućnost presretanja podataka kod AJAX-a ili pak isključivanje samog Javascripta), karakteristika ne-osvježavanja stranice je danas vidljiva kod svih popularnih stranica kao što je Facebook, Gmail... Na taj način na web stranice nisu više 'statičke' već dobivaju svoju dinamiku i postaju web aplikacije. Svi podaci te sav sadržaj generiraju se na temelju podataka koji su zapisani u MySQL bazi podataka kojoj se pristupa kroz skriptni jezik PHP. PHP tako priprema sav sadržaj koji korisnik može i smije vidjet te ga u obliku HTML stranica prezentira korisniku. <br><br>
						PHP određuje što korisnik može i smije vidjeti što se najvećim djelom može vidjeti kod uloga. Naime, administrator vidi mnogo više nego što vidi moderator, a moderator vidi mnogo više nego što vidi običan korisnik. Takvi podaci se pamte u sesiji i kolačićima web browser-a čime se personalizira korištenje web aplikacije za pojedinog korisnika. Kod PHP-a je korišten framework Smarty koji služi za odvajanje prezentacijskog i programskog djela web stranice odnosno da se unutar HTML ne piše PHP kod. Na taj način se generiraju template-ovi što je realizirano u ovom projektnom rješenju. Što se sigurnosti sadržaja tiće, na određenim djelovima (primjerice login) korišteni su određeni koncepti sigurnosti kao što je prijava u dva koraka te HTTPS protokol. Osim toga, svi podaci su zaštićeni od SQL injection-a.<br><br>
						Što se vidljivosti i dostupnosti, web mjesto ima definirane tri vrste skripti, svaku za određenu ulogu korinika. U suštini, dio koji pruža pristup podacima interesnih skupina (diskusije, komentari, kuponi...) vidljiva je svim ulogama gotovo identično odnosno uloga administratora i moderatora u tom pogledu ne vidi ništa više od običnog korisnika. Time se želi naglasiti da se sve promjene rada sustava konfiguriraju u admin panelu čime je se postiže veća jednostavan, preglednost i odvojenost prezentacijskog djela sadržaja (kako s podaci prikazuje) od programskog djela (koji podaci se prikazuju).

           </p>

             
            </article>
               

         

             
            </div>




        </section>

{/if}
{if isset($popisSkripti) && $popisSkripti}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >  Popis skripti</h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">
<!--
                  <div >
                                <a target="_blank" href="dokumentacija/pis.pdf">  <button class="gumbKupi" style="width: 100%"> Specifikacija zahtjeva - Povezivanje interesnih skupina</button></a>
                  </div>
                    -->        
                
                
				
			 <article class="omiljeni_proizvod">
                
                <p class = "opis_proizvoda">  
                    
                <h3><b>CRUD.php</b></h3>
                <p>
                    - prikazuje sadržaj administratoru kada izvršava CRUD operacije nad tablicama iz baze podataka
                </p>
                <hr>
                     <h3><b>aktivacija.php</b></h3>
                <p>
                    - služi za aktivaciju novoregistriranog korisnika, putem aktivacijskog linka, poslanoga korinsiku na email adresu
                </p>
                
                
                 <hr>
                 
                     <h3><b>diskusija.php</b></h3>
                <p>
                    - dohvaća komentare određene diskusije iz baze podataka i prezentira ih korisniku, isto tako upisuje nove komentare u bazu podataka
                </p>
                
                 <hr>
                 
                 
                   <h3><b>diskusijeModerator.php</b></h3>
                <p>
                    - omogućuje moderatoru da dodaje nove diskusije i uređuje postojeće
                </p>
                
                 <hr>
                 
                   <h3><b>dizajn.php</b></h3>
                <p>
                    - omogućuje upisivanje određenih postavku dizajna za odabrano područje interesa (MODERATOR)
                </p>
                
                 <hr>
                 
                 
                     <h3><b>dokumentacija.php</b></h3>
                <p>
                    - prezentacija dokumentacije ovog projekta,i ostalih pojedinsoti
                </p>
                
                 <hr>
                 
                     <h3><b>footer.php</b></h3>
                <p>
                    - prezentacija podnožja web stranica, koristi se na svim stranicama
                </p>
                
                 <hr>
                     <h3><b>header.php</b></h3>
                <p>
                    - prezentacija zaglavlja stranica, sadrži navigacijske trake
                </p>
                
                 <hr>
                
                     <h3><b>index.php</b></h3>
                <p>
                    - početna skripta, preusmjeruje na neprijavljenog korisnika
                </p>
                
                <hr>
                
                     <h3><b>kosarica.php</b></h3>
                <p>
                    - rad s košaricom korisnika, dodavanje u košaricu, kupovina, pregled 
                </p>
                
                 <hr>
                
                     <h3><b>kupon.php</b></h3>
                <p>
                    - pregled detalja kupona i galerija slika kupona
                </p>
                
                 <hr>
                
                     <h3><b>kuponiAdmin.php</b></h3>
                <p>
                    - ADMINISTRATOR uređuje i definira nove kupone članstva
                </p>
                
                 <hr>
                
                     <h3><b>kuponiModerator.php</b></h3>
                <p>
                    - moderator odabire kupon i dodaje ih u svoje područje interesa, te definira cijenu i valjanost
                </p>
                    
                     <hr>
                
                     <h3><b>logAdmin.php</b></h3>
                <p>
                    - pregledavanje dnevnika sustava (ADMINISTRATOR)
                </p>
                
                 <hr>
                
                     <h3><b>moja_podrucja_interesa.php</b></h3>
                <p>
                    - pregled podrucja koje je korisnik odabrao da će pratiti
                </p>
                    
                 <hr>
                
                     <h3><b>neprijavljeni.php</b></h3>
                <p>
                    - pregled sadržaja za neprijavljenoog/neregstriranog korisnika, sadrži obrazac za prijavu i registraciju
                </p>
                
                 <hr>
                
                     <h3><b>odjava.php</b></h3>
                <p>
                    - brisanje sesije, odjava iz sustava i preusmjeravanje na početak
                </p>
                
                 <hr>
                
                     <h3><b>otkljucavanjeKorisnika.php</b></h3>
                <p>
                    - otkljucavanje i blokiranje korisnika
                </p>
                
                 <hr>
                
                     <h3><b>podrucjaAdmin.php</b></h3>
                <p>
                    - dodavanje novi  područja interesa i uređenje (ADMINISTRATOR)
                </p>
                
                 <hr>
                
                     <h3><b>podrucja_interesa.php</b></h3>
                <p>
                    - pregled svih područja interesa
                </p>
                
                 <hr>
                
                     <h3><b>popis_disksija.php</b></h3>
                <p>
                    - popis diskusija za određeno područje interesa
                </p>
                
                 <hr>
                
                     <h3><b>postavkeAdmin.php</b></h3>
                <p>
                    - administrator postavlja pomak virtualnog vremena i broj prikaza kod straničenja
                </p>
                
                 <hr>
                
                     <h3><b>pregled_kupona.php</b></h3>
                <p>
                    - pregeld dostupnih kupona registriranom korisniku i dodavanje u košaricu
                </p>
                
                
                 <hr>
                
                     <h3><b>pretpatnici.php</b></h3>
                <p>
                    - pregled pretplatnike određene diskusije, moderator, slanje obavijesti
                </p>
                
                 <hr>
                
                     <h3><b>prijava.php</b></h3>
                <p>
                    - provjera podataka za uspješnu prijavu
                </p>
                
                 <hr>
                
                     <h3><b>registracija.php</b></h3>
                <p>
                    - provođenje uspješne registracije
                </p>
                
                 <hr>
                
                     <h3><b>sakupljeni_bodovi.php</b></h3>
                <p>
                    - pregled korisniku da vidi trenutno sakupljene bodove i na što ih je potrošio
                </p>
                
                
                 <hr>
                
                     <h3><b>statistikaAdmin.php</b></h3>
                <p>
                    - pregled statistika administrator
                </p>
                
          </p>

             
            </article>
               

         

             
            </div>




        </section>

{/if}

{if isset($tech) && $tech}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >  Popis tehnologija i alata </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">
<!--
                  <div >
                                <a target="_blank" href="dokumentacija/pis.pdf">  <button class="gumbKupi" style="width: 100%"> Specifikacija zahtjeva - Povezivanje interesnih skupina</button></a>
                  </div>
                    -->        
                
                
				
			 <article class="omiljeni_proizvod">
                
                             <div class="naslov">
                <h3 >  Popis tehnologija </h3>

            </div> 
                             
                            
                <p class = "opis_proizvoda">  
                    </p>
                    
                    
                <h3><b>HTML</b></h3>
                <p>
                    - prezentacijski jezik za kreiranje strukture web stranice
                </p>
                <hr>
                     <h3><b>PHP</b></h3>
                <p>
                    - skriptni jezik za kreiranje funkcionalnosti web stranice
                </p>
                
                <hr>
                     <h3><b>Javascript</b></h3>
                <p>
                    - skriptni jezik za podupiranje klijent strane sadržajem
                </p>
                
                 <hr>
                     <h3><b>CSS</b></h3>
                <p>
                   - stilski jezik za kreiranje dizajna web stranice
                </p>
                
      
            </article>
                    <br>
                     <article class="omiljeni_proizvod">
                
                             <div class="naslov">
                <h3 >  Popis alata </h3>

            </div> 
                             
                            
                <p class = "opis_proizvoda">  
                    </p>
                    
                    
                <h3><b>NetBeans</b></h3>
                <p>
                    - razvojno okruženje za razvoj programa
                </p>
                <hr>
                     <h3><b>MySQL WorkBench</b></h3>
                <p>
                   -  alat za kreiranje ERA modela
                </p>
                
                <hr>
                     <h3><b>Notped++</b></h3>
                <p>
                    - alat za pisanje i čitanje programskog koda
                </p>
                
                 <hr>
                     <h3><b>XAMPP</b></h3>
                <p>
                   - alat za pokretanje lokalnog server-a
                </p>
                <hr>
           <h3><b> Chrome DevTools</b></h3>
                <p>
                 - ekstenzija web browser-a za lakše debug-iranje
                </p>
                
            </article>
                    
               

         

             
            </div>




        </section>

{/if}

{if isset($bibl) && $bibl}
        <section id="sadrzaj">
             


            <div class="naslov">
                <h1 >  Popis vanjskih biblioteka </h1>

            </div>

            <div id =popisPodrucja class = "popisPodrucja">
<!--
                  <div >
                                <a target="_blank" href="dokumentacija/pis.pdf">  <button class="gumbKupi" style="width: 100%"> Specifikacija zahtjeva - Povezivanje interesnih skupina</button></a>
                  </div>
                    -->        
                
                
				
			 <article class="omiljeni_proizvod">
                
               
                             
                            
                <p class = "opis_proizvoda">  
                    </p>
                    
                    	
                    
                    
                <h3><b>AngularJS</b></h3>
                <p>
                    - JavaScript MVC framework napravljen od strane Google-a koji omogućava da izradite dobro struktuirane, lake za testiranje i održavanje front-end aplikacije
                </p>
                <hr>
                     <h3><b>Smarty</b></h3>
                <p>
                   - biblioteka za PHP koja služi za odvajanje HTML-a od PHP-a odnosno strukture od programskog koda
                </p>
                
                <hr>
                     <h3><b>fpdf</b></h3>
                <p>
                    - biblioteka za PHP koja služi za generiranje PDF datoteke
                </p>
                
               
                
      
            </article>
               

         

             
            </div>




        </section>

{/if}
