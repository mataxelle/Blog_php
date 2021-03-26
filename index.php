<?php
    require('controller.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'allPosts') {
            allPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    }
    else {
        allPosts();
    }