<?php $title = 'Blogii inscription'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur Bloggi, un blog amicale !</h1>

<h3>Inscription en dessous</h3>

<form action="inscription_post.php" method="post" class="form comment_form">
    <div class="form_div">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" minlength="4" maxlength="12" required />
    </div>
    <div class="form_div">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required />
    </div>
    <div class="form_div">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" minlength="7" maxlength="20" required />
    </div>
    <div class="form_div">
        <label for="mot_de_passe_verification">Retapez votre mot de passe :</label>
        <input type="password" name="mot_de_passe_verification" id="mot_de_passe_verification" minlength="7" maxlength="20" required />
    </div>
    <div class="form_div">
        <input type="submit" value="Valider" />
    </div>
</form>

<a href="view/connexion.php" class="link">Si vous possédez déjà un compte, connectez-vous par ici !</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>