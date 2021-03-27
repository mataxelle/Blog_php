<?php

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //Ce paramètre permet d'activer les erreurs des req SQL

    } catch (\Throwable $th) {
    
        die('Erreur :' .$th->getMessage());

    }
?>