<style type="text/css">
*{margin: 0;padding: 0;box-sizing:border-box;font-style: 'Poppins',sans-serif;}
.main-div{
	width: 100%; height: 100vh;
	/*background-color: #B3E5FC;*/
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center; 
}
.center-div{
	width: 90%; height: 80vh;
	/*background-color: #E1F5FE;*/
	background: -webkit-linear-gradient(left,#5DADE2,#00c6ff)
	padding : 20px 0 0 0;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,0.3);
	border-radius: 10px;
	/*align-items: center;	*/
}
h1{
	font-size: 18px;
	color: #000;
	text-align: center;
	margin-top: -20px;
	margin-bottom: 20px;
}	
table{
	/*border-spacing: 5;*/
	border-collapse: collapse;
	background-color: #fff;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,0.3);
	border-radius: 10px;
	margin: auto;
}
th,td{
	border :1px solid #f2f2f2;
	padding: 8px 30px;
	text-align: center;
	color: grey; 
}
th{
	text-transform: uppercase;
	font-weight: 500;
}
td{
	font-size: 13px;
}
.email-style{
	font-size: 14px;
	color: grey;
	display: inline-block;
	background: #f2f2f2;
	-webkit-border-radius : 2px;
	-moz-border-radius : 2px; 
	border-radius : 2px;
	line-height: 30px;
	padding: 0 14px;
}
.post-class{
	text-transform: uppercase;
}
.fa{
	font-size: 18px;
}
.fa-edit{color: #63c76a;}
.fa-trash{color: #ff0000;}
a{text-decoration: none; display: flex; justify-content: center; text-align: center;}
/*insert page*/
.register{
	background: -webkit-linear-gradient(left,#3931af , #00c6ff);
	margin-top: 3%;
	padding: 3%;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,0.3);
}
.register-left{
	text-align: center;
	color: #fff;
	margin-top: 4%;
}
.register-left a{
	text-decoration: none;
	border: none;
	border-radius: 1.5rem;
	padding: 2%;
	width: 60%;
	background: #f8f9fa;
	font-weight: bold;
	color: #383d41;
	margin: auto;
	cursor: pointer;
}
.register-right{
	background: #f8f9fa;
	border-top-left-radius: 10% 50%:
	border-bottom-left-radius:10% 50%;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,0.3);
}
.register-left img{
	margin-top: 15%;
	margin-bottom: 5%;
	width: 55%;
	-webkit-animation : mover 2s infinite alternate;
	animation: mover 1s infinite alternate;
}
@-webkit-keyframes mover{
	0%{ transform: translateY(0); }
	100%{ transform: translateY(-20px); }
}

@keyframes mover{
	0%{ transform: translateY(0); }
	100%{ transform: translateY(-20px); }
}
.register-left p{
	font-weight: lighter;
	padding: 10%;
	margin-top: -5%;
}
.register .register-form{
	padding: 10%;
	margin-top: 10%;
}
.btnRegister{
	float: right;
	margin-top: 10%;
	border: none;
	border-radius: 1.5rem;
	padding: 2%;
	background: #0062cc;
	color: #fff;
	font-weight: 600;
	width: 50%;
	cursor: pointer;
}
.register .nav-tabs .nav-link : hover{
	border: none;
}
.register .nav-tabs .nav-link.active{
	width: 100px;
	color: #0062cc;
	border: 2px solid #0062cc;
	border-top-left-radius: 1.5rem:
	border-bottom-left-radius: 1.5rem;
}
.register-heading{
	font-size: 20px;
	text-align: center;
	margin-top: 8%;
	margin-bottom: -15%;
	color: #495057;
}
::placeholder{
	font-size: 14px;
}

</style>

<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<div>
<?php
if(isset($_SESSION["lock"]))
{
echo "Locked";
}
else{
?>

	<form method="POST">

		<input type="text" name="email" placeholder="Enter Email" required=""><br><br>
		<input type="text" name="password" placeholder="Enter Password" required=""><br><br>
		<input type="submit" name="submit" value="Login"><br><br>

	</form>

	<p>Back to Signup<a href="index.php">Click</a> </p>
</div>
</body>
</html>
<?php
include( 'Connection.php');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_search = "select *from userdata where Email ='$email'";
	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);
   
	if ($email_count) {
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass  = $email_pass['Password_'];
		// echo "$db_pass";

		$_SESSION['username'] = $email_pass['Username'];
		// $pass_decode = password_verify($password, $db_pass);
		// echo "$password";
		// $pass_decode

	if ($password == $db_pass) {
		echo "Login Successfully";
		?>
		<script>
			alert('You are Logged in');
			location.replace("home.php");
		</script>
		<?php
	}
	else{
    $_SESSION["attempts"]+=1;
		?>
		<script>alert('Password Incorrect');</script>
		<!-- echo "Password Incorrect"; -->
		<?php
         if($_SESSION["attempts"]>2){
            $_SESSION["lock"]="set";
                }
	}
	}else{
         $_SESSION["attempts"]+=1;
		?>
		<script>alert('Invalid Email');</script>
		<!-- echo "Invalid Email"; -->
		<?php
         if($_SESSION["attempts"]>2){
            $_SESSION["lock"]="set";
                }
	}

}
}
?>











<style type="text/css">
		*{
			background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8)), url(login.png);
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			background-attachment: fixed; 

			margin-top: 40px;
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









form

registration


	SELECT * FROM `registration` WHERE 1

	INSERT INTO `registration`(`id`, `username`, `email`, `contact`, `password`, `cpassword`, `pic`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')







	


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
		if ($_SESSION["attempts"] > 2) {
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

