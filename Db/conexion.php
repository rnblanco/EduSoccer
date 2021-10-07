<?php

    function conectar(){
        $host = "localhost";
        //Servidor en linea
        /*
        $dbname = "id17703196_edu_soccer";
        $user = "id17703196_root";
        $password = "/C8Ik}_L)zM<K3FO";
        */
        //Servidor local

        $dbname = "edu_soccer";
        $user = "root";
        $password = "";

        try{
            $conectarDB = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $conectarDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conectarDB->exec("set names utf8");
            return $conectarDB;
        }catch(PDOException $error){
            echo "No se pudo conectar a la DB: " . $error->getMessage();
        }
    }
?>

