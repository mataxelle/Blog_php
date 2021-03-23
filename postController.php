<?php
    require('model.php');

    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    
    require('postView.php');
?>