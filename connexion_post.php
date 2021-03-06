<?php

    include("model.php");

    // Regex
    /*
    if (isset($_POST["email"])) {
        
        $_POST["email"] = htmlspecialchars($_POST["email"]);

        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#", $_POST["email"])) {
            echo 'L\'adresse ' . $_POST["email"] . ' est <strong>valide</strong> !';
        } else {
            echo 'L\'adresse ' . $_POST["email"] . ' n\'est pas valide, recommencez !';
        }
    }

    if (isset($_POST["mot_de_passe"])) {
        
        $_POST["mot_de_passe"] = htmlspecialchars($_POST["mot_de_passe"]);

        if (preg_match("#[a-zA-Z0-9._?%$-]#", $_POST["mot_de_passe"])) {
            echo 'Le ' . $_POST["mot_de_passe"] . ' est <strong>valide</strong> !';
        } else {
            echo 'Le ' . $_POST["mot_de_passe"] . ' n\'est pas valide, recommencez !';
        }
    }


    if (isset($_POST["mot_de_passe"]) === isset($_POST["mot_de_passe_verification"])) {
        echo 'Vos mots de passe sont identiques';
    } else {
        echo 'Vos mots de passe ne sont pas identiques, recommencez !';
    }*/
    

    // Vérification utilisateur
    $req = $bdd->prepare('SELECT id, pseudo, mot_de_passe FROM membres WHERE email = ?');

    $req->execute(array(
    $_POST['email']
    ));

    $resultat = $req->fetch();

    // Comparaison du mot de passe présent dans la base de données
    $isPasswordCorrect = password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);

    if (!$resultat) {
        
        echo 'Attention mauvais identifiant ou mot de passe !';

    } else {
        
        if($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            $_SESSION['email'] = $_POST['email'];
            echo 'Vous êtes connecté !';
        } else {
            echo 'Attention mauvais identifiant ou mot de passe !';
        }
    }
    

    $req->closeCursor();
?>