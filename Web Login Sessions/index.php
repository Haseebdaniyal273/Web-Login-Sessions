<?php
session_start();
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
	<title>
		Validation
	</title>
	<style type="text/css">

		*{
			background: url(n.jpg);

			margin-top: 15px;
		}

		input[type ="text"],.box input[type ="name"],input[type ="email"],.box input[type ="email"],input[type ="tel"],.box input[type ="tel"]
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
}	

	</style>
</head>
<body class="container-fluid">

<div class="row">
	<div class="col-6 col-md-6 col-12 col-sm-6">
		<h2 class="text-center" style="color: white; font-family: 'Laila', sans-serif;">Project Phase - 2</h2><br><br>
		<h1 class="text-center" style="color: white; font-family: 'Pacifico', cursive;">Sign up form</h1><br>
		<p class="text-center" style="color: white;">Fill every information carefully. </p><br>
		<p class="text-center" style="color: white;">You not sign up if Email and contact aslo available in our Database</p><br>
		<p class="text-center" style="color: white;">If you already have an account then click on button login to go on signin page</p><br><br><br><br>
		<p style="color: white;">Click Here to go directly in Database</p><br><a class="btn btn-info" href="display.php">Database Tables</a>
	</div>
	<div class="col-6 col-md-6 col-12 col-sm-6">
	<div class="register">
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="username" placeholder="Username" required=""><br>

		<input type="email" name="email" placeholder="Email" required=""><br>

		<input type="tel" name="mobile" placeholder="Contact Info" required=""><br>

		<input type="text" name="password" placeholder="Password" required=""><br>

		<input type="text" name="cpassword" placeholder="Confirm Password" required=""><br>

		<input type="file" name="photo" required=""><br><br>

		<input type="submit" name="submit">
 
	</form>

	<div>
		<p style="color: white; text-align: right;">Click Here to<br> <a href="login.php" class="btn btn-warning">Login</a> </p>
	</div>
	</div>
</div>

	

</div>
</body>


</html>

<?php
include 'db.php';

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$contact = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$file = $_FILES['photo'];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$emailquery = "select *from registration where email ='$email' ";
$query = mysqli_query($con,$emailquery);


$emailcount = mysqli_num_rows(mysqli_query($con,$emailquery)); 

$contactquery = "select *from registration where contact ='$contact' ";
$nquery = mysqli_query($con,$contactquery);

$contactcount = mysqli_num_rows(mysqli_query($con,$contactquery)) ;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

$file_ext = explode('.', $filename);



$file_ext_check = strtolower(end($file_ext));


$valid_file_ext = array('png');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($emailcount>0) {
	?>

	<div style="color: red; text-align: center;">
		<p>--->>> Email Already Available <<<---</p>
	</div>
	
	<?php
}
	elseif ($contactcount>0) {
	?>

	<div style="color: red; text-align: center;">
		<p>--->>> Contact Already Available <<<---</p>
	</div>
	
	<?php
}

elseif ($password === $cpassword ) {
		
	

if($fileerror === 0){

	if (in_array($file_ext_check,$valid_file_ext)) {
	
	 $destfile = 'upload/'.$filename;

	 
	 move_uploaded_file($filepath, $destfile);

	 $insertquery = "INSERT INTO registration( username, email, contact, password, cpassword, pic) VALUES ('$username','$email','$contact','$password','$cpassword','$destfile')";
	$query = mysqli_query($con,$insertquery);
	
	 if ($query) {
	 	echo "inserted";
	 }else{
	 	echo "Not inserted";
	 }

}else{
	?>

		<div style="color: red; text-align: center;">
		<p>--->>> Not Valid Extention <<<---</p><br>
		<p>Note : Data Not inserted Please Select .png files only</p>
		</div>
	
	<?php
}

}

}else{
?>

	<div style="color: red; text-align: center;">
		<p>--->>> Password Not Matched <<<---</p><br>
	</div>

	<?php
 }

}		

?>
