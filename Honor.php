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
$award=$_POST['award'];
$organization=$_POST['organization'];
$purpose=$_POST['purpose'];
$dates=$_POST['dates'];


if(!empty($award) || !empty($organization) || !empty($purpose) || !empty($dates))
{
   $host="localhost";
   $dbUsername="root";
   $dbPassword="";
   $dbname="multiuserlogin";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO hono(award,organization,purpose,dates)values(?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$award,$organization,$purpose,$dates);
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
				<li class="active"><a href="#">Home</a></li>
				<li><a href="multiuserlogin.php">Login</a></li>
				<li><a href="register.php">Register</a></li>

			</ul>
		</div>
	</header>
 <div class="log-box">
 <h2>Honors/Prizes</h2>
<form id="registration" method="post">
 <input type="text" name="award" id="button" placeholder="Enter Award Title"><br>

          <br>

          <input type="text" name="organization" id="button" placeholder="Enter name of Organization"><br>
          <br>
           <input type="text" name="purpose" id="button" placeholder="Enter Purpose"><br>
          <br>
          <input type="date" name="dates" id="button" placeholder="Enter Date Venue)"><br>
          <br>
                <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>
