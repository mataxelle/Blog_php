<?php
    function getPosts()
    {
        include("connexion_bdd.php");

        $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');

        return $reponse;
    }
