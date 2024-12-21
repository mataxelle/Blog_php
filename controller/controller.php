<?php

// require_Once assure qu'on ne charge qu'une fois les classes
require_once('model/AccountManager.php');
require_once('model/CommentManager.php');
require_once('model/PostManager.php');

//connexion/inscription
function sign_Up()
{

    $signUpManager = new \MonEntreprise\Bloggi\Model\AccountManager();
    $sigUp = $signUpManager->signUp();

    header('Location: index.php');
}

function log_In()
{

    $logInManager = new \MonEntreprise\Bloggi\Model\AccountManager();
    $logIn = $logInManager->logIn();

    header('Location: index.php?action=allPosts');
}

//Routeur page

function allposts()
{

    $postManager = new \MonEntreprise\Bloggi\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/indexView.php');
}

function post()
{

    $postManager = new \MonEntreprise\Bloggi\Model\PostManager();
    $commentManager = new \MonEntreprise\Bloggi\Model\CommentManager();

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }

    require('view/postView.php');
}

function addPost()
{

    $postManager = new \MonEntreprise\Bloggi\Model\PostManager();
    $reqAddPost = $postManager->post_Form();

    if ($reqAddPost === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\' ajouter le post!');
    } else {
        require('view/post_form.php');
    }

    //require('view/post_form.php');

}

function addComment()
{

    $commentManager = new \MonEntreprise\Bloggi\Model\CommentManager();
    $reqAddComment = $commentManager->postComment();

    if ($reqAddComment === false) {
        throw new Exception('Impossible d\' ajouter le commentaire!');
    } else {
        header('Location: index.php?action=post&id=' . $_GET['id'] . '');
    }
}

function UpdateComment()
{

    $commentManager = new \MonEntreprise\Bloggi\Model\CommentManager();
    $reqUpdateComment = $commentManager->Update_Comment();

    if ($reqUpdateComment === false) {
        throw new Exception('Impossible de modifier le commentaire!');
    } else {
        header('Location: index.php?action=allPosts');
    }
}

function m_Account()
{

    $accountManager = new \MonEntreprise\Bloggi\Model\AccountManager();
    $getMember = $accountManager->memberAccount();

    require('view/memberAccount.php');
}
