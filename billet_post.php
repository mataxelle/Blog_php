<?php

    include("connexion_bdd.php");

    $req = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu) VALUES (?, ?, ?)');

    $req->execute(array(
        $_POST['auteur'],
        $_POST['titre'],
        $_POST['contenu']
    ));

    header('Location: index.php');
?>