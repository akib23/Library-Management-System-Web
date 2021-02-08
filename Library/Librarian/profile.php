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


.table1{
	color: white;
	font-size: 20px;
	
}
.table1 th, td {
  padding: 15px;
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



	<div class="main4">
	<br><br>
<h1><center>Librarian Profile</center></h1>
<br>
<br>
<div class="main5">
<center>
	<?php 

		$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[admin_user]' ;");

		$row=mysqli_fetch_assoc($q);

		echo "<b>";
 				echo "<table class='table1'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['first'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['phone'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";

	 ?>
		
</center>
</div>
<br><br>

<form action="" method="post">
 			<button class="btn btn-light" style=" float:right; width: 70px; margin-right: 50px;" name="edit" type="submit">Edit</button>
 		</form>


</div>
			


	<?php 

		if(isset($_POST['edit']))
 			{
 				?>
 				<script type="text/javascript">
 					window.location="edit.php"
 				</script>
 				<?php
 			}




	 ?>




</body>
</html>