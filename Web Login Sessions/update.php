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
	/*background: black;*/
			background: url(n.jpg);
			background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		background-attachment: fixed; 
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
<body class="container">
<div>
	<form action="" method="POST" enctype="multipart/form-data">
		<?php 
		
		include 'db.php';		

		$id = $_GET['id'];
		
		$selectquery = "select *from registration where id = $id";
		$query = mysqli_query($con,$selectquery);

		$res = mysqli_fetch_assoc($query);

		if (isset($_POST['submit'])) {
	$id = $_GET['id'];
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

// $emailcount = mysqli_num_rows($query);
$emailcount = mysqli_num_rows(mysqli_query($con,$emailquery)); 

$contactquery = "select *from registration where contact ='$contact' ";
$nquery = mysqli_query($con,$contactquery);
// $contactcount = mysqli_num_rows($nquery);
$contactcount = mysqli_num_rows(mysqli_query($con,$contactquery)) ;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// print_r($file);
$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

$file_ext = explode('.', $filename);

// print_r($file_ext);

$file_ext_check = strtolower(end($file_ext));
echo $file_ext_check;

$valid_file_ext = array('png');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($emailcount>0) {
	?>
	<div style="color: red; text-align: center;">
		<p>--->>> Contact Already Available <<<---</p>
	</div>
<script type="text/javascript">
		window.location="update.php"
	</script>
	<?php
}
	elseif ($contactcount>0) {
	?>
	
	<div style="color: red; text-align: center;">
		<p>--->>> Contact Already Available <<<---</p>
	</div>
<script type="text/javascript">
		window.location="update.php"
	</script>

	<?php
}

elseif ($password === $cpassword ) {
		
	

if($fileerror === 0){

	if (in_array($file_ext_check,$valid_file_ext)) {
	
	 $destfile = 'upload/'.$filename;

	 move_uploaded_file($filepath, $destfile);


	 $upadtequery = "update registration set id = $id, username='$username', email='$email', contact='$contact',password='$password',cpassword='$cpassword',pic='$destfile' where id = $id";
	$query = mysqli_query($con,$upadtequery);
	
	 if ($query) {
	 	echo "updated";
	 }else{
	 	echo "Not updated";
	 }
	 header('location:display.php');
}else{
	?>
		<div style="color: red; text-align: center;">
		<p>--->>> Not Valid Extention <<<---</p><br>
		<p>Note : Data Not inserted Please Select .png files only</p>
		</div>
	<script type="text/javascript">
		window.location="update.php"
	</script>
	<?php
}

}

}else{
?>
	<div style="color: red; text-align: center;">
		<p>--->>> Password Not Matched <<<---</p><br>
	</div>
	<script type="text/javascript">
		window.location="update.php"
	</script>
	<?php
 }

}		

		?>
		<br>
		<input type="text" name="username" placeholder="Username" required="" value="<?php echo $res['username']; ?>"><br>

		<input type="email" name="email" placeholder="Email" required="" value="<?php echo $res['email']; ?>"><br>

		<input type="tel" name="mobile" placeholder="Contact Info" required="" value="<?php echo $res['contact']; ?>"><br>

		<input type="text" name="password" placeholder="Password" required="" value="<?php echo $res['password']; ?>"><br>

		<input type="text" name="cpassword" placeholder="Confirm Password" required="" value="<?php echo $res['cpassword']; ?>"><br>

		<input type="file" name="photo" required="" value="<?php echo $res['pic']; ?>"><br><br>

		<input type="submit" name="submit" value="Update">
 
	</form>

	<div style="color: white;">
		<p>Click Here for login again <br><a class="btn btn-primary" href="login.php">Login</a> </p>
	</div>
	 <div class="text-center">
		<p><strong> Click Here to go Sign up and Enter New Data in this Database</strong></p><br>
			<a class="btn btn-info" href="index.php">Sign Up</a>
	</div>
<!--  =  _ -->
</div>
</body>
</html>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////