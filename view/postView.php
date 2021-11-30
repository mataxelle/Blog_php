<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }

?>

<?php $title = 'Poste unique'; ?>

<?php include('header.php') ?>

<?php ob_start(); ?>

<div class="home_link">
    <div><a href="index.php?action=allPosts" class="link">Tous les posts =></a></div>
    <div><a class="link" href="view/post_form.php">Pour écrire un post c'est par ici !!!</a></div>
</div>

<table>
    <thead>
        <tr>
            <th><?= htmlspecialchars($post['titre']) ?></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <p><?= nl2br(htmlspecialchars($post['contenu'])) ?></p>
            </td>
        </tr>
    </tbody>

    <tfoot>
        <tr>
            <td>
                <div class="tfoot_order">
                    <p><em><?= htmlspecialchars($post['auteur']) ?></em></p>
                    <p><?= htmlspecialchars($post['date_creation']) ?></p>
                </div>
            </td>
        </tr>
    </tfoot>
</table>


<!-- Comment form -->
<form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="post" class="form comment_form">
    <div class="form_div">
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur" value="<?= $_SESSION['pseudo'] ?>" required />
    </div>
    <div class="form_div">
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
    </div>
    <div class="form_div">
        <input type="submit" value="Publier" required />
    </div>
</form>

<?php    

    while ($comment = $comments->fetch()) {
            
?>

<!-- Comments -->
<table>
    <thead>
        <tr>
            <th>Commentaires</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?= nl2br(htmlspecialchars($comment['commentaire'])) ?></td>
        </tr>
        <tr id="updateComment_form">
            <td>
                <div id="">
                    <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
                        <div class="form_div">
                            <label for="commentaire">Commentaire :</label>
                            <textarea name="commentaire" id="commentaire" required></textarea>
                        </div>
                        <div class="form_div">
                            <input type="submit" value="Modifier" required />
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    </tbody>
            
    <tfoot>
        <tr>
            <td>
                <div>
                    <div class="tfoot_order">
                        <p><em><?= htmlspecialchars($comment['auteur']) ?></em></p>
                        <p><?= htmlspecialchars($comment['date_creation_comment']) ?></p>
                    </div>
                    <div class="tfoot_order">
                        <button id="update_Comment">Modifier</button>
                        <button name="button" type="button">X</button>
                    </div>
                </div>
            </td>
        </tr>
    </tfoot>
</table>
<?php

    }
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>