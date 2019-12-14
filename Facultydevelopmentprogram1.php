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
$title1=$_POST['title1'];
$mdate1=$_POST['mdate1'];
$venue1=$_POST['venue1'];
$level1=$_POST['level1'];
$title2=$_POST['title2'];
$mdate2=$_POST['mdate2'];
$venue2=$_POST['venue2'];
$level2=$_POST['level2'];
$title3=$_POST['title3'];
$mdate3=$_POST['mdate3'];
$venue3=$_POST['venue3'];
$level3=$_POST['level3'];
$title4=$_POST['title4'];
$mdate4=$_POST['mdate4'];
$venue4=$_POST['venue4'];
$level4=$_POST['level4'];
$title5=$_POST['title5'];
$mdate5=$_POST['mdate5'];
$venue5=$_POST['venue5'];
$level5=$_POST['level5'];
if(!empty($title1) || !empty($mdate1) || !empty($venue1) || !empty($level1) || !empty($title2) || !empty($mdate2) || !empty($venue2) || !empty($level2)||!empty($title3) || !empty($mdate3) || !empty($venue3) || !empty($level3)||!empty($title4) || !empty($mdate4) || !empty($venue4) || !empty($level4)||!empty($title5) || !empty($mdate5) || !empty($venue5) || !empty($level5))
{   

if(mysqli_connect_error())
{
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{

$INSERT="INSERT INTO facultty(title1,mdate1,venue1,level1,title2,mdate2,venue2,level2,title3,mdate3,venue3,level3,title4,mdate4,venue4,level4,title5,mdate5,venue5,level5)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt=$conn->prepare($INSERT);
$stmt->bind_param("issssssii",$title1,$mdate1,$venue1,$level1,$title2,$mdate2,$venue2,$level2,$title3,$mdate3,$venue3,$level3,$title4,$mdate4,$venue4,$level4,$title5,$mdate5,$venue5,$level5);
$stmt->execute();
echo "New record inserted successfully";
echo '<script type="text/javascript">alert("Registered Successfully")</script>';
 echo "<script> location.href='multiuserlogin.php'</script>";

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
</head>
<body>
 <div class="log-box">
 <h2>Faculty Development Program</h2>
<form id="registration" method="post">
 <ul>
  <li>Represher Courses</li>
  <ul>
     <input type="text" name="title1" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate1" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue1" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level1" id="button" placeholder="Enter Level of the Program"><br>
          <br>
           
  </ul>
  <li>HRD Programs </li>
  <ul>
     <input type="text" name="title2" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate2" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue2" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level2" id="button" placeholder="Enter Level of the Program"><br>
          <br>
         
  </ul>
  <li>Orientation Courses</li>
  <ul>
     <input type="text" name="title3" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate3" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue3" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level3" id="button" placeholder="Enter Level of the Program"><br>
          <br>
  </ul>
  <li>Short-Term Training Program</li>
  <ul>
     <input type="text" name="title4" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate4" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue4" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level4" id="button" placeholder="Enter Level of the Program"><br>
          <br>
           
  </ul>
  <li>Others</li>
  <ul>
     <input type="text" name="title5" id="button" placeholder="Enter Title of the Program"><br>
          <br>
          <input type="date" name="mdate5" id="button" placeholder="Enter Date of the Program"><br>
          <br>
          <input type="text" name="venue5" id="button" placeholder="Enter Venue of the Program"><br>
          <br>
          <input type="text" name="level5" id="button" placeholder="Enter Level of the Program"><br>
          <br>
           <input type="submit" value="submit" id="butt" name="register">
    
  </ul>
 

 </form>
</div>
</body>
</html>
