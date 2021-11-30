<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }

?>

<?php $title = 'Mon compte'; ?>

<?php include('header.php'); ?>

<?php ob_start(); ?>

<div class="home_link">
    <div><a href="index.php?action=allPosts" class="link">Tous les posts =></a></div>
    <div><a class="link" href="">Pour écrire un post c'est par ici !!!</a></div>
</div>

<div>
    <a href="index.php" class="link">Tous les posts plus =></a>
</div>

<div class="card">
    <div class="card-header">
        <img src="public/images/avatar-user.png" alt="Profile Image" class="profile-img">
    </div>
    <div class="card-body">
        <p>Pseudo : <span class="name"> <?php echo $_SESSION['pseudo']; ?></span></p>
        <p>Email : <?php echo $_SESSION['email']; ?></p>
    </div>

    <div class="social-links">
        <a href="#" class="fab fa-github social-icon"></a>
        <a href="#" class="fab fa-twitter social-icon"></a>
        <a href="#" class="fab fa-youtube social-icon"></a>
        <a href="#" class="fab fa-linkedin social-icon"></a>
    </div>

    <div class="card-footer">
        <p>Inscrit depuis :</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>