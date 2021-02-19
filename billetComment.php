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

    <?php

        try {
            
            $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (\Throwable $th) {
            
            die('Erreur :' .$th->getMessage());

        }

        //Récupération post
        $req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
        $req->execute(array(
            $_GET['billet']
        ));

        $donnees = $req->fetch();
    ?>        

        <div>
            <a href="index.php" class="link">Tous les posts =></a>
        </div>

        <div><a class="link" href="billet_form.php">Pour écrire un post c'est par ici !!!</a><div>

        <table>
            <thead>
                <tr>
                    <th><?php echo htmlspecialchars($donnees['titre']); ?></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <p><?php echo htmlspecialchars($donnees['contenu']); ?></p>
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td>
                        <div class="tfoot_order">
                            <p><em><?php echo htmlspecialchars($donnees['auteur']); ?></em></p>
                            <p><?php echo htmlspecialchars($donnees['date_creation']); ?></p>
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
                <input type="text" name="auteur" id="auteur" required />
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

        while ($donnees = $req->fetch()) {
            
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
                    <td><?php echo htmlspecialchars($donnees['commentaire']); ?></td>
                </tr>
            </tbody>
            
            <tfoot>
                <tr>
                    <td>
                        <div class="tfoot_order">
                            <p><em><?php echo htmlspecialchars($donnees['auteur']); ?></em></p>
                            <p><?php echo htmlspecialchars($donnees['date_creation_comment']); ?></p>
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