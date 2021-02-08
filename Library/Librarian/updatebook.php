<?php 
session_start();
 	$db=mysqli_connect("localhost","root","","library");

		if (!$db) {
	die("connection failed".mysqli_connect_error());
}
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
			<li><a href="#"><?php echo $_SESSION['admin_user']; ?></a>
			</li>
			<li><?php include('logout.php'); ?>
			</li>
		</ul>
	</div>





<div id="mySidenav" class="sidenav">
  <a style="text-decoration:none; " href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  <a style="text-decoration:none; " href="newbook.php">Add Books</a>
  <a style="text-decoration:none; " href="request.php">Books Request</a>
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
   

<?php
		
		$sql = "SELECT * FROM books WHERE bid='$_SESSION[id]';";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$id=$row['bid'];
			$name=$row['name'];
			$author=$row['author'];
			$edition=$row['edition'];
			$status=$row['status'];
			$quantity=$row['quantity'];
		}

	?>

<div class="main4">
	<br><br><br>
<h1><center>Update Book Information</center></h1>
<br>
<br>
<form name="Registration" action="" method="post">
	<div class="login">
		<input class="form-control" type="text" name="bid" placeholder="Id" required="" readonly value="<?php echo $id; ?>"><br>
		<input class="form-control" type="text" name="name" placeholder="Name" required="" value="<?php echo $name; ?>"><br>
		<input class="form-control" type="text" name="author" id="Author" placeholder="Username" required="" value="<?php echo $author; ?>"><br>
		<input class="form-control" type="text" name="edition" placeholder="edition" required="" value="<?php echo $edition; ?>"><br>
		<input class="form-control" type="text" name="status" placeholder="status" required="" value="<?php echo $status; ?>"><br>
		<input class="form-control" type="number" name="quantity" placeholder="quantity" required="" value="<?php echo $quantity; ?>"><br> <br>
		<input class="btn btn-light" type="submit" name="update" value="Update" style="color: black; width:100px; height: 40px;">
	</div>
</form>

</div>

	



<!-----------------------------------------------Update--------------------------------------------------->


<?php 

		if(isset($_POST['update']))
		{
			$id=$_POST['bid'];
			$name=$_POST['name'];
			$author=$_POST['author'];
			$edition=$_POST['edition'];
			$status=$_POST['status'];
			$quantity=$_POST['quantity'];

			$sql1= "UPDATE books SET bid='$id', name='$name', author='$author', edition='$edition', status='$status', quantity='$quantity' WHERE bid='".$_SESSION['id']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Updated Successfully.....");
						window.location="abooks.php";
					</script>
				<?php
			}
		}
 	?>




	</div>
</body>
</html>