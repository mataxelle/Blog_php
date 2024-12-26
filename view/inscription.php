<?php $title = 'Blogii inscription'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur Bloggi, un blog amicale !</h1>

<h2>Inscription</h2>

<div class="form">
    <form action="index.php?action=sign_Up" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" minlength="4" maxlength="12" required />

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required />

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" minlength="7" maxlength="20" required />

        <label for="mot_de_passe_verification">Retapez votre mot de passe :</label>
        <input type="password" name="mot_de_passe_verification" id="mot_de_passe_verification" minlength="7" maxlength="20" required />

        <input type="submit" value="Valider" />
    </form>
</div>

<div class="link">
    <a href="index.php">Si vous possédez déjà un compte, connectez-vous par ici !</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>