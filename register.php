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
    $id=$_POST['id'];
     $user=$_POST['username'];
      $pass=$_POST['password'];
     $mail=$_POST['emailid'];
     $add=$_POST['address'];
      $phono=$_POST['phoneno'];
	$usertype=$_POST['usertype'];
      $query="SELECT * FROM `multiuserlogin` WHERE username='$user'";
       $result=mysqli_query($conn,$query);
	$num= mysqli_num_rows($result);
      if($num==1)
      {
  echo '<script type="text/javascript">alert("username already taken")</script>';
       }
	else
	{
		$reg="insert into multiuserlogin(id,username,password,email,address,phone_no,usertype) values('$id','$user','$pass','$mail','$add','$phono','$usertype')";
 	       mysqli_query($conn,$reg);
		echo '<script type="text/javascript">alert("you are register successfully ")</script>';
                 echo "<script> location.href='multiuserlogin.php'; </script>";
	} 
    } 
 ?>


<html>
<head>
 <title></title>
 <link href="register.css" rel="stylesheet" type="text/css"></link>
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<header>
		<div class="main">
	
			<ul>
				<li ><a href="home.php">Home</a></li>
				<li><a href="multiuserlogin.php">Login</a></li>
				<li class="active"><a href="#">Register</a></li>

			</ul>
		</div>

</header>	
 <div class="log-box">
 <img class="usrimg" src="usr.png" />
 <h2>Registration Form</h2>
<form id="registration" method="post">
   <input type="ID" name="id" id="button" placeholder="Enter your Id"><br>
          <br>
          <input type="text" name="username" id="button" placeholder="Enter your Username"><br>
          <br>
          <input type="password" name="password" id="button" placeholder="Enter your Password"><br>
          <br>
          <input type="email" name="emailid" id="button" placeholder="Enter your E-mail"><br>
          <br>
          <input type="address" name="address" id="button" placeholder="Enter your Address"><br>
          <br>
          <select id="ph">
                      <option>+91</option><option>+92</option><option>+93</option><option>+94</option><option>+95</option>
                </select>
          <input type="number" name="phoneno" id="btn" placeholder="Enter your Contact No" id="phone"><br>
          <br>
          <select id="sp" name="usertype" >
              <option >--Select--</option>
		      
                      <option>Teacher</option>
                      <option>Student</option>
                </select><br>
                <br>
                <input type="submit" value="Register" id="butt" name="register"/>
    
        <br/>
 </form>
</div>
</body>
</html>