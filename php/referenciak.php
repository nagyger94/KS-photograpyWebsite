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
            <li><a href="kezdolap.php">Kezdőlap</a></li>
            <li><a href="rolam.php">Rólam</a></li>
            <li><a id="aktiv_oldal" href="referenciak.php">Referenciák</a></li>
            <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
            <li><a href="arajanlat.php">Árajánlatkérés</a></li>
            <li>
                <span>Ügyfeleinknek</span>
                <ul>
                <?php if (isset($_SESSION["user"])) { ?>
                        <li><a href="logout.php">Kijelentkezés</a></li>
                        <li><a href="profile.php">Profilod</a></li>
                        <li><a href="velemenyek.php">Vélemények</a></li>
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

        <div class="content_container">
            <h1>Referenciák</h1>
            <hr class="decor_line">
        </div>

        <div class="rovid_leiras_center">
            <p>Ezen az oldalon tekinthetitek meg azokat a fényképeket, melyekre a legbüszkébbek vagyunk.</p>
        </div>
        
        <div id="album">
            <h2>Esküvők</h2>
            <div class="grid_container">
                <div class="grid_item"><a href="../img/referenciak/eskuvo1.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo1.jpg" alt="Pár a híd alatt"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo2.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo2.jpg" alt="Esküvői csokor"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo3.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo3.jpg" alt="Menyasszony csokorral"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo4.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo4.jpg" alt="Boldog pár"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo5.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo5.jpg" alt="Rózsacsokor"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo6.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo6.jpg" alt="Boldog csók"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo7.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo7.jpg" alt="Menyasszony és vőlegény"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo8.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo8.jpg" alt="Gyűrűt húznak a menyasszony ujjára"></a></div>
                <div class="grid_item"><a href="../img/referenciak/eskuvo9.jpg" target="_blank"><img src="../img/referenciak/tumb/eskuvo9.jpg" alt="Boldogító igen kimondás"></a></div>
            </div>

            <h2>Kreatív</h2>
            <div class="grid_container">
                <div class="grid_item"><a href="../img/referenciak/kreativ1.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ1.jpg" alt="Mókás pár színes háttér előtt"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ2.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ2.jpg" alt="Afrikai nő festékkel az arcán"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ3.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ3.jpg" alt="Lány színes alakzatokkal játszik"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ4.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ4.jpg" alt="Ázsiai lány az akvárium mögött"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ5.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ5.jpg" alt="Táncosok színes mozgása"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ6.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ6.jpg" alt="Lány festékkel az arcán"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ7.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ7.jpg" alt="Lány, akinek egy lufi eltakarja az arcát"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ8.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ8.jpg" alt="Színes montázs"></a></div>
                <div class="grid_item"><a href="../img/referenciak/kreativ9.jpg" target="_blank"><img src="../img/referenciak/tumb/kreativ9.jpg" alt="Afrikai lány festékkel befedve"></a></div>
            </div>

            <h2>Páros és családi</h2>
            <div class="grid_container">
                <div class="grid_item"><a href="../img/referenciak/csalad1.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad1.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad2.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad2.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad3.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad3.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad4.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad4.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad5.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad5.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad6.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad6.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad7.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad7.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad8.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad8.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/csalad9.jpg" target="_blank"><img src="../img/referenciak/tumb/csalad9.jpg" alt="Afrikai lány festékkel befedve"></a></div>
            </div>

            <h2>Termék fotózás</h2>
            <div class="grid_container">
                <div class="grid_item"><a href="../img/referenciak/termek1.jpg" target="_blank"><img src="../img/referenciak/tumb/termek1.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek2.jpg" target="_blank"><img src="../img/referenciak/tumb/termek2.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek3.jpg" target="_blank"><img src="../img/referenciak/tumb/termek3.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek4.jpg" target="_blank"><img src="../img/referenciak/tumb/termek4.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek5.jpg" target="_blank"><img src="../img/referenciak/tumb/termek5.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek6.jpg" target="_blank"><img src="../img/referenciak/tumb/termek6.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek7.jpg" target="_blank"><img src="../img/referenciak/tumb/termek7.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek8.jpg" target="_blank"><img src="../img/referenciak/tumb/termek8.jpg" alt="Afrikai lány festékkel befedve"></a></div>
                <div class="grid_item"><a href="../img/referenciak/termek9.jpg" target="_blank"><img src="../img/referenciak/tumb/termek9.jpg" alt="Afrikai lány festékkel befedve"></a></div>
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
