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

    <h1>Écrivez et partagez vos idées !</h1>

    <form action="billet_post.php" method="post">
        <div class="form">
            <div class="form_div">
                <label for="auteur">Auteur :</label>
                <input type="text" name="auteur" id="auteur" required>
            </div>
            <div class="form_div">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" required>
            </div>
            <div class="form_div">
                <label for="contenu">Contenu :</label>
                <input type="text" name="contenu" id="contenu" required>
            </div>
            <div class="form_div">
                <input type="submit" value="Soumettre">
            </div>
        </div>
    </form>

    <div>
        <a href="index.php">Tous les posts =></a>
    </div>
    
</body>
</html>