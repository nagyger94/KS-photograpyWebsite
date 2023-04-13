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
            <li><a href="referenciak.php">Referenciák</a></li>
            <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
            <li><a href="arajanlat.php">Árajánlatkérés</a></li>
            <li>
                <a id="aktiv_oldal" href="">Ügyfeleinknek</a>
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
        <div class="content_container">
            <h1>Adatok módosítása</h1>
            <hr class="decor_line">
            <p id="center_align">Ezen az oldalon módosíthatod a profilod adatait. Azokhoz a mezőkhöz adj meg új adatot, amelyeken változtatni szeretnél!</p>
        </div>

       
        <!--Űrlapfeldolgozó algoritmus -->
        <?php
            require "form-methods.php";
            if(isset($_POST["change-btn"])){
                $users = loadUsers();
                $currentUser = findUser($users, $_SESSION["user"]["username"]);

                $changedData = changedDataToArray();
                $errors = checkChangedValues($changedData);

                if(count($errors) === 0){
                    $users = deleteUser($users, $_SESSION["user"]["username"]); //A régi adatokkal rendelkező felhasználót töröljük a tömbből
                    $updatedUser = updatePersonalInfo($currentUser, $changedData); //A felhasználóhoz az új adatokat rendelünk
                    $updatedUser["password1"] = password_hash($_POST["password1"], PASSWORD_DEFAULT); //Jelszó titkosítása
                    unset($updatedUser["password2"]); //Ellenőrző jelszó törlése
                    $users[] = $updatedUser; //A frissített felhasználót hozzáadjuk a tömbhöz

                    saveUsers($users);
                    header("Location: profile.php");
                }
            }
        ?>

        <div class="urlap_container">
            <form action="change-profile.php" method="POST" enctype="multipart/form-data">

                <fieldset>
                    <legend>Személyes adatok</legend>

                    <label>Név<input class="field" type="text" name="name" placeholder="Vezeték- és keresztnév"></label>
                        <?php
                            if(isset($errors["name"])){
                                echo '<p class="warning">' .$errors["name"] . "</p>";
                            }
                        ?>  

                    <label>Új jelszó<input class="field" type="password" name="password1" placeholder="A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!"></label> 
                        <?php
                            if(isset($errors["jelszoKar"])){
                                echo '<p class="warning">' .$errors["jelszoKar"] . "</p>";
                            }
                        ?>

                    <label>Új jelszó újra<input class="field" type="password" name="password2" placeholder="Kérjük adja meg a jelszót újra"></label>
                        <?php
                            if(isset($errors["jelszoMas"])){
                                echo '<p class="warning">' .$errors["jelszoMas"] . "</p>";
                            }
                        ?>

                    <label>Nemed?</label> <br>
                    <label>Férfi:</label>
                    <input type="radio" id="op1" name="sex" value="m" checked>
                    <label>Nő:</label>
                    <input type="radio" id="op2" name="sex" value="f">
                    <br><br>

                    <label>Profilkép feltöltése: </label>
                    <input type="file" name="avatar" id="avatar" accept="image/*">
                    <br>

                    <input type="submit" class="btn" id="change-btn" name="change-btn" value="Módosítás"> <br>
                </fieldset>
            </form>
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