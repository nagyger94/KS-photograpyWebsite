<?php

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

    function dataToArray() {
        $data = [
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password1" => password_hash($_POST["password1"], PASSWORD_DEFAULT),
            "password2" => $_POST["password2"], //Azért csak az egyiken használom a hash metódust, hogy az ellenőrzéskor a másikat tudjam "plain text" használni.
            "sex" => $_POST["sex"]
        ];

        return $data;
    }

    function changedDataToArray(){
        $data = [];
        foreach($_POST as $key => $value){
            if($value !== ""){
                $data[$key] = $value;
            }
        }
        
        return $data;
    }

    function checkErrors($data, $users){
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

        //$jelszo = $data["password2"];

        //if(!preg_match('/[A-Z]/', $jelszo) || !preg_match('/[0-9]/', $jelszo)){
            //$errors["jelszoKar"] = "A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!";
        //}

        /*if(!password_verify($jelszo, $data["password1"])){
            $errors["jelszoMas"] = "A két jelszó nem egyezik!";
        }*/

        var_dump($_FILES);

        if(isset($_FILES["avatar"])){
            $kepAdatok = $_FILES["avatar"];
            var_dump($kepAdatok);
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
    }
     
?>