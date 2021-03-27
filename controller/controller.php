<?php

    require('model/model.php');

    function allposts() {

        $posts = getPosts();

        require('view/indexView.php');
    }

    function post() {

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = getPost($_GET['id']);
            $comments = getComments($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    
        require('view/postView.php');
    }

    function postForm() {

        if (!empty($_POST['auteur']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
            postForm($_POST['auteur'], $_POST['titre'], $_POST['contenu']);
        } 
        else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }

        //post_Form();

        require('view/post_form.php');

    }

    function m_Account() {

        $getMember = memberAccount();

        require('view/memberAccount.php');

    }