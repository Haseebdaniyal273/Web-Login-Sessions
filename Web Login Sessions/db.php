<?php

$server = 'localhost';
$user = "root"; 
$password = "";
$db = 'form';

$con = mysqli_connect($server,$user,$password,$db);

 if ($con) {

?>
	<div style="color: green; text-align: center;">
		<p>Connected With Database</p><br>
	</div>
<?php
}
	
else{
	?>
	<div style="color: red; text-align: center;">
		<p>Not Connected With Database</p><br>
	</div>
	<?php


}


?>
