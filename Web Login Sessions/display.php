<!DOCTYPE html>
<html>
<head>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
	<title>Tables</title>
	<style type="text/css">
		
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

	</style>
</head>
<body>
<div class="main-div">
	<h1>List of candidates</h1>
<div class="center-div">
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>username</th>
					<th>email</th>
					<th>contact</th>
					<th>password</th>
					<th>cpassword</th>
					<th>pic</th>
					<th colspan="2">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php 

			include 'db.php';
			

			$selectquery = "select *from registration";

			$query = mysqli_query($con,$selectquery);

			$nums = mysqli_num_rows($query);
			// echo "No of Rows is ";
			// echo $nums."<br>";


			$res = mysqli_fetch_array($query);

			while ($res = mysqli_fetch_array($query)) {
				
				?> 

				<tr>
					<td><?php echo $res['id']; ?></td>
					<td><?php echo $res['username']; ?></td>
					<td><?php echo $res['email']; ?></td>
					<td><?php echo $res['contact']; ?></td>
					<td><?php echo $res['password']; ?></td>
					<td><?php echo $res['cpassword']; ?></td>
					<td><img src="<?php echo $res['pic']; ?>" height = 50px; width = 85px; ></td>
					<td><a href="update.php?id=<?php echo $res['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="delete.php?id=<?php echo $res['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr>

				<?php
			}

			?>
				
			</tbody>
		</table>
		<div class="text-center">
				<p>Click Here to go Sign up and Enter Data in this Database</p><br>
				<a class="btn btn-info" href="index.php">Sign Up</a>
			</div>
	</div>
</div>
</div>
</body>
</html>