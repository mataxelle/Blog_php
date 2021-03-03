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

    <title>Blogii</title>
</head>
<body>

    <header>
        <div class="Titre_h1"><h1>Bienvenue sur Blogii</h1></div>
        <div class="navig"><nav>
            <ul>
                <li><?php echo $_SESSION["pseudo"]; ?><li>
                <li><a href="profil.php">Mon compte</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>    
        </nav></div>
    </header>

    <h3>Un blog de partages d'avis sur tout et n'importe quoi ;-)</h3>

    <p><a class="link" href="billet_form.php">Pour écrire un post c'est par ici !!!</a></p>

    <?php

        include("connexion_bdd.php");

        $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');

        while ( $donnees = $reponse->fetch()) {
    ?>        

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
                <tr>
                    <td><a href="billetComment.php?billet=<?php echo ($donnees['id']); ?>">Commentaires</a></td>
                </tr>
            </tfoot>
        </table>

    <?php    

        }

        $reponse->closeCursor();
    ?>
     
    <div>
        <a class="link" href="billet_form.php">Pour écrire un post c'est par ici !!!</a>
    </div>
    
</body>
</html>