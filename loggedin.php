<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
?>

<?php
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>

<body style="background-color:black;">
    <div id="heading"><b> ATTENDANCE MANAGER </b></div>

    <br>
    <?php include('navbar.php'); ?>
    <br><br>
    <div class='container'>
        <div class='row'>

            <div onclick='window.open("addclass.php","_self")' class="card text-white col bg-danger mb-3" style="max-width: 20rem; cursor:pointer;">
                <div class="card-header">
                    Active Classes :-
                    <?php
                    $sql = 'SELECT * FROM class WHERE handler="' . $_SESSION['user'] . '" ';
                    $res = mysqli_num_rows(mysqli_query($conn, $sql));
                    echo $res;
                    ?>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Manage Classes</h3>
                    <p class="card-text">Add or Remove class to your list.</p>
                </div>
            </div>

            <div onclick='adcmenu()' class="card text-white bg-warning mb-3 col offset-md-1" style="max-width: 20rem; cursor:pointer;">
                <div class="card-header" id="date">
                    <script type="text/javascript">
                        x = new Date()
                        document.getElementById('date').innerHTML = x.getDate() + '/' + x.getMonth() + '/' + x.getFullYear();
                    </script>
                </div>
                <div class="card-body" id="adchead" style="display: block;">
                    <h4 class="card-title">Take Attendance</h4>
                    <p class="card-text">Mark new attendance for saved classes.</p>
                </div>

                <div id="adccontent" style="overflow: auto; display: none;"><br>
                    <form action="usermark.php" method="POST">
                        <?php
                        $sql = 'SELECT name FROM class WHERE handler="' . $_SESSION['user'] . '"';
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {?>
                        <button type="submit" class="btn btn-light btn-block" name="class" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></button>
                            <?php
                        }
                        ?>
                        </form>
                </div>

            </div>

            <div onclick="vmenu()" class="card text-white bg-success mb-3 col offset-md-1" style="max-width: 20rem; cursor:pointer;">
                <div class="card-header">Till Date:
                <?php
                    $sql = 'SELECT * FROM register WHERE handler="' . $_SESSION['user'] . '" ';
                    $res = mysqli_num_rows(mysqli_query($conn, $sql));
                    echo $res;
                    ?>
                </div>
                <div class="card-body" id="vhead">
                    <h5 class="card-title">View Attendance</h5>
                    <p class="card-text">View your recorded attendance.</p>
                </div>

                <div id="vc" style="overflow: auto; display: none;"><br>
                    <form action="viewAdc.php" method="POST">
                        <?php
                        $sql = 'SELECT DISTINCT(class) as name FROM register WHERE handler="' . $_SESSION['user'] . '"';
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {?>
                        <button type="submit" class="btn btn-light btn-block" name="class" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></button>
                            <?php
                        }
                        ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
  
    <?php include('footer.php') ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>