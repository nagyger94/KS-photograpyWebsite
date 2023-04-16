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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    
    
    <!--Responsive dizájnhoz-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav>
        <ul>
            <li><a href="kezdolap.php">Kezdőlap</a></li>
            <li><a href="rolam.php">Rólam</a></li>
            <li><a href="referenciak.php">Referenciák</a></li>
            <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
            <li><a id="aktiv_oldal" href="arajanlat.php">Árajánlatkérés</a></li>
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
            <h1>Árajánlatkérés</h1>
            <hr class="decor_line">
        </div>

        <div class="rovid_leiras_arajanlat">
                <p>Az alábbi űrlap kitöltésével egyszerűen kérhetsz árajánlatot a felsorolt szolgáltatások bármelyikére.</p>
                <p>Kérlek amennyiben nem találod ezek között azt a szolgáltatást, amelyikre szükséged lenne,
                használd az oldal alján található üzenetküldőt, vagy a további kapcsolatok valamelyikén.
                </p>
            
        </div>


        <form action="feldolgoz.php" method="POST" enctype="multipart/form-data">
            <div class="urlap_container">
                
                    <fieldset>
                        <legend>Személyes adatok</legend>
                        <label>Teljes név<input class="field" type="text" placeholder="Név" required> </label> 
                        <label>E-mail cím<input class="field" type="email" name="email" placeholder="E-mail" required></label> 
                        <label>Telefonszám<input class="field" type="tel" name="phonenumber" placeholder="Telefonszám" required> </label> 
                    </fieldset>

                    <fieldset>
                        <legend>Fotózás adatok</legend>
                        <label for="szolgaltatas">Milyen fotózás érdekel?</label> 
                        <select id="szolgaltatas" class="field">
                        <option value="select">-Választ-</option>
                        <option value="eskuvo">Esküvői</option>
                        <option value="eskuvo2">Külön napi esküvői</option>
                        <option value="kreativ">Kreatív</option>
                        <option value="csaladi">Családi</option>
                        <option value="paros">Páros</option>
                        <option value="baba">Baba</option>
                        <option value="party">Buli</option>
                        <option value="termek">Termék</option>
                        </select>

                        <label>Melyik napon szeretnéd a fotózást?<input class="field" type="date" name="szuletes" min="1920-01-01"></label> 
                        
                        <label for="szolgaltatas">Nemed?</label> <br>
                        <label for="op1">Férfi:</label>
                        <input type="radio" id="op1" name="sex" value="m">
                        <label for="op2">Nő:</label>
                        <input type="radio" id="op2" name="sex" value="f">
                        <label for="op3">Egyéb:</label>
                        <input type="radio" id="op3" name="sex" value="other" checked>

                    
                        <textarea class="field" rows="8" maxlength="200" placeholder="Uzenet (max 200 karatker)"></textarea> 
                    </fieldset>

            
                    <input type="checkbox" id="adatkezeles" name="adatkezeles" value="adatkezeles" required>
                    <label for="adatkezeles">Elfogadom és hozzájárulok személyes adataim kapcsolatfelvétel céljából való kezeléséhez. </label><br>
                
                  <!--Adatkezelési plussz fül???-->

                 <input type="reset" class="btn" name="reset-btn" value="Adatok törlése">
                 <input type="submit" class="btn" name="submit-btn" value="Küldés"> <br>            
            </div>

            <div class="content_container">
                <h1>Kapcsolat</h1>
                <hr class="decor_line">
            </div>

            <div class="kapcsolatok">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2759.0500200988017!2d20.1464441!3d46.2492334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4744887033fc8e71%3A0xb6e6512aab8e5cd4!2zU3plZ2VkLCDDgXJww6FkIHTDqXIgMiwgNjcyMA!5e0!3m2!1shu!2shu!4v1679122820652!5m2!1shu!2shu" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="phonenumber">
                    <i class="fa fa-phone fa-2x"> -</i>
                    <a class="contact" href="tel:+36991118888" >+36 99 111 8888 </a> <br>
                </div>
                <div class="phonenumber">
                    <i class="fa fa-mail-bulk fa-2x"> -</i>
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
            <form action="arajanlat.php" method="POST">
                <label for="footer_input">Email:</label>
                <input id="footer_input" type="email" name="email_add" size="30" maxlength="30">
                <label> <input id="footer_submit" type="submit" value="Küldés"></label>
                <?php
                    if(isset($_POST["email_add"])){
                        echo '<br> Feliratkozás sikerült!';
                    }
                ?>
            </form>
        </div>

        <div id="copyright">
           <p> minden jog fenntartva © 2023</p>
           
        </div>
    </footer>
</body>
</html>
