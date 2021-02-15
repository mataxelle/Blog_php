<?php

        try {
            
            $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (\Throwable $th) {
    
            die('Erreur :' .$th->getMessage());

        }

        $req = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu) VALUES (?, ?, ?)');

        $req->execute(array(
            $_POST['auteur'],
            $_POST['titre'],
            $_POST['contenu']
        ));

        header('Location: index.php');
    ?>