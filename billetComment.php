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

    <?php

        include("connexion_bdd.php");

        //Récupération post
        $req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
        $req->execute(array(
            $_GET['billet']
        ));

        $data = $req->fetch();
    ?>        

        <div>
            <a href="index.php" class="link">Tous les posts =></a>
        </div>

        <div><a class="link" href="billet_form.php">Pour écrire un post c'est par ici !!!</a><div>

        <table>
            <thead>
                <tr>
                    <th><?php echo htmlspecialchars($data['titre']); ?></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <p><?php echo htmlspecialchars($data['contenu']); ?></p>
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td>
                        <div class="tfoot_order">
                            <p><em><?php echo htmlspecialchars($data['auteur']); ?></em></p>
                            <p><?php echo htmlspecialchars($data['date_creation']); ?></p>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

    <?php

        $req->closeCursor(); // Important de libérer le curseur pour la prochaine requête

        //Récupération commentaires post
        $req = $bdd->prepare('SELECT * FROM commentaires WHERE id_post = ? ORDER BY date_creation_comment DESC');
        $req->execute(array(
            $_GET['billet']
        ));

    ?>

        <!-- Formulaire ajout commentaire -->
        <form action="billetComment_post.php?billet=<?php echo $_GET['billet']; ?>" method="post" class="form comment_form">
            <div class="form_div">
                <label for="auteur">Auteur :</label>
                <input type="text" name="auteur" id="auteur" value="<?php echo $_SESSION['pseudo']; ?>" required />
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

        while ($data = $req->fetch()) {
            
    ?>

        <!-- Commentaires -->
        <table>
            <thead>
                <tr>
                    <th>Commentaires</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($data['commentaire']); ?></td>
                </tr>
            </tbody>
            
            <tfoot>
                <tr>
                    <td>
                        <div class="tfoot_order">
                            <p><em><?php echo htmlspecialchars($data['auteur']); ?></em></p>
                            <p><?php echo htmlspecialchars($data['date_creation_comment']); ?></p>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php

        }

        $req->closeCursor();

    ?>
    
</body>
</html>