<?php

    /* OOP a későbbiekben ha lesz rá idő
    class User{
        private $name;
        private $username;
        private $email;
        private $password1;
        private $password2;
        private $sex;

        public function __construct($nev, $username, $email, $password1, $password2, $sex){
            $this->$name = $name;
            $this->$username = $username;
            $this->$email = $email;
            $this->$password1 = $password1;
            $this->$password2 = $password2;
            $this->$sex = $sex;
        }
    }*/

    function saveUsers($users){
        $file = fopen("../data/users.txt", "w");
        if ($file === FALSE){
            die("HIBA: A fájl megnyitása nem sikerült!");
        }
           
        foreach($users as $user) {
            $serialized_user = serialize($user);
            fwrite($file, $serialized_user . "\n");
        }
      
        fclose($file);
    }


    function loadUsers(){
        $users = [];

        $file = fopen("../data/users.txt", "r");
        if ($file === FALSE)  
            die("HIBA: A fájl megnyitása nem sikerült!");

        while (($line = fgets($file)) !== FALSE) {
            $user = unserialize($line);
            $users[] = $user;
        }

        fclose($file);
        return $users;           
    }

    function findUser($users, $username){
        foreach($users as $user){
            if($username === $user["username"]){
                return $user;
            }
        }
        echo 'Nincs ilyen nevű felhasználó';
    }

    function deleteUser($users, $username){
        $index = 0;
        foreach($users as $user){
            if($username === $user["username"]){
                unset($users[$index]);
            } else {
                $index++;
            }
        }
        return $users;
    }

    function dataToArray() {
        $username = $_POST["username"];
        $data = [
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password1" => password_hash($_POST["password1"], PASSWORD_DEFAULT) ,
            "password2" => $_POST["password2"], //Azért csak az egyiken használom a hash metódust, hogy az ellenőrzéskor a másikat tudjam "plain text" használni.
            "sex" => $_POST["sex"],
            "avatar" => "../img/profile-pictures/" .$username. "-avatar"
        ];
        return $data;
    }

    function changedDataToArray($user){
        $data = [];

        if($_POST["password1"] === ""){
            $_POST["password1"] = $user["password1"];
        }
        
        foreach($_POST as $key => $value){
            if($value !== ""){
                $data[$key] = $value;
            }
        }

        if(isset($_FILES["avatar"])){ //Ha képet is cseréltünk
            $kiterjesztes = $kiterjesztes = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));
            $data["avatar"] = "../img/profile-pictures/" .$_SESSION["user"]["username"]. "-avatar.$kiterjesztes";
        }

        unset($data["change-btn"]); //a submit gombot nem kell belerakni :)
        return $data;
    }

    function checkRegistrationErrors($data, $users){
        $errors = [];

        $name = $data["name"];
        if(!preg_match("/\\s/",$name) || preg_match("/[0-9]/",$name)){
            $errors["name"] = "Kérjük adja meg a nevét!";
        }

        foreach($users as $user){
            if(isset($data["username"])){
                if($data["username"] === $user["username"]){
                    $errors["username"] = "A felhasználónév foglalt, kérjük válasszon másikat!";
                }
            }

            if(isset($data["email"])){
                if($data["email"] === $user["email"]){
                    $errors["email"] = "Ezzel az email címmel már regisztráltak!";
                }
            }     
        }

        $jelszo = $data["password2"];

        if(!preg_match('/[A-Z]/', $jelszo) || !preg_match('/[0-9]/', $jelszo)){
            $errors["jelszoKar"] = "A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!";
        }

        if(!(password_verify($jelszo, $data["password1"]))){
            $errors["jelszoMas"] = "A két jelszó nem egyezik!";
        }

        return $errors;
    }

    function checkChangedValues($changedData){
        $errors = [];

        if(isset($changedData["name"])){
            $name = $changedData["name"];
            if(!preg_match("/\\s/",$name) || preg_match("/[0-9]/",$name)){
                $errors["name"] = "Kérjük adja meg a nevét!";
            }
        }

        if(isset($changedData["password1"]) && isset($changedData["password2"])){
            $jelszo1 = $changedData["password1"];
            $jelszo2 = $changedData["password2"];

            if(!preg_match('/[A-Z]/', $jelszo1) || !preg_match('/[0-9]/', $jelszo1)){
                $errors["jelszoKar"] = "A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!";
            }

            if(!($jelszo1 === $jelszo2)){
                $errors["jelszoMas"] = "A két jelszó nem egyezik!";
            }
        }

        if(!($_FILES["avatar"]["size"] === 0)){ //a file mérete nem nulla, vagyis van feltöltve fájl
            $imgName = saveAvatar();
            $_SESSION["avatar"] = "../img/profile-pictures/" .$imgName;
        }

        return $errors;
    }

    function updatePersonalInfo($user, $changedData){
        foreach($changedData as $key => $value){
            $user[$key] = $value;
        }
 
        return $user;
    }

    function saveAvatar(){
        if(isset($_FILES["avatar"])){
            $kepAdatok = $_FILES["avatar"];
            $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];
            $kiterjesztes = $kiterjesztes = strtolower(pathinfo($kepAdatok["name"], PATHINFO_EXTENSION));

            if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
                if ($kepAdatok["error"] === 0) {
                        //A felhasználó nevét használjuk az avatár elnevezéséhez
                        $kepAdatok["name"] = $_SESSION["user"]["username"]."-avatar.".$kiterjesztes;

                        $cel = "../img/profile-pictures/".$kepAdatok["name"];

                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $cel)) {
                            echo "Sikeres fájlfeltöltés! <br/>";
                        } else {
                            echo "Sikertelen fájlfeltöltés";
                        }
                } else{
                    echo "<strong>Hiba:</strong>A fájlfeltöltés nem sikerült!<br/>";
                }    
            } else{
                echo "<strong>Hiba:</strong>A fájl kiterjesztése nem megfelelő!<br/>";
            }
        }

        return $kepAdatok["name"];
    }

    function SaveComment($comments){
        $file = fopen("../data/comment.txt", "w");
        if ($file === FALSE){
            die("HIBA: A fájl megnyitása nem sikerült!");
        }

        foreach($comments as $comment) {
            $serialized_comment = serialize($comment);
            fwrite($file, $serialized_comment . "\n");
        }

        fclose($file);
    }

    function dataToComment($comment, $date_time) {
        $datacomm = [
            "name" => $_SESSION["user"]["username"],
            "message" => $comment,
            "date" => $date_time,
            "ertek" => $_GET["slide"],
        ];
        return $datacomm;
    }

    function LoadComment(){
        $comments = [];

        $file = fopen("../data/comment.txt", "r");
        if ($file === FALSE)  
            die("HIBA: A fájl megnyitása nem sikerült!");

        while (($szoveg = fgets($file)) !== FALSE) {
            $comment = unserialize($szoveg);
            $comments[] = $comment;
        }

        fclose($file);
        return $comments;           
    }    
     
?>
