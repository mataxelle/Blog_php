<?php

require_once('model/Manager.php');

class CommentManager extends Manager
{

    function getComments()
    {
        $bdd = $this->dbConnect();

        $comments = $bdd->prepare('SELECT * FROM commentaires WHERE id_post = ? ORDER BY date_creation_comment DESC');
        $comments->execute(array($_GET['id']));

        return $comments;
    }

    function postComment()
    {
        $bdd = $this->dbConnect();

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
        $bdd = $this->dbConnect();

        $reqUpdateComment = $bdd->prepare('UPDATE commentaires SET commentaire = ? , date_creation_comment = NOW() WHERE id = ? ');

        $reqUpdateComment->execute(array(
            $_POST['commentaire'],
            $_GET['id']
        ));

        return $reqUpdateComment;
    }
}
