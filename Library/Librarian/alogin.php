<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Library</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>


<!--------------------STYLING-------------------->

<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
body{
	background-image: url('../Img/login.jpg');
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
	height:530px;
	width:700px;
 background-color: rgba(0, 0, 0,0.70);
float: center;
margin: auto;
margin-top: 120px;

border-radius: 100px;
}

.main4 h1{
	color: white;
}
form .login{
	
margin: auto 200px;

}
input{

 height: 30px;
 width: 300px;
}
.main5 a{
	text-decoration:none;
	font-size: 20px;
	color: white; 
}
.main5 a:hover{
	color: darkorange;
}


</style>
</head>
<body>
<div class="main2">
<div class="main3"><img src="../Img/b.png" width="50px" height="50px"><h2>E-Library</h2></div>
		<ul class="list">
			<li><a href="../home.php">Home</a>
			</li>
			<li><a href="#">About</a>
			</li>

			
		</ul>
	</div>

<div class="main4">
	<br><br><br><br>
<h1><center>Librarian Log In</center></h1>
<br>
<br>
<form name="Registration" action="" method="POST">
	<div class="login">
		<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
		<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
		<input class="btn btn-light" type="submit" name="submit" value="Log In" style="color: black; width:100px; height: 40px; float: right;">
	</div>
</form>
<br>
<br><br><br>


</div>




<!---------------------------DATABASE--------------------------->


<?php 
$db=mysqli_connect("localhost","root","","library");

if (!$db) {
	die("connection failed".mysqli_connect_error());
}
	
if (isset($_POST['submit'])) {
	$count=0;
$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
$count=mysqli_num_rows($res);
if($count==0){
?>
<div class="alert alert-warning" role="alert" style="width: 40%; float: center;margin: auto; margin-top:10px ">
  <strong><center>The username or password does not match </center></strong>
</div>

<?php
}
else{
	$_SESSION['admin_user']=$_POST[username];
	echo '<script type="text/javascript">
		         window.location = "aindex.php";         
		        </script>';
}

}

 ?>

</body>
</html>