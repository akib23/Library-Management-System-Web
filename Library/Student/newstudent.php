

<!-----------------------------------------------REGISTRATION--------------------------------------------------->
<?php 
$db=mysqli_connect("localhost","root","","library");

if (!$db) {
	die("connection failed".mysqli_connect_error());
}

?>


<?php

if(isset($_POST['submit'])) {


	 $query=mysqli_query($db,"select * from student where roll='$_POST[roll]' ");
	$count=mysqli_num_rows($query);

	$query2=mysqli_query($db,"select * from student where username='$_POST[username]' ");
	$count2=mysqli_num_rows($query2);
	if($count>0)
	{
	echo '<script type="text/javascript">
		        alert("You have already done registration.");
		        window.location =  "newstudent.php";         
		        </script>'; 
	}

 elseif ($count2>0) {
echo '<script type="text/javascript">
		        alert("You have already done registration.");
		        window.location =  "newstudent.php";         
		        </script>'; 
 }
	else{

 	
mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[phone]');");

	echo '<script type="text/javascript">
		        alert("Registration Successfull.");
		        window.location =  "login.php";         
		        </script>';

}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>E-Library</title>
	
	<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
body{
	background-image: url('../Img/newid.jpg');
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

input{

 height: 30px;
 width: 100px;
}
	</style>


<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>





<script type="text/javascript">
	function checkname()
{
 var name=document.getElementById( "UserName" ).value;
	
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'cheaking.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="Available")	
   {
	   $("#name_status").css('color', '#0AC02A', 'important');
    return true;
   }
   else
   {
	   $("#name_status").css('color', '#FF0004', 'important');
    return false;
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}
</script>


<!---------------------------Check ID--------------------------->

<script type="text/javascript">
		
		function checkid()
{
 var name1=document.getElementById( "roll_no" ).value;
	
 if(name1)
 {
  $.ajax({
  type: 'post',
  url: 'cheaking.php',
  data: {
   roll_no:name1,
  },
  success: function (response) {
   $( '#id_status' ).html(response);
   if(response=="Available")	
   {
	   $("#id_status").css('color', '#0AC02A', 'important');
    return true;
   }
   else
   {
	   $("#id_status").css('color', '#FF0004', 'important');
    return false;
   }
  }
  });
 }
 else
 {
  $( '#id_status' ).html("");
  return false;
 }
}
</script>
</head>
<body>	
<div class="main2">
<div class="main3"><img src="../Img/b.png" width="50px" height="50px"><h2>E-Library</h2></div>
		<ul class="list">
			<li><a href="../home.php">Home</a>
			</li>
			<li><a href="login.php">Log In</a>
			</li>
			<li><a href="#">About</a>
			</li>
			
		</ul>
	</div>

<div class="main4">
	<br><br><br><br>
<h1><center>User Registration</center></h1>
<br>
<br>
<form name="Registration" action="" method="post">
	<div class="login">
		<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
		<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
		<input class="form-control" type="text" name="username" id="UserName" placeholder="Username" required="" onkeyup="checkname()"><p id="name_status" style="position: absolute;"></p><br>
		<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
		<input class="form-control" type="number" name="roll" id="roll_no"  placeholder="ID No" required="" onkeyup="checkid()"><p id="id_status" style="position: absolute;"></p><br>
		<input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
		<input class="form-control" type="number" name="phone" placeholder="Mobile No" required=""><br> <br>
		<input class="btn btn-light" type="submit" name="submit" value="Sign Up" style="color: black; width:100px; height: 40px;">
	</div>
</form>

</div>
<br>
<br>
<br>






</body>
</html>