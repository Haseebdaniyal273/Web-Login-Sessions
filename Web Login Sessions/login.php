<?php
session_start();

if (isset($_SESSION["locked"])) {
	
	if (time() - $_SESSION["locked"] > 10) {
		unset($_SESSION["locked"]);
		
	}
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

	<title>Login</title>
</head>
<style type="text/css">
		*{
			background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.8)), url(login.png);
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			background-attachment: fixed; 

			margin-top: 30px;
		}

		input[type ="text"],.box input[type ="name"]
		{
border: 0;
background: none;
display: inline-block;
margin: 10px auto;
text-align: center;
border: 2px solid white;
padding: 5px 10px;
width: 300px;
outline: none;
color: white;
box-sizing: 20px;
transition: 0.25s;

		}
		 input[type ="submit"]{

border: 0;
background: none;

margin: 20px auto;
text-align: left;
border: 2px white solid;
padding: 5px 20px;

outline: none;
color: white;
box-sizing: 24px;
transition: 0.25s;
cursor: pointer;
}
input[type ="submit"]:hover{
    background: #1569C7;
transition: 0.50s;
}

	</style>
<body>
<div class="container text-center"> 
	<h1 class="text-center" style="color: white; font-family: 'Pacifico', cursive;">Sign in form</h1>
	<form method="POST">
		<label style="color: white;">Enter Your Email</label><br>
		<input type="text" name="email" placeholder="Enter Email" required=""><br>
		<label style="color: white;">Enter Your Password</label><br>
		<input type="text" name="password" placeholder="Enter Password" required=""><br><br>
		<?php 
		if ($_SESSION["attempts"] > 3) {
			$_SESSION["locked"] = time();
	echo "<p>Wait for 10min</p>";
	}
	else{
	?>	

		<input type="submit" name="submit" value="Login"><br>
<?php } ?>
	</form>
	<p style="color: white; text-align: ;">Click Here to go on Signup<br> <a href="index.php" class="btn btn-info">Signup</a> </p>
</div>

</body>
</html>
<?php
include 'dB.php';

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_search = "select *from registration where email ='$email'";
	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);

	if ($email_count) {
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass  = $email_pass['password'];
		// echo "$db_pass";

		$_SESSION['username'] = $email_pass['username'];
		// $pass_decode = password_verify($password, $db_pass);
		// echo "$password";
		// $pass_decode

	if ($password == $db_pass) {
		echo "Login Successfully";
		?>
		<script>
			location.replace("home.php");
		</script>
		<?php
	}
	else{
		$_SESSION["attempts"] += 1 ;
		?>
		<div style="color: red; text-align: center;">
		<p>--->>> Password Incorrect <<<---</p><br>
		</div>
		<?php
	}
	}else{
		?>
		<div style="color: red; text-align: center;">
		<p>--->>> Invalid Email <<<---</p><br>
	</div>
		<?php
	}

}
?>
