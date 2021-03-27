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

        $req = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu) VALUES (?, ?, ?)');

        $req->execute(array(
        $_POST['auteur'],
        $_POST['titre'],
        $_POST['contenu']
        ));

        return $req;

        //header('Location: index.php');
    }

    function memberAccount() 
    {
        include('connexion_bdd.php');

        $reponse = $bdd->query('SELECT * FROM membres');
        
        return $reponse;
    }