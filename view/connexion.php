<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur Bloggi, un blog amicale !</h1>

<h2>Connexion</h2>

<div class="form">
    <form action="index.php?action=log_In" method="post">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required />

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" minlength="7" maxlength="20" required />

        <input type="submit" value="Connexion" />

    </form>
</div>

<div class="link">
    <a href="index.php?action=signUp_page">Si vous ne possédez pas de compte, inscrivez-vous par ici !</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>