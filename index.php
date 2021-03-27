<?php
    require('controller/controller.php');

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
        elseif ($_GET['action'] == 'postForm') {
                /*if (!empty($_POST['auteur']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
                    postForm($_POST['auteur'], $_POST['titre'], $_POST['contenu']);
                } 
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }*/
                postForm();
        }
        elseif ($_GET['action'] == 'memberAccount') {
            m_Account();
        }
    }
    else {
        allPosts();
    }