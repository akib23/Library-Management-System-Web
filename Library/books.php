<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
body{
	
	background-image: url('Img/index.jpg');
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
.main4 {
	margin-left: 30px;
	margin-right: 30px;
}

</style>

</head>
<body>
<div class="main2">
<div class="main3"><img src="Img/b.png" width="50px" height="50px"><h2>E-Library</h2></div>
		<ul class="list">
			<li><a href="home.php">Home</a>
			</li>
			<li><a href="Student/login.php">S-Login</a>
			</li>
			<li><a href="Librarian/alogin.php">L-Login</a>
			</li>
			
		</ul>
	</div>
	<div >
		<br><br>
		
		<form action="" method="post">
			<div>
				<button style="background-color: white;color: black;float: right; margin: auto;margin-top: 20px; margin-right:70px" type="submit" name="submit" class="btn btn-default">Search
				</button>
				<input style="width: 300px;float: right; margin: auto; margin-top: 20px; margin-right:10px;" class="form-control" type="text" name="search" placeholder="Search Books" required="">
				
			</div>
			

		</form>


	</div>

	<div>
		<br>
		<br>
		<br>
		<br>
		<h1 style="color:white; margin-left:30px; ">List Of Books</h1>
		<br>

	</div>

	<div class="main4">
		<?php 

		$db=mysqli_connect("localhost","root","","library");

		if (!$db) {
	die("connection failed".mysqli_connect_error());
}

			
		if(isset($_POST['submit']))
		{

			$q=mysqli_query($db,"SELECT * FROM `books` where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "<h3 style=color:red;>No Books Found</h3>";
			}
			else
			{
				echo "<table class='table table-bordered'>";
			
			echo "<tr style='background-color:orange;'>";
			echo "<th>";  echo "ID";   echo "</th>";
			echo "<th>";  echo "Book-Name";   echo "</th>";
			echo "<th>";  echo "Author Name";   echo "</th>";
			echo "<th>";  echo "Edition";   echo "</th>";  
			echo "<th>";  echo "Status";   echo "</th>";	
			echo "<th>";  echo "Quantity";   echo "</th>";

			echo "</tr>";


			while ($row=mysqli_fetch_assoc($q)) {
				
				echo "<tr style='background-color:white;'>";
				echo "<th>";  echo $row['bid'];   echo "</td>";
			echo "<td>";  echo $row['name'];   echo "</td>";
			echo "<td>";  echo $row['author'];   echo "</td>";
			echo "<td>";  echo $row['edition'];   echo "</td>";  
			echo "<td>";  echo $row['status'];   echo "</td>";	
			echo "<td>";  echo $row['quantity'];   echo "</td>";


				echo "</tr>";


			}

			echo "</table>";
			}

		}

		else
		{

				$res=mysqli_query($db,"SELECT * FROM `books`;");

			echo "<table class='table table-bordered'>";
			
			echo "<tr style='background-color:orange;'>";
			echo "<th>";  echo "ID";   echo "</th>";
			echo "<th>";  echo "Book-Name";   echo "</th>";
			echo "<th>";  echo "Author Name";   echo "</th>";
			echo "<th>";  echo "Edition";   echo "</th>";  
			echo "<th>";  echo "Status";   echo "</th>";	
			echo "<th>";  echo "Quantity";   echo "</th>";

			echo "</tr>";


			while ($row=mysqli_fetch_assoc($res)) {
				
				echo "<tr style='background-color:white;'>";
				echo "<th>";  echo $row['bid'];   echo "</td>";
			echo "<td>";  echo $row['name'];   echo "</td>";
			echo "<td>";  echo $row['author'];   echo "</td>";
			echo "<td>";  echo $row['edition'];   echo "</td>";  
			echo "<td>";  echo $row['status'];   echo "</td>";	
			echo "<td>";  echo $row['quantity'];   echo "</td>";


				echo "</tr>";


			}

			echo "</table>";

		}

		 ?>

	</div>
</body>
</html>