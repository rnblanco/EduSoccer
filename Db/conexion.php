<?php

    function conectar(){
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        try{
            $conectarDB = new PDO("mysql:host=$host;dbname=edu_soccer", $usuario, $contraseña);
            $conectarDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conectarDB->exec("set names utf8");
            return $conectarDB;
        }catch(PDOException $error){
            echo "No se pudo conectar a la DB: " . $error->getMessage();
        }
    }

?>

