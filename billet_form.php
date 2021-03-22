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
    
    <title>Ecrire un post</title>
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

    <h2>Écrivez et partagez vos idées !</h2>

    <form action="billet_post.php" method="post">
        <div class="form">
            <div class="form_div">
                <label for="auteur">Auteur :</label>
                <input type="text" name="auteur" id="auteur" value="<?php echo $_SESSION['pseudo']; ?>" required>
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

    <div>
        <a href="index.php" class="link">Tous les posts =></a>
    </div>
    
</body>
</html>