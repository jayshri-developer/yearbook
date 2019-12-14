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
$year=$_POST['year'];
$username=$_POST['username'];
$qualification=$_POST['qualification'];
$designation=$_POST['designation'];
$appointment=$_POST['appointment'];
$category=$_POST['category'];
$nature=$_POST['nature'];
$phoneCode=$_POST['phoneCode'];
$phone=$_POST['phone'];

if(!empty($year) || !empty($username) || !empty($qualification) || !empty($designation) || !empty($appointment) || !empty($category) || !empty($nature) || !empty($phoneCode) || !empty($phone))
{
   

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO personal(year,username,qualification,designation,appointment,category,nature,phoneCode,phone)values(?,?,?,?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("issssssii",$year,$username,$qualification,$designation,$appointment,$category,$nature,$phoneCode,$phone);
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
 <h2>Personal Details</h2>
<form id="registration" method="post">
   <select id="button" name="year"><option>--Select Year--</option>
              <option>2010</option>
              <option>2011</option>
              <option>2012</option>
              <option>2013</option>
              <option>2014</option>
              <option>2015</option>
              <option>2016</option>
              <option>2017</option>
              <option>2018</option>
              <option>2019</option>
              </select><br>
<br>
 <input type="text" name="username" id="button" placeholder="Enter your full name"><br>

          <br>
		  <select id="button" name="qualification"><option>--select Qualifiaction--</option>
              <option>MCA</option>
              <option>MS.C</option>
              <option>OTHER</option>
              </select><br>
<br>
           <input type="text" name="designation" id="button" placeholder="Enter your Designation"><br>
          <br>

          <input type="Date" name="appointment" id="button" placeholder="Enter your Appointment Date(DD/MM/YYYY)"><br>
          <br>
          <input type="text" name="category" id="button" placeholder="Enter your Category"><br>
          <br>
          <input type="text" name="nature" id="button" placeholder="Enter your Nature of Appointment"><br>
          <br>
          <select id="ph" name="phoneCode">
                      <option>+91</option><option>+92</option><option>+93</option><option>+94</option><option>+95</option>
                </select>
          <input type="number" name="phone" id="btn" placeholder="Enter your Contact No" id="phone"><br>
          <br>
                <input type="submit" value="submit" id="butt" name="register">
    
        <br/>
 </form>
</div>
</body>
</html>
