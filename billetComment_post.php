<?php
    include("connexion_bdd.php");

    //Insertion commentaire
    $req = $bdd->prepare('INSERT INTO commentaires (id_post, auteur, commentaire) VALUES (?, ?, ?)');

    $req->execute(array(
        $_GET['id'],
        $_POST['auteur'],
        $_POST['commentaire']
    ));

    $req->closeCursor();

    header('Location: controller/controller.php?id=' . $_GET['id'] . '');
?>