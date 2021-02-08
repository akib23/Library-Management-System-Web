<!DOCTYPE html>
<html>
<head>
	<title>E-Library</title>
	


<!------------------------------STYLING-------------------------------->

	<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}

body{
	background-image: url('Img/home.jpg');
	background-repeat: no-repeat;
	background-size: cover;

}
.main1{
	
	height: 150px;
	width: 760px;
	float: center;
	margin: auto;
	margin-top: 150px;

}
.main2{
	height: 60px;
	width: 625px;
	float: center;
	margin: auto;
	background-color:#2A2929;
	margin-top: 160px;
}
.main1 h1{
	color: white;
	font-size: 90px;
	text-align: center;
	margin-top: -20px;

}
ul{
	list-style-type: none;
	


}
ul li{
			
			text-align: center;
			float: left;
			font-size: 25px;
			padding:15px;
			

}
ul li a{
	text-decoration: none;
	color: white;
	font-size: 25px;
}


ul li a:hover{
	color: darkorange;
	
}


.main1 p{
	
	color: white;
	text-align: center;
}
.footer{
	margin-top: 330px;
	height: 65px;
	background-color: rgba(39, 103, 114, 0.69);
	}
.footer p{
	color: white;
	text-align: center;
	font-size: 20px;

}


.main1 img{ 
	float: center;
	margin: auto;
}


	</style>
</head>
<body>
	

	<div class="main1">
		<center><img src="img/b.png" width="200px" height="200px"></center>
		<h1>E-Library</h1>
		<p>Welcome to online library</p>
		</div>
		<br>
		<br>
		<br>
		<div class="main2">
		<ul>
			
			<li><a href="books.php">Books</a>
			</li>
			<li><a href="Student/login.php">Student Log In</a>
			</li>
			<li><a href="Librarian/alogin.php">Librarian Log In</a>
			</li>
			<li><a href="about.php">About</a>
			</li>
			
		</ul>
	</div>

	<div class="footer">
		<br>
		<p>All rights reserved to Akib ikbal</p>
	</div>

</body>
</html>