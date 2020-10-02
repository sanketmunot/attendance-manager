<?php
include('db.php');
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
$name = $_POST['name'];
$strength = $_POST['strength'];
$batch = $_POST['batch'];
$sql = 'INSERT INTO class (name,strength,handler,batch) VALUES("'.$name.'","'.$strength.'","'.$_SESSION['user'].'","'.$batch.'")';
mysqli_query($conn, $sql);
header('location:addclass.php')
?>