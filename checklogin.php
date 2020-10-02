<?php
include('db.php');
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
$_SESSION['user'] = $_POST['user'];
$_SESSION['psw'] = $_POST['psw'];

$sql = 'SELECT psw FROM user WHERE id="'.$_SESSION['user'].'"';

$psw = mysqli_fetch_assoc(mysqli_query($conn, $sql))['psw'];

if($psw == $_SESSION['psw']){
    header("location:loggedin.php");
}
else{
    echo "<script type='text/javascript'> alert('wrong credentials') </script>";
    header ("location:index.php");
}
?>