 
 <footer ng-app="footer" ng-controller="cjelo">
 <div class = "footer_left">
                <figure  >
                    <a href="dokumentacija.php?show=era">
                        <img src="slike/dokumentacija.jpg" width = "150" height="150" alt="dokumentacija">

                    </a>
                    <figcaption>Dokumentacija</figcaption>
                </figure> 
            </div>
        {if isset($sat) && $sat}
<div style= "visibility: block;" class = "footer_left">
             
                
                   <p style="width: 50%;margin-left:25%; min-width:200px  " class = " vrijeme_izrade" ><b>{{ clock  | date:'HH:mm:ss' }}</b> <br>
             <b>{{ clock  | date:'dd.MM.yyyy.' }}</b></p>
                
               
   </div>
 {else}
<div style= "visibility: hidden;" class = "footer_left">
             
                
                   <p style="width: 50%;margin-left:25%; min-width:200px  " class = " vrijeme_izrade" ><b>{{ clock  | date:'HH:mm:ss' }}</b> <br>
             <b>{{ clock  | date:'dd.MM.yyyy.' }}</b></p>
                
             
   </div>
         
        {/if}       
            <div class = "footer_left">
                <figure >
                    <a  href="dokumentacija.php?show=about"><img   src="slike/About-me.jpg" width = "150" height="150" alt="O meni"></a> 
                    <figcaption>O meni</figcaption>
                </figure> 
            </div>
             
              <div style="width: 100%; text-align: center">
                <address> <strong> Kontakt: </strong><a href = "mailto:zorhrncic@foi.hr"> Zoran Hrnčić</a></address>
                <p>Izdario 31.05.2017</p>

                <p> <small>&copy;   31.05.2017 Z. Hrncic</small></p>
           </div>
             
             </footer>
             
                 </body>
</html>