<?php
    require('controller/controller.php');

    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'allPosts') {
                allPosts();
            }
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else { // On arrête tout, on envoie une exception, donc on saute directement au catch
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'addPost') {
                if (!empty($_POST['auteur']) && !empty($_POST['auteur']) && !empty($_POST['auteur'])) {
                    addPost($_POST['auteur'], $_POST['auteur'], $_POST['auteur']);
                } else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
                
                //require('view/post_form.php');
            }
            elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['auteur']) && !empty($_POST['commentaire'])) {
                        addComment($_GET['id'], $_POST['auteur'], $_POST['commentaire']);
                    } 
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'updateComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['commentaire'])) {
                        updateComment($_GET['id'], $_POST['commentaire']);
                    } 
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }    
            }
            elseif ($_GET['action'] == 'sign_Up') {
                if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe_verification'])) {
                    sign_Up($_POST['pseudo'], $_POST['email'], $_POST['mot_de_passe'], $_POST['mot_de_passe_verification']);
                } 
                else {
                    throw new Exception('Erreur : Inscription impossible, tous les champs ne sont pas remplis !');
                }
            }
            elseif ($_GET['action'] == 'log_In') {
                if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
                    log_In($_POST['email'], $_POST['mot_de_passe']);
                } 
                else {
                    throw new Exception('Erreur : Connexion impossible, tous les champs ne sont pas remplis !');
                }
            }
            elseif ($_GET['action'] == 'memberAccount') {
                m_Account();
            }
        }
        else {

            require('view/connexion.php');
            //require('view/inscription.php');
        }
        
    } catch (Exception $e) { // S'il y a eu une erreur, alors ...

        echo 'Erreur : ' . $e->getMessage();

        /*$errorMessage = $e->getMessage();

        require('view/errorView.php');*/
    }