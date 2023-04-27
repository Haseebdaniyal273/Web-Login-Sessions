<?php

include 'db.php';

$id = $_GET['id'];

$deletequery = "delete from registration where id = $id";

$dquery = mysqli_query($con,$deletequery);

if ($dquery) {
	?>
		<script>alert('Deleted')</script>
	 	<!-- echo "Deleted"; -->

	<?php
	header('location:display.php');
	 }else{
	 ?>
		<script>alert('Not Deleted')</script>
	 	<!-- echo "Deleted"; -->
	<?php
	 }
	 header('location:display.php');
?>