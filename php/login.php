<?php
 session_start();
 include "form-methods.php";         
 $users = loadUsers();

    if (isset($_POST["submit-btn"])) {
        if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === ""){
            echo '<script>alert("Adj meg minden adatot!")</script>';

        } else {
            $felhasznalonev = $_POST["felhasznalonev"];
            $jelszo = $_POST["jelszo"];
            echo '<script>alert("Sikertelen belépés! A belépési adatok nem megfelelők!")</script>';

        foreach ($users as $user) {              
            if ($user["username"] === $felhasznalonev && (password_verify($jelszo, $user["password1"]))) {
                            
            echo '<script>alert("Sikeres belépés!")</script>';

            setcookie("first_sign_up", true);
            
            if(!(isset($_COOKIE["nameVisibility"]))){   //ez az első bejelentkezés a böngészőben
                setcookie("nameVisibility", true);
                setcookie("emailVisibility", true);
                setcookie("sexVisibility", true);
            } else {                                // vagy már vannak beállított értékek a profilban
                setcookie("nameVisibility", $user["nameVisibility"]);
                setcookie("emailVisibility", $user["emailVisibility"]);
                setcookie("sexVisibility", $user["sexVisibility"]);
            }

            $_SESSION["user"] = $user;
            header("Location:kezdolap.php");
            }
          }
        }
    }
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
   
        <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <nav>
            <ul>
            <li><a href="kezdolap.php">Kezdőlap</a></li>
            <li><a href="rolam.php">Rólam</a></li>
            <li><a href="referenciak.php">Referenciák</a></li>
            <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
            <li><a id="login.php" href="arajanlat.php">Árajánlatkérés</a></li>
            <li>
                <span id="aktiv_oldal">Ügyfeleinknek</span>
                <ul>
                <?php if (isset($_SESSION["user"])) { ?>
                        <li><a href="logout.php">Kijelentkezés</a></li>
                        <li><a href="profile.php">Profilod</a></li>
                        <li><a href="kepeid.php">Képeid</a></li>
                        <li><a href="velemenyek.php">Vélemények</a></li>
                    <?php } else { ?>
                        <li><a id="aktiv_aloldal" href="login.php">Bejelentkezés</a></li>
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
                if(isset($_SESSION["signup"])){
                    unset($_SESSION["signup"]);
                    echo '<h2 class="success_message"> Sikeres regisztráció! Kérlek, jelentkezz be!</h2>';
                }
           ?>

            <div class="content_container">
                <h1>Bejelentkezés</h1>
                <hr class="decor_line">
            </div>

            <form action="login.php" method="POST" enctype="multipart/form-data">
                <div class="urlap_container">
                
                    <fieldset>
                        <legend>Személyes adataid</legend>
                        <label>Felhasználónév<input class="field" type="text" name="felhasznalonev" placeholder="Felhasználónév" required> </label> 
                        <label>Jelszó<input class="field" type="password" name="jelszo" placeholder="Jelszó" required> </label> 
                    </fieldset>

                
                  <!--Adatkezelési plussz fül???-->

                 <input type="reset" class="btn" name="reset-btn" value="Adatok törlése">
                 <input type="submit" class="btn" name="submit-btn" value="Belépés"> <br>
                
                </div>

        </form>
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
