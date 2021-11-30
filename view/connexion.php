<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur Bloggi, un blog amicale !</h1>

<h3>Connexion</h3>

<form action="index.php?action=log_In" method="post" class="form comment_form">
    <div class="form_div">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required />
    </div>
    <div class="form_div">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" minlength="7" maxlength="20" required />
    </div>
    <!--<div class="form_div">
            <label for="mot_de_passe_verification">Retapez votre mot de passe :</label>
            <input type="password" name="mot_de_passe_verification" id="mot_de_passe_verification" minlength="7" maxlength="20" required />
        </div> -->
    <div class="form_div">
        <input type="submit" value="connexion" />
    </div>
</form>

<a href="index.php?action=sign_Up" class="link">Si vous ne possédez pas de compte, inscrivez-vous par ici !</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>