<?php
include('db.php');
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <script src="css/fa.css"></script>


</head>

<body style="background-color:black;">
    <div id="heading"><b> ATTENDANCE MANAGER </b></div>

    <br>
    <?php include('navbar.php'); ?>
    <br><br>
    <div class='container'>
        <div class="row">
            <div class='col-sm-4'>
                <center>
                    <form action="newclass.php" method="POST">
                        <input class="row details form-control" type="text" name="name" placeholder="Enter Class Name" required><br>
                        <input class="row details form-control" type="number" name="strength" placeholder="Enter Number of Students" required><br>
                        <input class="row details form-control" type="number" name="batch" placeholder="Enter Batch (year)" required><br>
                        <button class="btn btn-success">ADD</button>
                    </form>
                </center>
            </div>

            <div class='col' style="color: white;">
                <?php
                $sql = 'SELECT * FROM class WHERE handler="' . $_SESSION['user'] . '"';
                $res = mysqli_query($conn, $sql);
                $card = [
                    '"card text-white bg-primary mb-3 col-sm-5 offset-sm-1"',
                    '"card text-white bg-info mb-3 col-sm-7 offset-sm-1"',
                    '"card text-white bg-success mb-3 col-sm-5 offset-sm-1"',
                    '"card text-white bg-danger mb-3 col-sm-4 offset-sm-1"',
                    '"card text-white bg-warning mb-3 col-sm-6 offset-sm-1"',
                ];
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class=<?php echo $card[rand(0, 10000) % 5]; ?> style="width: 18rem; float:left;">
                        <div class="card-header card-title">
                            <form action="deleteclass.php" method="POST">
                                <h4><?php echo $row['name']; ?>
                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" hidden>
                                    <button type="submit" class="btn">
                                        <i class="fa fa-trash-o offset-md-2" style="font-size:24px; cursor:pointer;"></i></h4>
                                </button>

                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "Strength : " . $row['strength']; ?></h5>
                            <p class="card-text"><?php echo $row['batch']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>