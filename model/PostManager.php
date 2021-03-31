<?php

namespace MonEntreprise\Bloggi\Model;

require_once('model/Manager.php');

class PostManager extends Manager
{
    function getPosts()
    {
        $bdd = $this->dbConnect();

        $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');

        return $reponse;
    }

    function getPost()
    {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
        $req->execute(array($_GET['id']));

        $post = $req->fetch();

        return $post;
    }

    function post_Form()
    {
        $bdd = $this->dbConnect();

        $reqAddPost = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu) VALUES (?, ?, ?)');

        $reqAddPost->execute(array(
            $_POST['auteur'],
            $_POST['titre'],
            $_POST['contenu']
        ));

        return $reqAddPost;
    }
}
