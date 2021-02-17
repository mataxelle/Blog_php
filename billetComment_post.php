<?php

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (\Throwable $th) {
            
        die('Erreur :' .$th->getMessage());

    }

    //Insertion commentaire
    $req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire) VALUES (?, ?)');

    $req->execute(array(
        $_POST['auteur'],
        $_POST['commentaire']
    ));

    $donnees = $req->fetch();

    header('Location: billetComment.php');
?>