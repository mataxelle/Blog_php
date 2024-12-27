<?php

session_start();

if (!isset($_SESSION['pseudo'])) {

    header('Location: index.php');
    exit();
}

?>

<?php $title = 'Poste unique'; ?>

<?php include('header.php') ?>

<?php ob_start(); ?>

<div>
    <div class="link">
        <a href="index.php?action=allPosts">Tous les posts =></a>
    </div>
    <div class="link">
        <a href="index.php?action=postForm_page">Écrire un post</a>
    </div>
</div>

<!-- Post -->
<div class="post">
    <h3 class="post_title">
        <?= htmlspecialchars($post['titre']) ?>
    </h3>
    <span class="post_time">
        <p><?= htmlspecialchars($post['date_creation']) ?></p>
    </span>
    <p class="post_content">
        <?= nl2br(htmlspecialchars($post['contenu'])) ?>
    </p>
    <div class="post_footer_bis">
        <p><em><?= htmlspecialchars($post['auteur']) ?></em></p>
    </div>
</div>

<h4>Ajouter un commentaire</h4>

<!-- Comment form -->
<div class="form">
    <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="post">
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur" value="<?= $_SESSION['pseudo'] ?>" required />

        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>

        <input type="submit" value="Publier" required />
    </form>
</div>

<!-- Comments -->
<h4>Commentaires</h4>

<?php

while ($comment = $comments->fetch()) {

?>

    <div class="comment">
        <span class="comment_time">
            <p><em><?= htmlspecialchars($comment['auteur']) ?></em></p>
            <p><?= htmlspecialchars($comment['date_creation_comment']) ?></p>
        </span>
        <p class="comment_content">
            <?= nl2br(htmlspecialchars($comment['commentaire'])) ?>
        </p>
        <div class="comment_footer_action">
            <button id="update_Comment">Modifier</button>
            <button name="button" type="button">X</button>
        </div>
    </div>

    <div class="form" id="updateComment_form">
        <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" required></textarea>

            <input type="submit" value="Modifier" required />
        </form>
    </div>
<?php

}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>