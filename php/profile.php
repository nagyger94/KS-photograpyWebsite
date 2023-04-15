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
                <a id="aktiv_oldal" href="">Ügyfeleinknek</a>
                <ul>
                <?php if (isset($_SESSION["user"])) { ?>
                        <li><a href="logout.php">Kijelentkezés</a></li>
                        <li><a id="aktiv_oldal" href="profile.php">Profilod</a></li>
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
            require "form-methods.php";

            $users = loadUsers();

            foreach($users as $user){
                if($user["username"] === $_SESSION["user"]["username"]){
                    $name = $user["name"];
                    $username= $user["username"];
                    $email = $user["email"];
                    if($user["sex"] === "m"){
                        $gender = "férfi";
                    } elseif($user["sex"] === "f") {
                        $gender = "nő";
                    }
                    if(isset($_SESSION["avatar"])){
                        $avatarLocation = $_SESSION["avatar"];
                    } else{
                        $avatarLocation = $user["avatar"];
                    }
                }
            }

            echo '<div id="profile_container">
                    <h2>'.$name.' profilja</h2>';
                    if(file_exists($avatarLocation)){ //Ha manuálisan állítottunk profilképet
                        echo '<img id="avatar" src="' .$avatarLocation.'" width=10% alt="Egyedi avatar">';
                    } else {
                        echo '<img id="avatar" src="../img/profile-pictures/'.$gender.'-avatar.png" width=10% alt="Férfi avatar">';
                    }
                    
            echo    '<div id="personal-info-container">';

            if($_COOKIE["nameVisibility"] === "true" || $_COOKIE["nameVisibility"] === "1"){
                echo ' <p>Név: ' .$name. '</p>';
            }
                       
            echo '<p>Felhasználónév: ' .$username. '</p>';

            if($_COOKIE["emailVisibility"] === "true" || $_COOKIE["emailVisibility"] === "1"){
                echo '<p>Email: ' .$email. '</p>';
            }

            if($_COOKIE["sexVisibility"] === "true" || $_COOKIE["sexVisibility"] === "1"){
                echo '<p>Neme: '.$gender.'</p>';
            }
                  
            echo    '</div>
                    <form method="GET" action="change-profile.php">
                        <input type="submit" class="btn" id="change-info" value="Adat módosítása" name="change-info">
                    </form>

                    <form method="GET" action="delete-profile.php">
                        <input type="submit" class="btn" id="delete-profile" value="Profil törlése" name="delete-profile">
                    </form>
                    
                </div>';
                
        ?>
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
