<?php
session_start();
if (!$_SESSION["user"]) {
	header('location:index.php');
}
include('db.php');
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.cs">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- <script type="text/javascript" src="script.js"></script> -->
</head>
<body style="background-color:black;">	
	<div id="heading"><b> ATTENDANCE MANAGER </b></div>
    <?php include('navbar.php') ?>
	<div class="row">
		<div class="container-fluid mr-1 col-sm-2" ></div>
		<div class="container-fluid mr-1 col-sm" >
			
			<br><br>

			<div class='row' id="parent">

			</div>


			<br><br>

			<div class="row">
				<div style="color: white;" class="col"></div>
				<div id = "absentall" onclick="absentall()" style="color: red;"><b><h4>Mark all absent</h4></b></div>&nbsp;&nbsp;&nbsp;
				<div id = "presentall" onclick="presentall()" style="color: green;"><b><h4>Mark all present</h4></b></div>
				<div style="color: white;" class="col"></div>
			</div>
			<br>

			<div class="row">
				<div style="color: white;" class="col"></div>
				<div id ="submit" onclick="usersubmit()" class="col" style="color: red; background-color:white;"><h3>SUBMIT</h3></div>&nbsp;&nbsp;&nbsp;
				
				
				<div style="color: white;" class="col"></div>
			</div>
			<br>
			<div class="row">
				<div class="col"></div>
				<a class='col btn-primary' href="loggedin.php" id="reset"><h4><strong>RESET</strong></h4></a>
				<div class="col"></div>
			</div>
		</div>	

		<div class="container-fluid mr-1 col-sm-2" >
		</div>
		<?php include('footer.php') ?>
		<script type="text/javascript" src="script.js"></script>
	</body>
	</html>