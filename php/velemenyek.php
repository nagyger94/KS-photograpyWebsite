<?php
  session_start();
  include "form-methods.php";
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
                        <li><a id="aktiv_aloldal" href="velemenyek.php">Vélemények</a></li>
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
            <article>
                <h1>Rólunk írták</h1>
                    <hr class="decor_line">
            </article>
            </div>
                <form action="" method="GET">
                  <div class="urlap_container">
                    <textarea cols="40" rows="5" class="field" name="comment" placeholder="Write Your Message Here...." required></textarea>
           
                    <div class="slider">
                        <p class="slidertext">Értékelj:</p>
                        <input type="range" min="1" max="5" step="1" value="5" id="slide" name="slide" oninput="rangeValue.innerText = this.value">
                        <p id="rangeValue">5</p>
                        
                    </div>
                    <output name="value"></output>
                    <input type="submit" class="slider-btn" name="post" value="Post">
                </div>
                    
               </form>

            <?php
          
                if(isset($_GET["comment"])){
                    $text = $_GET["comment"];
                    $comment = trim(preg_replace('/\s\s+/',' ', $text));
                }

                if(isset($_GET["post"])) {

                    $ido = time();
                    date_default_timezone_set("Europe/Budapest");
                    $date_time = date("d-m-Y (D) H:i:s", $ido);
                    
                    $comments = LoadComment();
                    $NewComment = dataToComment($comment, $date_time);
                    
                    $comments[] = $NewComment;
                    
                    SaveComment($comments);
                    
                }
                
                $comments = LoadComment();
                foreach($comments as $comment){
            ?>
        
            <div class="comment-box">
                <div class="kommnev"><?php echo '<a href="profile.php">'.$comment["name"].'</a>'?></div>
                <div class="komment"><?php echo $comment["message"]; ?></div>
                <div class="datum"><?php echo $comment["date"]?></div>
                <div class="ertekeles"><?php echo "Értékelése: 5/".$comment["ertek"]?></div>
            </div>
                <?php } ?> 
         
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
            <form action="velemenyek.php" method="POST">
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
