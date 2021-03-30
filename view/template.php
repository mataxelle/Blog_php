<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="styleSheet" href="public/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <div class="Titre_h1"><h1>Bienvenue sur Blogii</h1></div>
        <div class="navig"><nav>
            <ul>
                <li><?php echo $_SESSION["pseudo"]; ?><li>
                <li><a href="index.php?action=memberAccount">Mon compte</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>    
        </nav></div>
    </header>

    <?= $content ?>

    <script src="public/javascript.js"></script>
</body>
</html>