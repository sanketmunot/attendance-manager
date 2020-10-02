<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:loggedin.php');
}
?>
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

	
	<div class="container" >
		<hr style="background-color: grey; height: 5px;">
		<br><br><br><br>
		<div class="row">
			<div class="col"></div>
			
			<div class="col">
				<div class="container">
					<button class="btn btn-warning btn-block" id="btnlogin" onclick="shoLogin()">Login</button><br>
					<button class="btn btn-danger btn-block" id="btnano" onclick="showAno()">Anonymous</button>
				</div>
				<form class = "col" id="ano" style="display: none;" method="POST">
					<input class="row details form-control" id="clas" type="text" name="cls" placeholder ="Enter Class" required><br>
					<input class="row details form-control" id="size" type="number" name="student" placeholder="Enter Number of Students" required><br>
					<br><button class="row details form" onclick="details()">SUBMIT</button>
				</form>

				<form class = "col" id="loginform" action="checklogin.php" style="display: none;" method="POST">
					<input class="row details form-control" type="text" name="user" placeholder ="Enter User Name" required><br>
					<input class="row details form-control" type="password" name="psw" placeholder="Enter Password" required><br>
					<br><button type='submit' class="row details form">SUBMIT</button>
					<br><a onclick="regi()" style="color: blue;"><u>Need an account! Click here.</u></a>
				</form> 
			</div>
			<div class="col">	
			<form method="POST" id="reg" style="display: none;" action="addnewuser.php">
				<input type="text" name="name" placeholder="Full name" class="row details form-control"><br>
				<input type="text" name="uid"  placeholder="userid" class="row details form-control"><br>
 				<input type="password" name="psw" placeholder="Enter Password" class="row details form-control">
				<br><button type="submit" class="btn btn-success">Sign Up</button>
			</form>	
			</div>
		</div>
	</div>	
	<?php include('footer.php') ?>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>