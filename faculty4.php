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
$title4=$_POST['title4'];
$mdate4=$_POST['mdate4'];
$venue4=$_POST['venue4'];
$level4=$_POST['level4'];


if(!empty($title4) || !empty($mdate4) || !empty($venue4) || !empty($level4))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO faculty4(title4,mdate4,venue4,level4)values(?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$title4,$mdate4,$venue4,$level4);
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
 <h2>Short-Term Training Program</h2>
<form id="registration" method="post">
 <input type="text" name="title4" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate4" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue4" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level4" id="button" placeholder="Enter Level of the Program"><br>
          <br>
                <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>

