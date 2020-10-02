<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
include('db.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">

</head>

<body style="background-color:black;">
    <div id="heading"><b> ATTENDANCE MANAGER </b></div>

    <br>
    <?php include('navbar.php'); ?>
    <br><br>
    <div class='container' style="color: white">
        <div style="overflow-x: auto">
            <table class="table table-dark">
                <?php
                $class = $_POST['class'];
                $handler = $_SESSION['user'];
                $sql = 'SELECT strength FROM class WHERE handler="' . $handler . '" AND name="' . $class . '"';
                $strength = mysqli_fetch_assoc(mysqli_query($conn, $sql))['strength'];
                
                $sql = 'SELECT date,sheet FROM register WHERE handler="' . $handler . '" AND class="' . $class . '"';
                $res = mysqli_query($conn, $sql);
                echo '<tr><td colspan="3"><h4>Date/Roll</h4></td>';
                for ($i = 0; $i < $strength; $i++) {
                    echo '<th>' . ($i+1) . '</th>';
                }
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($res)) {
                    $data = str_getcsv($row['sheet'], ',');
                    echo '<tr><td colspan="3">'.$row['date'].'</td>';
                    for ($i = 0; $i < $strength; $i++) {
                        echo '<td id='.$data[$i].'><h6>' . $data[$i] . '</h6></td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table> 
        </div>
    </div>

    <?php include('footer.php') ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>