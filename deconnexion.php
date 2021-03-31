<?php

    // Démarrer aussi le seesion avant de pouvoir la supprimer
    session_start();

    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_unset();
    session_destroy();

    header('Location: index.php');

    exit();
?>