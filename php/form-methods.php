<?php

    function dataToArray() {
        $data = [
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password1" => $_POST["password1"],
            "password2" => $_POST["password2"],
            "sex" => $_POST["sex"]
        ];

        return $data;
    }

    function checkErrors($array){

    }
    
    
    
?>