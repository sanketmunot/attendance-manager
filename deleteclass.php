<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
$name = $_POST['name'];
include('db.php');
$sql = "DELETE FROM class WHERE name='" . $name . "'";
mysqli_query($conn, $sql);
header('location:addclass.php');
?>