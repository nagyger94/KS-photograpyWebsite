<?php
  session_start();
?>

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
            <li><a id="aktiv_oldal" href="kezdolap.php">Kezdőlap</a></li>
            <li><a href="rolam.php">Rólam</a></li>
            <li><a href="referenciak.php">Referenciák</a></li>
            <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
            <li><a href="arajanlat.php">Árajánlatkérés</a></li>
            <li>
                <a href="">Ügyfeleinknek</a>
                <ul>
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li><a href="logout.php">Kijelentkezés</a></li>
                        <li><a href="profile.php">Profilod</a></li>
                        <li><a href="">Képeid</a></li>
                        <li><a href="">Vélemények</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Bejelentkezés</a></li>
                        <li><a href="signup.php">Regisztráció</a></li>
                    <?php } ?>
                </ul>
            </li>
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
        <?php
            if(isset($_COOKIE["deleted-profile"])){
                setcookie("deleted-profile", true, time() - 3600); //kiírás után nincs szükségünk a cookie-ra
                echo '<h2 class="success_message"> A profilod törlődött. Köszönjük, hogy igénybe vetted szolgáltatásunkat!</h2>';
            } elseif(isset($_SESSION["user"]["username"]) && isset($_COOKIE["first_sign_up"])){
                setcookie("first_sign_up", true, time() - 3600);
                $nev = explode(" ", $_SESSION["user"]["name"]);
                echo '<h2 class="success_message"> Sikeres bejelentkezés! Isten hozott '.$nev[1].'!</h2>';
            }
        ?>

        <div id="udvozlet">
            <section>
                <hr class="design_line">
                <h2>Emlékek, amikért érdemes élni.</h2>
                <p>Isten hozott az oldalamon! <br> Ha erre tévedtél, valószínűleg te is fontolgatod, hogy valahogy megőrizd életed legszebb pillanatait.<br>
                Legyenek azok a családoddal, pároddal eltöltött közös élmények, vagy épp a boldogító igen kimondása - <br>
                mi ott leszünk, hogy ezek a pillanatok és érzések örökké megmaradjanak. </p>
                <hr class="design_line">
            </section>
        </div>


        <div id="kezdolap_grid" class="center">
            <div class="kezdolap_grid_item"><img class="grid_foto" src="../img/kezdolap/girl_wedding.jpg" alt="Lány menyasszonyi ruhában"></div>
            <div class="kezdolap_grid_item">
                <section>
                    <h2>Álmodd meg, és mi megvalósítjuk</h2>
                    <p>Csapatom színes egyéniségekből áll, akik a fotográfia különböző területeiről szereztek tapasztalatokat, így rugalmasan tudunk igazodni hozzád és az ötleteidhez. Legyen szó eskövői, családi vagy termékfotózásról, velünk oldott hangulatban élheted át életed jelentősebb állomásait.</p>
                    <p>Az elérhető szolgáltatásokról és azok csomagjairól itt olvashattok információkat:</p>
                    <div class="link_kontener">
                        <a href="szolgaltatasok.php" rel="alternate">Szolgáltatásaink</a>
                    </div>
                </section>
            </div>

            <div class="kezdolap_grid_item">
                <section>
                    <h2>A stílusodra szabva</h2>
                    <p>Legyél elegáns vagy kihívó, nálunk megmutathatod és kifejezheted egyéniségedet. Stúdiónkban számos kellék, háttér, érdekes apróság vár, amelyekkel feldobhatjuk a rólad készült képeket. Nálunk éppúgy találhatsz letisztult formákat, mint extravagáns színfesztivált - a lehetőségeknek csupán a képzeleted szabhat határt!</p>
                    <p>Ha mégsem kedveled a stúdió bezártságát, számos budapesti és környező települési helyszínt fedeztünk már fel, ahol nyugodt és mesés természeti közegben fotózhatunk téged és szeretteidet. Megbeszélés alapján akár távolabbi helyszínekre is elmegyünk, hogy a hozzátok kapcsolódó különleges helyeken örökítsünk meg titeket!</p>

                    <img id="apertura" src="../img/kezdolap/apertura.png" alt="Apertúra">
                </section>
            </div>
            <div class="kezdolap_grid_item">
                <img class="grid_foto" src="../img/kezdolap/room.jpg" alt="Stúdiónk díszlete">
            </div>

            <div class="kezdolap_grid_item"><img class="grid_foto" src="../img/kezdolap/family.jpg" alt="Viki és családja a mezőn"></div>
            <div class="kezdolap_grid_item">
                <section>
                    <h2>Végigvezetünk legszebb pillanataidon</h2>
                    <p>Valószínűleg veled is megtörtént már, hogy egy-egy emlék olyan elevenen élt benned, hogy szinte ma is érzni véled a környező illatokat, a fény vibráló játékát és azt a mámoros légkört, ami az egészet körülvette. Fényképeink segítségével ezeket az intenzív emlékeket szeretnénk megőrizni és átadni neked, hogy mindig veled lehessenek.</p>
                    <p>Az alábbi linken megnézhetitek galériánkat, melyben a legszebb képekeinket válogattuk össze:</p>
                    <div class="link_kontener">
                        <a href="referenciak.php" rel="alternate">Referenciák</a>
                    </div>
                </section>
            </div>
        </div>

        <div id="werk_kontener">
            <h2>Így dolgozunk Mi</h2>
            <p>Érdekel, hogyan is nézhet ki egy fotós nap? <br>Tekintsd meg az alábbi werk filmet, melyben csapatunk egyik tagja is közreműködött!</p>

            <video controls>
                <source src="../media/werkfilm.mp4" type="video/mp4">                
            </video>
        </div>

        <div id="also_grid" class="center">
            <div class="kezdolap_grid_item">
                <section>
                    <h2>Fényképek fénysebességgel</h2>
                    <p>Miután elkészültünk a fotózással, az utómunkálatok körülbelül 1 hétig fognak tartani, mely során leválogatjuk, megszerkesszük és terjeszthető formátumra hozzuk képeidet. Amint készen vagyunk, kapni fogsz tőlünk egy értesítő e-mailt, ami tartalmazni fogja a fényképek letöltési linkjét. Képeidet ilyen módon, nagy felbontásban fogod megkapni tőlünk, így könnyen, akár otthonod kényelmében is letöltheted és megoszthatod őket.</p>

                    <img id="felho" src="../img/kezdolap/felho.png" alt="Letöltés felhőből">
                </section>
            </div>
            <div class="kezdolap_grid_item">
                <img src="../img/kezdolap/digital.jpg" alt="Digitális utómunka">
            </div>
        </div>

        <div id="ajanlat_box" class="center">
            <strong>Felkeltettük az érdeklődésedet? Elképzeléseiddel keress meg minket bátran!</strong>
            <div class="link_kontener">
                <a href="arajanlat.php" rel="alternate">Árajánlat kérése</a>
            </div>
        </div>
    </main>

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
</body>
</html>
