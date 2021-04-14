<?php 

namespace MonEntreprise\Bloggi\Model;

class Manager {
    
    //DATABASE
    protected function dbConnect()
    {

        $bdd = new \PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'admin', 'sunRoot');

        return $bdd;
    }

    /*try {       Le try Catch n'est plus nécessaire car les erreurs, s'il y en a sont remontés jusqu'au routeur
            
        $bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //Ce paramètre permet d'activer les erreurs des req SQL

    } catch (\Throwable $th) {
    
        die('Erreur :' .$th->getMessage());

    }*/
}