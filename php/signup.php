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
        <h1>Regisztráció</h1>
        <hr class="decor_line">

        <form action="signup.php" method="POST">
            <div class="urlap_container">

                            <!--Űrlapfeldolgozó algoritmus -->
                <?php
                    require "form-methods.php";
                    if(isset($_POST["signup-btn"])){
                        $users = loadUsers();

                        $newUser = dataToArray();
                        $errors = checkErrors($newUser, $users);

                        if(count($errors) === 0){
                            unset($newUser["password2"]); //kitöröljük a nem hashelt jelszót biztonsági okokból
                            $users[] = $newUser;
                            saveUsers($users);
                            header("Location:kezdolap.php");
                            echo '<script>alert("Gratulálunk, a regisztráció sikeres volt!")</script>';
                        }   
                    }                
                ?>

                <fieldset>
                    <legend>Személyes adatok</legend>

                    <label>Név<input class="field" type="text" name="name" placeholder="Vezeték- és keresztnév" required></label>  
                    <label>Felhasználónév<input class="field" type="text" name="username" placeholder="Felhasználónév" required> </label> 
                        <?php
                            if(isset($errors["username"])){
                                echo '<p class="warning">' .$errors["username"] . "</p>";
                            }
                        ?>

                    <label>E-mail cím<input class="field" type="email" name="email" placeholder="E-mail" required></label>
                        <?php
                            if(isset($errors["email"])){
                                echo '<p class="warning">' .$errors["email"] . "</p>";
                            }
                        ?>

                    <label>Jelszó<input class="field" type="password" name="password1" placeholder="A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!" required></label> 
                        <?php
                            if(isset($errors["jelszoKar"])){
                                echo '<p class="warning">' .$errors["jelszoKar"] . "</p>";
                            }
                        ?>

                    <label>Jelszó újra<input class="field" type="password" name="password2" placeholder="Kérjük adja meg a jelszót újra" required></label>
                        <?php
                            if(isset($errors["jelszoMas"])){
                                echo '<p class="warning">' .$errors["jelszoMas"] . "</p>";
                            }
                        ?>

                    <label for="szolgaltatas">Nemed?</label> <br>
                    <label for="op1">Férfi:</label>
                    <input type="radio" id="op1" name="sex" value="m">
                    <label for="op2">Nő:</label>
                    <input type="radio" id="op2" name="sex" value="f">
                    <label for="op3">Egyéb:</label>
                    <input type="radio" id="op3" name="sex" value="other" checked>
                    <br>

                    <input type="submit" class="btn" id="signup-btn" name="signup-btn" value="Regisztrálok"> <br>
                </fieldset>


                
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