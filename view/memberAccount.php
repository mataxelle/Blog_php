<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }

?>

<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>

<a href="index.php" class="link">Tous les posts =></a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>