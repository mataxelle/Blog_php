<?php

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        
        header('Location: connexion.php');
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />

    <title>Post Unique</title>
</head>
<body>

    <header>
        <div class="Titre_h1"><h1>Blogii</h1></div>
        <div class="navig"><nav>
            <ul>
                <li><?php echo $_SESSION['pseudo']; ?></li>
                <li><a href="memberAccount.php">Mon compte</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>    
        </nav></div>
    </header>        

        <div>
            <a href="index.php" class="link">Tous les posts =></a>
        </div>

        <div><a class="link" href="billet_form.php">Pour écrire un post c'est par ici !!!</a><div>

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
        <form action="billetComment_post.php?billet=<?= $_GET['billet'] ?>" method="post" class="form comment_form">
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
            </tbody>
            
            <tfoot>
                <tr>
                    <td>
                        <div class="tfoot_order">
                            <p><em><?= htmlspecialchars($comment['auteur']) ?></em></p>
                            <p><?= htmlspecialchars($comment['date_creation_comment']) ?></p>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php

        }

        $comment->closeCursor();

    ?>
    
</body>
</html>