<?php


    function getPosts()
    {
        include("connexion_bdd.php");

        $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');

        return $reponse;
    }

    function getPost()
    {
        include('connexion_bdd.php');

        $req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
        $req->execute(array($_GET['id']));

        $post = $req->fetch();

        return $post;
    }

    function getComments()
    {
        include('connexion_bdd.php');

        $comments = $bdd->prepare('SELECT * FROM commentaires WHERE id_post = ? ORDER BY date_creation_comment DESC');
        $comments->execute(array($_GET['id']));

        return $comments;
    }

    function post_Form() 
    {
        include('connexion_bdd.php');

        $reqAddPost = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu) VALUES (?, ?, ?)');

        $reqAddPost->execute(array(
        $_POST['auteur'],
        $_POST['titre'],
        $_POST['contenu']
        ));

        return $reqAddPost;
    }

    function postComment() 
    {
        include("connexion_bdd.php");
        
        $reqAddComment = $bdd->prepare('INSERT INTO commentaires (id_post, auteur, commentaire) VALUES (?, ?, ?)');
        
        $reqAddComment->execute(array(
        $_GET['id'],
        $_POST['auteur'],
        $_POST['commentaire']
        ));

        return $reqAddComment;
    }

    function update_Comment() 
    {
        include("connexion_bdd.php");
        
        $reqUpdateComment = $bdd->prepare('UPDATE commentaires SET commentaire = ? , date_creation_comment = NOW() WHERE id = ? ');
        
        $reqUpdateComment->execute(array(
        $_POST['commentaire'],
        $_GET['id']
        ));

        return $reqUpdateComment;
    }

    function memberAccount() 
    {
        include('connexion_bdd.php');

        $reponse = $bdd->query('SELECT * FROM membres');
        
        return $reponse;
    }