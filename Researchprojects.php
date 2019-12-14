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
$minmaj=$_POST['minmaj'];
$title=$_POST['title'];
$agency=$_POST['agency'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$status=$_POST['status'];
$sanction=$_POST['sanction'];


if(!empty($minmaj) || !empty($title) || !empty($agency) || !empty($sdate) || !empty($edate) || !empty($status) || !empty($sanction))
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

$INSERT="INSERT INTO researcher(minmaj,title,agency,sdate,edate,status,sanction)values(?,?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssssi",$minmaj,$title,$agency,$sdate,$edate,$status,$sanction);
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
 <h2>Research Projects</h2>
<form id="registration" method="post">
   <select id="button" name="minmaj"><option>--Select Type--</option>
              <option>Minor</option>
              <option>Major</option>
            </select><br>
            <br>
      
 <input type="text" name="title" id="button" placeholder="Enter your Title"><br><br>

      <input type="text" name="agency" id="button" placeholder="Enter Funding agency"><br>
          <br>
           <input type="Date" name="sdate" id="button" placeholder="Enter Start_date"><br>
          <br>
          <input type="Date" name="edate" id="button" placeholder="Enter your End_date"><br>
          <br>
          <input type="text" name="status" id="button" placeholder="Status of the Projects"><br>
          <br>
          <input type="number" name="sanction" id="button" placeholder="Fund Sanctioned"><br>
          <br>
          <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>
