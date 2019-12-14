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
$titlepaper=$_POST['titlepaper'];
$titleseminar=$_POST['titleseminar'];
$dateconference=$_POST['dateconference'];
$venue=$_POST['venue'];
$level=$_POST['level'];
$keynote=$_POST['keynote'];


if(!empty($titlepaper) || !empty($titleseminar) || !empty($dateconference) || !empty($venue) || !empty($level) || !empty($keynote))
{

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO paper(titlepaper,titleseminar,dateconference,venue,level,keynote)values(?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssss",$titlepaper,$titleseminar,$dateconference,$venue,$level,$keynote);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Registered Successfully")</script>';
 echo "<script> location.href='updateteacher.php'</script>";
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
 <h2>Paper Published</h2>
<form id="registration" method="post">

 <input type="text" name="titlepaper" id="button" placeholder="Title of the paper"><br>

          <br>

          <input type="text" name="titleseminar" id="button" placeholder="Titleof the conference/seminar/journal"><br>
          <br>
          <input type="Date" name="dateconference" id="button" placeholder="Published Date"><br>
          <br>
          <input type="text" name="venue" id="button" placeholder="Published Venue"><br>
          <br>
          <input type="text" name="level" id="button" placeholder="Level(national/international)"><br>
          <br>
          <input type="text" name="keynote" id="button" placeholder="Keynote Speaker" ><br>
          <br>
           <input type="submit" value="submit" id="butt" name="register">
    
              
 </form>
</div>
</body>
</html>
