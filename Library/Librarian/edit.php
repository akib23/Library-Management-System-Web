<?php 
session_start();
 ?>

 <?php 
$db=mysqli_connect("localhost","root","","library");

if (!$db) {
	die("connection failed".mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
	

		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
body {
 
  background-image: url('../Img/index.jpg');
	background-repeat: no-repeat;
	background-size: cover;
}

.main2{
	height: 60px;
	width:100%;
margin-top: -5px; 
background-color: #2A2929;
}

.main2 ul{
	list-style-type: none;
	
float: right;

}
.main2 ul li{
			
			text-align: center;
			
			font-size: 25px;
			padding:15px;
			display: inline-block;

}
.main2 ul li a{
	text-decoration: none;
	color: white;
	font-size: 25px;
}
.list a{
	text-decoration: none;
}
.main2 ul li a:hover{
	color: darkorange;
	
}
.main3 h2{
	position:absolute;
	color: white;
	margin-top: 10px;
	margin-left: 65px;
}
.main3  img{
	position: absolute;
	margin-top: 7px;
	margin-left: 7px;
}
.main4{
	height:750px;
	width:750px;
 background-color: rgba(0, 0, 0,0.70);
float: center;
margin: auto;
margin-top: 100px;

border-radius: 100px;
}

.main4 h1{
	color: white;
}
form .login{
	
margin: auto 200px;

}

form.input{

 height: 30px;
 width: 100px;
}

</style>

</head>
<body>



	<div class="main2">
<div class="main3"><img src="../Img/b.png" width="50px" height="50px"><h2>E-Library</h2></div>
		<ul class="list">
			<li><a href="aindex.php">Home</a></li>
			<li><a href="profile.php"><?php echo $_SESSION['admin_user'];?></a>
			</li>
			<li><?php include('logout.php'); ?>
			</li>
			
		</ul>
	</div>


<?php
		
		$sql = "SELECT * FROM admin WHERE username='$_SESSION[admin_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['phone'];
		}

	?>






<div class="main4">
	<br><br><br>
<h1><center>Update Librarian Information</center></h1>
<br>
<br>
<form name="Registration" action="" method="post">
	<div class="login">
		<input class="form-control" type="text" name="first" placeholder="First Name" required="" value="<?php echo $first; ?>"><br>
		<input class="form-control" type="text" name="last" placeholder="Last Name" required="" value="<?php echo $last; ?>"><br>
		<input class="form-control" type="text" name="username" id="UserName" placeholder="Username" required="" readonly value="<?php echo $username; ?>"><br>
		<input class="form-control" type="text" name="password" placeholder="Password" required="" value="<?php echo $password; ?>"><br>
		<input class="form-control" type="email" name="email" placeholder="Email" required="" value="<?php echo $email; ?>"><br>
		<input class="form-control" type="number" name="phone" placeholder="Mobile No" required="" value="<?php echo $contact; ?>"><br> <br>
		<input class="btn btn-light" type="submit" name="update" value="Update" style="color: black; width:100px; height: 40px;">
	</div>
</form>

</div>
<br>
<br>
<br>


<!-----------------------------------------------Update--------------------------------------------------->


<?php 

		if(isset($_POST['update']))
		{
			
			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['phone'];

			$sql1= "UPDATE admin SET first='$first', last='$last', username='$username', password='$password', email='$email', phone='$contact' WHERE username='".$_SESSION['admin_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Updated Successfully.....");
						window.location="../home.php";
					</script>
				<?php
			}
		}
 	?>




</body>
</html>