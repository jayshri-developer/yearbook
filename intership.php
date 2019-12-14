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
$c_name=$_POST['c_name'];
$hr_name=$_POST['hr_name'];
$p_date=$_POST['p_date'];
$l_date=$_POST['l_date'];
$type=$_POST['type'];
$award=$_POST['award'];
if(!empty($c_name) || !empty($hr_name) || !empty($p_date) || !empty($l_date) || !empty($type)|| !empty($award))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO intership(c_name,hr_name,p_date,l_date,type,award)values(?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssss",$c_name,$hr_name,$p_date,$l_date,$type,$award);
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
 <h2>Intership/ Placement</h2>
<form id="registration" method="post">
       <input type="text" name="c_name" id="button" placeholder="Enter Name of Company"><br>
          <br>
          <input type="text" name="hr_name" id="button" placeholder="Enter Name of HR"><br>
          <br>
          <input type="date" name="p_date" id="button" placeholder="Enter Start_date of Offer"><br>
          <br>
          <input type="date" name="l_date" id="button" placeholder="Enter End_date of Offer"><br>
          <br>
          <input type="text" name="type" id="button" placeholder="Enter Placement/Internship"><br>
          <br>
           <input type="number" name="award" id="button" placeholder="Enter Package Offered by Company"><br>
          <br>
           <input type="submit" value="submit" id="butt" name="register">
              
 </form>
</div>
</body>
</html>









