<?php
    if ($_GET['nr_concurs_caine']) {
        include 'inc/conectare_la_bd.php';
        $nr_concurs_caine = $_GET['nr_concurs_caine'];
        
        $sql = "DELETE FROM caini WHERE nr_concurs='$nr_concurs_caine'";
        mysqli_query($link,$sql);
        
        header('Location: administrare.php');
    }
    die('Nu exista acest cod pentru stere.');
?>