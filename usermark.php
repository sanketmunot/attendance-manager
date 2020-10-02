<?php
    session_start();
    if (!$_SESSION["user"]) {
        header('location:index.php');
    }
    include('db.php');
    $sql = 'SELECT strength FROM class WHERE handler="' . $_SESSION['user'] . '" AND name="' . $_POST['class'] . '"';
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);    
    $size = "size=".$row['strength'];
    $class = "&clas=".$_POST['class'];
    $_SESSION['class'] = $_POST['class'];
    $url = 'window.open("mark1.php?'.$size.$class.'","_self")';
    echo "<script>".$url."</script>";
    
?>