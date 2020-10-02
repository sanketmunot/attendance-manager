<?php
    session_start();
    if (!$_SESSION["user"]) {
        header('location:index.php');
    }
    include('db.php');
    $sheet=$_GET['sheet'];
    $handler = $_SESSION['user'];
    $class = $_SESSION['class'];

    $sql = 'INSERT INTO register (sheet,class,handler) VALUES("'.$sheet.'","'.$class.'","'.$handler.'")';
    
    mysqli_query($conn, $sql);
    header("location:loggedin.php");
?>