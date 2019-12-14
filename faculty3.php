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
$title3=$_POST['title3'];
$mdate3=$_POST['mdate3'];
$venue3=$_POST['venue3'];
$level3=$_POST['level3'];


if(!empty($title3) || !empty($mdate3) || !empty($venue3) || !empty($level3))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO faculty3(title3,mdate3,venue3,level3)values(?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$title3,$mdate3,$venue3,$level3);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Submit Data Successfully")</script>';
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
 <h2>Represher Courses</h2>
<form id="registration" method="post">
 <input type="text" name="title3" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate3" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue3" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level3" id="button" placeholder="Enter Level of the Program"><br>
          <br>
                <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>

