</!DOCTYPE html>
<?php
$servername="localhost";
$Username="root";
$password="";
$dbname="multiuserlogin";
session_start();
$conn=mysqli_connect($servername,$Username,$password,$dbname);
if(isset($_POST['register']))
{
$title5=$_POST['title5'];
$mdate5=$_POST['mdate5'];
$venue5=$_POST['venue5'];
$level5=$_POST['level5'];


if(!empty($title5) || !empty($mdate5) || !empty($venue5) || !empty($level5))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO faculty5(title5,mdate5,venue5,level5)values(?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$title5,$mdate5,$venue5,$level5);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Registered Successfully")</script>';
 echo "<script> location.href='Facultydevelopmentprogram.php'</script>";

$stmt->close();
$conn->close();
}
}
else{
echo "All field are required";
die();
}
}
?>

<html>
<head>
 <title></title>
 <link href="Register1.css" rel="stylesheet" type="text/css"></link>
 <link href="faculty1.css" rel="stylesheet" type="text/css"></link>	
</head>
<body>
<header>
		<div class="main">
	
			<ul>
				<li class="active"><a href="#">Home</a></li>
				<li><a href="multiuserlogin.php">Login</a></li>
				<li><a href="register.php">Register</a></li>

			</ul>
		</div>
	</header>
 <div class="log-box">
 <h2>Others</h2>
<form id="registration" method="post">
 <input type="text" name="title5" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate5" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue5" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level5" id="button" placeholder="Enter Level of the Program"><br>
          <br>
                <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>

