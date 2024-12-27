<?php

session_start();

if (!isset($_SESSION['pseudo'])) {

    header('Location: index.php');
    exit();
}

?>

<?php $title = 'Bloogi'; ?>

<?php include('header.php'); ?>

<?php ob_start(); ?>

<div>
    <div class="link">
        <h2>Un blog de partage d'avis sur tout et n'importe quoi.</h2>
    </div>
    <div class="link">
        <a href="index.php?action=postForm_page">Écrire un post</a>
    </div>
</div>

<!-- Post form -->
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

<!-- Posts -->
<?php

while ($post = $posts->fetch()) {
?>

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
        <div class="post_footer">
            <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="comment_link">Commentaires</a>
            <p><em><?= htmlspecialchars($post['auteur']) ?></em></p>
        </div>
    </div>

<?php

}

$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>