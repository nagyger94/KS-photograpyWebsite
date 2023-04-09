<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Gombos Géza és Nagy Gergely">
    <meta name="description" content="Kate Smith fotográfus oldala">
    <meta name="keywords" content="fotográfia,fotók,képek,művészet,rendezvény fotózás">
    <title>Kate Smith Photography | Moments Worth Remembering</title>
    
    <link rel="icon" href="../img/camera_icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google betűtípus himportálása-->
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    
    <!--Responsive dizájnhoz-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <nav>
        <ul>
            <li><a href="kezdolap.html">Kezdőlap</a></li>
            <li><a id="aktiv_oldal" href="rolam.html">Rólam</a></li>
            <li><a href="referenciak.html">Referenciák</a></li>
            <li><a href="szolgaltatasok.html">Szolgáltatások</a></li>
            <li><a href="arajanlat.html">Árajánlatkérés</a></li>
        </ul>
    </nav>
    
    <header>
        <div id="borito_kontener">
            <!--
                <h1 id="focim">Katie Smith Photograpy</h1>
            -->
            <img src="../img/katie_smith_logo.png" alt="Katie logo">
        </div>    
    </header>

    <main>

        <div class="content_container">
            <article>
                <h1>Rólam</h1>
                <hr class="decor_line">

                <img id="katie" src="../img/rolam/katie_photo.png" alt="Katie Smith">

                <p>Kovács Kati vagyok, profi fotográfus.</p>
                <p>Már kisgyermekként is lenyűgözve néztem a nagyszüleim szekrényében talált régi, elsőre furcsának tűnő fényképeket, ahol ismeretlen arcok és dolgok néztek vissza rám. Időutazás a múltba - így képzeltem kislányként, és a régi képek egyszerűen lehengerlően hatottak rám.</p>
                <p>A fotográfia szeretetét még inkább fokozta, amikor tizenévesen megkaptam első kamerámat, amellyel felfedezhettem a környező utcák rejtett zugait. Ekkor döbbentem rá, hogy ez lesz életem célja: megmutatni a rejtőzködőt, az emberekben és dolgokban lévő rejtett kincseket.</p>
                <p>A gimnáziumi éveim után a Budapesti Metropolitan Egyetem fotográfia szakára jelentkeztem, majd kitűnő tanulmányi eredménnyel megszereztem belőle mesterdiplomámat is. Az egyetem során számos projektmunkán vettem részt a gyakorlati helyeimen, a fotográfia számos területén kipróválva magamat. Jelenleg Szeged belvárosában dolgozok kis csapatottam egy általunk berendezett stúdióban. </p>

                <img id="studio_pic" src="../img/rolam/studio.jpg" alt="Stúdiónk">

                <p>Hitvallásomnak tartom, hogy az életben rengeteg gyönyörű dologgal találkozunk, még akkor is, ha sokszor nem vesszük észre őket a hétköznapok forgatagában. Habár ezek a dolgok eléggé illékonynak tűnnek, az én munkám az, hogy megfoghatóvá és örökérvényűvé tegyek őket, madj aztán átnyújtsam nektek. Akár hétköznapi apróságok, akár fontos események, szeretném átadni nektek azt az érzést, amit én is éreztem a fényképeket nézegetve anno, kislányként ücsörögve a nagyszüleim kikopott szőnyegén.</p>

                <p>Egyik kedvenc idézetem Borzák Tibortól származik:</p>
                <div id="idezetbox">
                    <hr class="decor_line">
                    <q cite="https://www.citatum.hu/szerzo/Borzak_Tibor" id="photo_quote">
                        Ha a fiók mélyéről előkerülnek a megsárgult fotográfiák, <br> 
                        az albumba rendezett felvételek, máris sorjáznak<br>
                        a hozzájuk kapcsolódó történetek.
                    </q>
                    <hr class="decor_line">
                </div>

                <p>Elképzeléseitekkel keressetek bátran!</p>
            </article>
        </div>

        <footer>
            <div class="footer_oszlop">
                <h2>Kövess minket:</h2>
                <ol>
                    <li><a href="https://www.facebook.com/"><img src="../img/kapcsolat/facebook.png" alt=""></a></li>
                    <li><a href="https://www.instagram.com/"><img src="../img/kapcsolat/instagram_logo.png" alt=""></a></li>
                    <li><a href="https://www.twitter.com/"><img src="../img/kapcsolat/twitter.png" alt=""></a></li>
                </ol>
            </div>
    
            <div id="home">
                <a href="#borito_kontener"><img src="../img/kapcsolat/nyil.png" alt="Az oldal tetejére" title="Az oldal tetejére"></a>
            </div>
    
            <div id="hirlevel" class="footer_oszlop">
                <h2>Iratkozz fel hírlevelünkre:</h2>
                <form action="feldolgoz.php" method="POST">
                    <label for="footer_input">Email:</label>
                    <input id="footer_input" type="email" name="email_add" size="30" maxlength="30">
                    <label> <input id="footer_submit" type="submit" value="Küldés"></label>
                </form>
            </div>
    
            <div id="copyright">
               <p> minden jog fenntartva © 2023</p>
               
            </div>
        </footer>
    </main>
 
</body>
</html>