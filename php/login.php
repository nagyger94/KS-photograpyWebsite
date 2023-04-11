

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
            <li><a href="kezdolap.html">Kezdőlap</a></li>
            <li><a href="rolam.html">Rólam</a></li>
            <li><a href="referenciak.html">Referenciák</a></li>
            <li><a href="szolgaltatasok.html">Szolgáltatások</a></li>
            <li><a id="login.html" href="arajanlat.html">Árajánlatkérés</a></li>
            <li>
                <a href="">Ügyfeleinknek</a>
                <ul>
                    <li><a href="login.php">Bejelentkezés</a></li>
                    <li><a href="">Profilod</a></li>
                    <li><a href="">Képeid</a></li>
                    <li><a href="">Vélemények</a></li>
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
                <h1>Bejelentkezés</h1>
                <hr class="decor_line">
            </div>

         <?php
            require "form-methods.php";         
            $users = loadUsers();

            if (isset($_POST["submit-btn"])) {
                if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === ""){
                    echo '<script>alert("Adj meg minden adatot!")</script>';

                } else {
                        $felhasznalonev = $_POST["felhasznalonev"];
                        $jelszo = $_POST["password"];
                        echo '<script>alert("Sikertelen belépés! A belépési adatok nem megfelelők!")</script>';

                    foreach ($users as $user) {              
                        if ($user["felhasznalonev"] === $felhasznalonev && password_verify($jelszo, $user["password"])) {
                            
                            break;
                        }
                    }
                }
                echo '<script>alert("Sikeres belépés!")</script>';
                header("Location:profile.php");
            }
         ?>

            <form action="login.php" method="POST" enctype="multipart/form-data">
                <div class="urlap_container">
                
                    <fieldset>
                        <legend>Személyes adataid</legend>
                        <label>Felhasználónév<input class="field" type="text" name="felhasznalonev" placeholder="Név" required> </label> 
                        <label>Jelszó<input class="field" type="password" name="password" placeholder="Jelszó" required> </label> 
                    </fieldset>

                
                  <!--Adatkezelési plussz fül???-->

                 <input type="reset" class="btn" name="reset-btn" value="Adatok törlése">
                 <input type="submit" class="btn" name="submit-btn" value="Belépés"> <br>
                
                </div>

            <div class="content_container">
                <h1>Kapcsolat</h1>
                <hr class="decor_line">
            </div>

            <div class="kapcsolatok">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2759.0500200988017!2d20.1464441!3d46.2492334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4744887033fc8e71%3A0xb6e6512aab8e5cd4!2zU3plZ2VkLCDDgXJww6FkIHTDqXIgMiwgNjcyMA!5e0!3m2!1shu!2shu!4v1679122820652!5m2!1shu!2shu" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="phonenumber">
                    <i class="fa fa-phone fa-2x"></i>
                    <a class="contact" href="tel:+36991118888" >+36 99 111 8888 </a> <br>
                </div>
                <div class="phonenumber">
                    <i class="fa fa-mail-bulk fa-2x"></i>
                    <a class="contact" href="mailto:katie.smith@gmail.com"> katie.smith@gmail.com </a>
                </div>
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