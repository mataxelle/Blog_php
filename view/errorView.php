<?php

session_start();

if (!isset($_SESSION['pseudo'])) {

    header('Location: connexion.php');
    exit();
}

?>

<?php $title = 'Page d\'erreur'; ?>

<?php ob_start(); ?>

<h2>Page d'erreur</h2>

<p>erreur</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>