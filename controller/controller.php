<?php

    require('model/model.php');

    //connexion/inscription

    //Routeur page

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

    function addPost() {

        $reqAddPost = post_Form();

        require('view/post_form.php');

        if ($reqAddPost === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\' ajouter le post!');
        } else {
            header('Location: index.php');
        }
        
        //require('view/post_form.php');

    }

    function addComment() {

        $reqAddComment = postComment();

        if ($reqAddComment === false) {
            throw new Exception('Impossible d\' ajouter le commentaire!');
        } else {
            header('Location: index.php?action=post&id=' . $_GET['id'] . '');
        }
        
    }

    function UpdateComment() {

        $reqUpdateComment = Update_Comment();

        if ($reqUpdateComment === false) {
            throw new Exception('Impossible de modifier le commentaire!');
        } else {
            header('Location: index.php');
        }
        
    }

    function m_Account() {

        $getMember = memberAccount();

        require('view/memberAccount.php');

    }