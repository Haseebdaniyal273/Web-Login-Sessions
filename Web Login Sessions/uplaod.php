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
	?><!-- 
	<script>alert('Email Already Available');
	alert('Data Not Inserted');
header('location:index.php');
	</script> -->
	<p>Email Already Available</p>

	<?php
}
	elseif ($contactcount>0) {
	?>
	<!-- <script>alert('Contact Already Available');
	alert('Data Not Inserted');
	</script> -->
<script type="text/javascript">
		alert("Contact Already Available");
		alert("Data Not Inserted ");
		window.location="index.php"
	</script>

	<?php
}

elseif ($password === $cpassword ) {
		
	

if($fileerror === 0){

	if (in_array($file_ext_check,$valid_file_ext)) {
	
	 $destfile = 'upload/'.$filename;

	 // echo "$destfile";
	 move_uploaded_file($filepath, $destfile);

	 $insertquery = "INSERT INTO registration( username, email, contact, password, cpassword, pic) VALUES ('$username','$email','$contact','$password','$cpassword','$destfile')";
	$query = mysqli_query($con,$insertquery);
	
	 if ($query) {
	 	echo "inserted";
	 }else{
	 	echo "Not inserted";
	 }
	 header('location:index.php');
}else{
	?>
	<script type="text/javascript">
		alert("Not Valid Extention");
		alert("Data Not inserted Please Select .png files only");
		window.location="index.php"
	</script>
	<?php
}

}

}else{
?>
	<script type="text/javascript">
		alert("password Not Matched");
		alert("Data Not Inserted ");
		window.location="index.php"
	</script>
	<?php
 }

}		

?>
