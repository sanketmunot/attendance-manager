<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
include('db.php');
$psw=$_POST['psw'];
$name = $_POST['name'];
$uid = $_POST['uid'];

$sql = 'SELECT * FROM user WHERE id="'.$uid.'" ';
$res = mysqli_num_rows(mysqli_query($conn, $sql));

if($res == 0){
    $sql = 'INSERT INTO user (id,name,psw) VALUES("'.$uid.'","'.$name.'","'.$psw.'")';
    // echo $sql;
    mysqli_query($conn, $sql);
    echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('Successfully Signed Up! Please Login');
    window.location.replace('index.php');
</SCRIPT>";

}
else{
    echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('user exist try again');
    window.location.replace('index.php');
</SCRIPT>";
}
?>
