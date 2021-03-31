<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }

?>

<?php $title = 'Bloogi'; ?>

<?php include('header.php'); ?>

<?php ob_start(); ?>

<h3>Un blog de partage d'avis sur tout et n'importe quoi ;-)</h3>

<p><a class="link" href="index.php?action=addPost">Pour écrire un post c'est par ici !!!</a></p>

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

<?php

    while ( $data = $posts->fetch()) {
?>        

<table>
    <thead>
        <tr>
            <th><?= htmlspecialchars($data['titre']) ?></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <p><?= nl2br(htmlspecialchars($data['contenu'])) ?></p>
            </td>
        </tr>
    </tbody>

    <tfoot>
        <tr>
            <td>
                <div class="tfoot_order">
                    <p><em><?= htmlspecialchars($data['auteur']) ?></em></p>
                    <p><?= htmlspecialchars($data['date_creation']) ?></p>
                </div>
            </td>
        </tr>
        <tr>
            <td><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></td>
        </tr>
    </tfoot>
</table>

<?php    

    }

    $posts->closeCursor();
?>
     
<div>
    <a class="link" href="index.php?action=addPost">Pour écrire un post c'est par ici !!!</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>