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
            elseif ($_GET['action'] == 'memberAccount') {
                m_Account();
            }
        }
        else {
            if (!empty($_POST['email'])) {
                log_In($_POST['email']);
            } else {
                throw new Exception('Erreur : Connexion impossible, vérifiez tous les champs !');
            }
        }
    } catch (Exception $e) { // S'il y a eu une erreur, alors ...

        echo 'Erreur : ' . $e->getMessage();

        /*$errorMessage = $e->getMessage();

        require('view/errorView.php');*/
    }