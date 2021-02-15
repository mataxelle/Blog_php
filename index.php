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

    <h1>Bienvenue sur Blogii</h1>

    <h3>Un blog de partages d'avis sur tout et n'importe quoi ;-)</h3>

    <?php

        try {
            
            $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //Ce paramètre permet d'activer les erreurs des req SQL

        } catch (\Throwable $th) {
            
            die('Erreur :' .$th->getMessage());

        }

        $reponse = $bdd->query('SELECT * FROM billets');

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
                    <td><a href="">Commentaires</a></td>
                </tr>
            </tfoot>
        </table>

    <?php    

        }

        $reponse->closeCursor();
    ?>

    <a class="link_comment" href="billet_form.php">Pour écrire un post c'est par ici !!!</a>
    
</body>
</html>