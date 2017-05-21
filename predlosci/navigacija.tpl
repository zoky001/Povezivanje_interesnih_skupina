
<nav>
    <ul>

        <li>
            <a href="index.php">{$prvi}</a>
        </li>
        <li>
            <a href="novi_proizvod.php">{$drugi}</a>
        </li>

       {if $uloga1}
            <li>
                <a href="azuriraj_proizvod.php">{$treci}</a>
            </li>
    {/if}

   {if $uloga2}
            <li>
                <a href="otkljucavanje_korisnika.php">{$cetvrti}</a>
            </li>
          {/if}


          <li>
              <a href="StressTest/logs/report.html">   Stress Test Izvještaji</a>
          </li>
        <li>
            <a href="odjava.php">{$peti}</a>
        </li>



    </ul>
</nav >