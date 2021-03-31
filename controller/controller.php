<?php

    // require_Once assure qu'on ne charge qu'une fois
    require_once('model/AccountManager.php');
    require_once('model/CommentManager.php');
    require_once('model/PostManager.php');

    //connexion/inscription
    function sign_Up() {

        $signUpManager = new AccountManager();
        $sigUp = $signUpManager->signUp();

        //header('Location: index.php');

        require('view/inscription.php');
    }

    function log_In() {

        $logInManager = new AccountManager();
        $logIn = $logInManager->logIn();

        header('Location: index.php?action=allPosts');

        //require('index.php'); non
        //require('connexion.php');
        require('view/connexion.php');
    }

    //Routeur page

    function allposts() {

        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('view/indexView.php');
    }

    function post() {

        $postManager = new PostManager();
        $commentManager = new CommentManager();

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    
        require('view/postView.php');
    }

    function addPost() {

        $postManager = new PostManager();
        $reqAddPost = $postManager->post_Form();

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

        $commentManager = new CommentManager();
        $reqAddComment = $commentManager->postComment();

        if ($reqAddComment === false) {
            throw new Exception('Impossible d\' ajouter le commentaire!');
        } else {
            header('Location: index.php?action=post&id=' . $_GET['id'] . '');
        }
        
    }

    function UpdateComment() {

        $commentManager = new CommentManager();
        $reqUpdateComment = $commentManager->Update_Comment();

        if ($reqUpdateComment === false) {
            throw new Exception('Impossible de modifier le commentaire!');
        } else {
            header('Location: index.php');
        }
        
    }

    function m_Account() {

        $accountManager = new AccountManager();
        $getMember = $accountManager->memberAccount();

        require('view/memberAccount.php');

    }