<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">


<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}




body {
  
  transition: background-color .5s;
  background-image: url('../Img/index.jpg');
	background-repeat: no-repeat;
	background-size: cover;
}

.sidenav {

  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #2A2929;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 55px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: darkorange;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
.main4 {
	margin-left: 30px;
	margin-right: 30px;
}

</style>

</head>
<body>
<div class="main2">
<div class="main3"><img src="../Img/b.png" width="50px" height="50px"><h2>E-Library</h2></div>
		<ul class="list">
			<li><a href="index.php">Home</a></li>
			<li><a href="#"><?php echo $_SESSION['login_user']; ?></a>
			</li>
			<li><?php include('logout.php'); ?>
			</li>
		</ul>
	</div>





<div id="mySidenav" class="sidenav">
  <a style="text-decoration:none; " href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  <a style="text-decoration:none; " href="books.php">Books</a>
  <a style="text-decoration:none; " href="issue_info.php">Issue Information</a>
</div>

<div id="main">
 
  <span style="font-size:40px;color:white;cursor:pointer" onclick="openNav()">&#9776; Menu</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
   


	<div>
		<br>
		<br>
		<br>
		<br>
		<h1 style="color:white; margin-left:30px; ">Books Request</h1>
		<br>

	</div>

	<div class="main4">
		<?php 

		$db=mysqli_connect("localhost","root","","library");

		if (!$db) {
	die("connection failed".mysqli_connect_error());
}

			
		if(isset($_SESSION['login_user']))
		{

			$q=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_SESSION[login_user]' and issueb='NO'; ");

			if(mysqli_num_rows($q)==0)
			{
				echo "<h3 style=color:red;>There is no pending request</h3>";
			}
			else
			{
				echo "<table class='table table-bordered'>";
			
			echo "<tr style='background-color:orange;'>";
			echo "<th>";  echo "Book ID";   echo "</th>";
			echo "<th>";  echo "Book Name";   echo "</th>";
			echo "<th>";  echo "Author";   echo "</th>";
			echo "<th>";  echo "Edition";   echo "</th>";
			echo "<th>";  echo "Issue Date";   echo "</th>";
			echo "<th>";  echo "Return Date";   echo "</th>";  

			echo "</tr>";


			while ($row=mysqli_fetch_assoc($q)) {
				
				echo "<tr style='background-color:white;'>";
				echo "<th>";  echo $row['bid'];   echo "</td>";
				echo "<th>";  echo $row['bname'];   echo "</td>";
				echo "<th>";  echo $row['author'];   echo "</td>";
				echo "<th>";  echo $row['edition'];   echo "</td>";
			echo "<td>";  echo $row['issueb'];   echo "</td>";
			echo "<td>";  echo $row['returnb'];   echo "</td>";  
			


				echo "</tr>";


			}

			echo "</table>";
			}

		}


		 ?>

	</div>



	</div>
</body>
</html>