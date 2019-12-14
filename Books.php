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
$coauthor=$_POST['coauthor'];
$publisher=$_POST['publisher'];
$title=$_POST['title'];
$year=$_POST['year'];
$isbn=$_POST['isbn'];
if(!empty($coauthor) || !empty($publisher) || !empty($title) || !empty($year) || !empty($isbn))
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
$SELECT="SELECT * from boook where isbn=?";
$INSERT="INSERT INTO boook(coauthor,publisher,title,year,isbn)values(?,?,?,?,?)";
$stmt=$conn->prepare($SELECT);
$stmt->execute();
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0){
$stmt->close();
$stmt=$conn->prepare($INSERT);
$stmt->bind_param("sssii",$coauthor,$publisher,$title,$year,$isbn);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Registered Successfully")</script>';
 echo "<script> location.href='main.php'</script>";
}else{
echo "Already registered";
}
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
 <h2>Books</h2>
<form id="registration" method="post">

 <input type="text" name="coauthor" id="button" placeholder="Enter the Co-author"><br>

          <br>

          <input type="text" name="publisher" id="button" placeholder="Enter the Publisher"><br>
          <br>
          <input type="text" name="title" id="button" placeholder="Enter the Title"><br>
          <br>
          <input type="number" name="year" id="button" placeholder="Enter the Year"><br>
          <br>
          <input type="number" name="isbn" id="button" placeholder="Enter the ISBN NO"><br>
          <br>
           <input type="submit" value="submit" id="butt" name="register">
    
              
 </form>
</div>
</body>
</html>
