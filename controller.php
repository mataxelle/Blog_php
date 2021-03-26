<?php

    require('model.php');

    function allposts() {

        $posts = getPosts();

        require('indexView.php');
    }

    function post() {

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = getPost($_GET['id']);
            $comments = getComments($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    
        require('postView.php');
    }