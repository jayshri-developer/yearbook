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
	$type=$_POST['type'];
	$title=$_POST['title'];
	$date=$_POST['date'];
	$venue=$_POST['venue'];
    $level=$_POST['level'];
	$award=$_POST['award'];
if(!empty($type) || !empty($title) || !empty($date) || !empty($venue) || !empty($level)|| !empty($award))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO workshop(type,title,date,venue,level,award)values(?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssss",$type,$title,$date,$venue,$level,$award);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Registered Successfully")</script>';
 echo "<script> location.href='main.php'</script>";
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
				<li><a href="home.php">Home</a></li>
				<li><a href="multiuserlogin.php">Login</a></li>
				<li><a href="register.php">Register</a></li>

			</ul>
		</div>
	</header>
 <div class="log-box">
 <h2>Workshop</h2>
<form id="registration" method="post">
       <select id="button" name="type">
			<option>--Select Type--</option>
            <option>CSI</option>  
            <option>ACM</option>
            <option>Others(Specify)</option>
			</select><br>
          <br>
          <input type="text" name="title" id="button" placeholder="Enter Name of HR"><br>
          <br>
          <input type="date" name="date" id="button" placeholder="Enter Start_date of Offer"><br>
          <br>
          <input type="text" name="venue" id="button" placeholder="Enter End_date of Offer"><br>
          <br>
          <input type="text" name="level" id="button" placeholder="Enter Placement/Internship"><br>
          <br>
           <input type="text" name="award" id="button" placeholder="Enter Package Offered by Company"><br>
          <br>
           <input type="submit" value="submit" id="butt" name="register">
              
 </form>
</div>
</body>
</html>









