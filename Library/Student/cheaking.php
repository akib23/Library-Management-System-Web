
<!---------------------------CHECKING USERNAME AND ID IN DATABASE--------------------------->
<?php 

$db=mysqli_connect("localhost","root","","library");

if (!$db) {
	die("connection failed".mysqli_connect_error());
}

if(isset($_POST['roll_no']))
{
 

 $query1=mysqli_query($db,"select * from student where roll='$_POST[roll_no]' ");
	$count1=mysqli_num_rows($query1);

 if($count1>0)
 {
  echo "The Id is already used";
 }
 else
 {
  echo "Available";
 }
 exit();
}

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $query=mysqli_query($db,"select * from student where username='$name' ");
	$count=mysqli_num_rows($query);

 if($count>0)
 {
  echo "The username is already used";
 }
 else
 {
  echo "Available";
 }
 exit();
}

 ?>