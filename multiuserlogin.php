<!doctype html>
<?php
$servername="localhost";
$Username="root";
$password="";
$dbname="multiuserlogin";
$conn=mysqli_connect($servername,$Username,$password,$dbname);

if(isset($_POST['Login']))
{
    $user=$_POST['user'];
     $pass=$_POST['pass'];
      $usertype=$_POST['usertype'];

      $query="SELECT * FROM `multiuserlogin` WHERE username='".$user."' and password='".$pass."' and usertype='".$usertype."' ";
       $result=mysqli_query($conn,$query);
       $num= mysqli_num_rows($result);
      if($num==1)
      {
        while ($row=mysqli_fetch_array($result))
         {
           echo '<script type="text/javascript">alert("you are login successfully and you are logined as ' .$row['usertype'].'")</script>';
        }
        if($usertype=="admin")
        {
            ?>
            <script type="text/javascript">
            window.location.href="admin.php"</script>
            <?php
            }
            else if($usertype=="teacher")
            {
              ?>
            <script type="text/javascript">
            window.location.href="teacher.php"</script>
            <?php
            }
            else
            {
              ?>
            <script type="text/javascript">
            window.location.href="student.php"</script>
            <?php
            }
            } else
            {
                
                echo '<script type="text/javascript">alert("you have to register first")</script>';

            }
        }
     
     ?>
<html>
<head>
  <title>multi user login system</title>
 <link href="login.css" rel="stylesheet" type="text/css"></link>
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<header>
		<div class="main">
	
			<ul>
				<li ><a href="home.php">Home</a></li>
				<li class="active"><a href="#">Login</a></li>
				<li><a href="register.php">Register</a></li>

			</ul>
		</div>
	</header>
<div class="log-box">
 <img class="usrimg" src="usr.png" />
 <h2>Login Page</h2>
<form method="post">
  <input type="text" name="user" id="button" placeholder="Enter your Username"><br>
          <br>
    <input type="text" name="pass" id="button" placeholder="Enter your Password"><br>
          <br>
  <select id="sp" name="usertype">
              <option >--Select Year--</option>
                      <option value="admin">admin</option>
                      <option value="teacher">teacher</option>
                      <option value="student">student</option>
                </select><br><br>
<br/>
   <input name="Login" type="submit" value="Login" />
        <br/>
 </form>
    </div>
</body>
</html>
