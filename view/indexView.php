<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }

?>

<?php $title = 'Bloogi'; ?>

<?php ob_start(); ?>

<h3>Un blog de partage d'avis sur tout et n'importe quoi ;-)</h3>

<p><a class="link" href="index.php?action=postForm">Pour écrire un post c'est par ici !!!</a></p>

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
    <a class="link" href="index.php?action=postForm">Pour écrire un post c'est par ici !!!</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>