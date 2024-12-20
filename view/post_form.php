<?php

session_start();

if (!isset($_SESSION['pseudo'])) {

    header('Location: index.php');
    exit();
}

?>

<?php $title = 'Ecrire un post'; ?>

<?php include('header.php'); ?>

<?php ob_start(); ?>

<div class="home_link">
    <div>
        <h2>Écrivez et partagez vos idées !</h2>
    </div>
    <div><a href="index.php?action=allPosts" class="link">Tous les posts =></a></div>
</div>

<form action="index.php?action=addPost" method="post">
    <div class="form">
        <div class="form_div">
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" id="auteur" value="<?= $_SESSION['pseudo'] ?>" required>
        </div>
        <div class="form_div">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
        </div>
        <div class="form_div">
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="contenu" required></textarea>
        </div>
        <div class="form_div">
            <input type="submit" value="Soumettre">
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>