<?php
    include("connexion_bdd.php");

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