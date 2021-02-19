<?php

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (\Throwable $th) {
            
        die('Erreur :' .$th->getMessage());

    }

    //Insertion commentaire
    $req = $bdd->prepare('INSERT INTO commentaires (id_post, auteur, commentaire) VALUES (?, ?, ?)');

    $req->execute(array(
        $_GET['billet'],
        $_POST['auteur'],
        $_POST['commentaire']
    ));

    $req->closeCursor();

    header('Location: billetComment.php?billet=' . $_GET['billet'] . '');
?>