<?php

session_start();

if (!isset($_SESSION['pseudo'])) {

    header('Location: index.php');
    exit();
}

?>

<?php $title = 'Écrire un post'; ?>

<?php include('header.php'); ?>

<?php ob_start(); ?>

<div>
    <div class="link">
        <h2>Écrivez et partagez vos idées !</h2>
    </div>
    <div class="link">
        <a href="index.php?action=allPosts">Tous les posts =></a>
    </div>
</div>

<div class="form">
    <form action="index.php?action=addPost" method="post">
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur" value="<?= $_SESSION['pseudo'] ?>" required>

        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required>

        <label for="contenu">Contenu :</label>
        <textarea name="contenu" id="contenu" required></textarea>

        <input type="submit" value="Partager">

    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>