<!doctype html>
<?php
$servername="localhost";
$Username="root";
$password="";
$dbname="multiuserlogin";
$conn=mysqli_connect($servername,$Username,$password,$dbname);

if(isset($_POST['Login']))
{
   $year=$_POST['year'];
      $usertype=$_POST['usertype'];

      $query="SELECT * FROM personal WHERE year='".$year."' and usertype='".$usertype."' ";
       $result=mysqli_query($conn,$query);
       $num= mysqli_num_rows($result);
 
        while ($row=mysqli_fetch_array($result))
         {
           echo '<script type="text/javascript">alert("you are login successfully and you are logined as ' .$row['usertype'].'")</script>';
        }
}   
     
     ?>
<html>
<head>
  <title>multi user login system</title>
 <link href="login.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
<div class="log-box">
 <img class="usrimg" src="usr.png" />
 <h2>Teacher Achievement</h2>
<form method="post">
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
  <select id="sp" name="usertype">
              <option >--Select Qualification--</option>
                      <option value="admin">MCA</option>
                      <option value="teacher">MS.C</option>
                      <option value="student">OTHER</option>
                </select><br><br>
<br/>
   <input name="Login" type="submit" value="Login" />
        <br/>
 </form>
    </div>
</body>
</html>
