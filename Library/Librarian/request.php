<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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
			<li><a href="aindex.php">Home</a></li>
			<li><a href="#"><?php echo $_SESSION['admin_user']; ?></a>
			</li>
			<li><?php include('logout.php'); ?>
			</li>
		</ul>
	</div>





<div id="mySidenav" class="sidenav">
  <a style="text-decoration:none; " href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  <a style="text-decoration:none; " href="abooks.php">Books</a>
  <a style="text-decoration:none; " href="newbook.php">Add Books</a>
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
   
	<div >
		<br>
		


	</div>

	<div>
		<br>
		<br>
		<br>
		<br>
		<h1 style="color:white; margin-left:30px; ">Request of Books</h1>
		<br>

	</div>

	<div class="main4">


		<?php 

		$db=mysqli_connect("localhost","root","","library");

		if (!$db) {
	die("connection failed".mysqli_connect_error());
}


$sql="SELECT student.username,roll,books.bid,books.name,books.author,books.edition,books.status FROM student INNER JOIN issue_book ON student.username=issue_book.username INNER JOIN books ON issue_book.bid=books.bid WHERE issue_book.issueb='NO'";

	$res=mysqli_query($db,$sql);

	if(mysqli_num_rows($res)==0){

		echo "<h3 style=color:red;>There is no pending request</h3>";
	}
	else{

		echo "<table class='table table-bordered'>";
			
			echo "<tr style='background-color:orange;'>";
			echo "<th>";  echo "Student Username";   echo "</th>";
			echo "<th>";  echo "Student ID";   echo "</th>";

			echo "<th>";  echo "Book ID";   echo "</th>";
			echo "<th>";  echo "Book Name";   echo "</th>";
			echo "<th>";  echo "Author";   echo "</th>";
			echo "<th>";  echo "Edition";   echo "</th>";
			echo "<th>";  echo "Status";   echo "</th>"; 
			echo "<th>";  echo "Action";   echo "</th>";  

			echo "</tr>";


			while ($row=mysqli_fetch_assoc($res)) {
				
				echo "<tr style='background-color:white;'>";
				echo "<th>";  echo $row['username'];   echo "</td>";
			echo "<td>";  echo $row['roll'];   echo "</td>";
			echo "<td>";  echo $row['bid'];   echo "</td>";
			echo "<td>";  echo $row['name'];   echo "</td>";
			echo "<td>";  echo $row['author'];   echo "</td>";   
			echo "<td>";  echo $row['edition'];   echo "</td>";
			echo "<td>";  echo $row['status'];   echo "</td>";

			

			echo "<td>"; echo '<form action="" method="post">'; echo'<button style="background-color: darkorange;color: white;" type="submit" name="submit" class="btn btn-default">Approve
				</button>'; echo '</form>';
		if(isset($_POST['submit'])){

		 		$_SESSION['name']=$row['username'];
		 		$_SESSION['bid']=$row['bid'];
		 		?>
		 		<script type="text/javascript">
		 			window.location="approve.php";
		 		</script>

		 		<?php

		 	}

				  echo "</td>";


				

		



	
			


				echo "</tr>";


			}

			echo "</table>";


	}


		 ?>






	</div>



	</div>
</body>
</html>