<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }
    
?>

<?php $title = 'Ecrire un post'; ?>

<?php ob_start(); ?>

<h2>Écrivez et partagez vos idées !</h2>

<form action="index.php?action=postForm" method="post">
    <div class="form">
        <div class="form_div">
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" id="auteur" value="<?php echo $_SESSION['pseudo']; ?>" required>
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

<div>
    <a href="index.php" class="link">Tous les posts =></a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>