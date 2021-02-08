<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="post">
	
<input class="btn btn-secondary" type="submit" value="Log Out" name="logout">

</form>

<?php 
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location: ../home.php');
	}
 ?>
</body>
</html>