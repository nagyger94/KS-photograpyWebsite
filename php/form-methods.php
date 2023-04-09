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

    function checkErrors($data, $users){
        $errors = [];

        $name = $data["name"];
        if(!preg_match("/\\s/",$name) || preg_match("/[0-9]/",$name)){
            $errors["name"] = "Kérjük adja meg a nevét!";
        }

        foreach($users as $user){
            if($data["username"] === $user["username"]){
                $errors["username"] = "A felhasználónév foglalt, kérjük válasszon másikat!";
            }

            if($data["email"] === $user["email"]){
                $errors["email"] = "Ezzel az email címmel már regisztráltak!";
            }
        }

        $jelszo = $data["password2"];

        if(!preg_match('/[A-Z]/', $jelszo) || !preg_match('/[0-9]/', $jelszo)){
            $errors["jelszoKar"] = "A jelszónak tartalmazni kell legalább egy nagy betűt és egy számot!";
        }

        if(!password_verify($jelszo, $data["password1"])){
            $errors["jelszoMas"] = "A két jelszó nem egyezik!";
        }

        return $errors;
    }
    
    
    
?>