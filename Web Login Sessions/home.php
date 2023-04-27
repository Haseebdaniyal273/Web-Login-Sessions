<?php

session_start();

if (!isset($_SESSION['username'])) {
	echo "You Are Logout";
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Home Page</title>
	<style type="text/css">
		*{
			background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(final.jpg) ;
			background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		background-attachment: fixed; 

			margin-top: 45px;
		}
		.n
	</style>
</head>
<body class="container text-center">
	
<div class="container N" style="color: white;">
<h1 >
	Welcome to Home Page Mr. <?php echo $_SESSION['username']; ?>
</h1><br><br>
<p><strong>Name : </strong>Muhammad Haseeb Daniyal</p>
<p><strong>Sap Id : </strong>70070353</p>
<p><strong>Section : </strong>"5-A"</p>
<p><strong>Project : </strong>Web engineering</p>
</div><br><br><br>
<div style="color: white;">

Click Here For <br><a class="btn btn-danger" href="logout.php">Logout</a>
<br><br><br>
<p>This is for project with this button u able to see list of Database</p>
Click Here to  <br><a class="btn btn-info" href="display.php">Display</a>
	
</div>
</body>
</html>

