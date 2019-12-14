<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="UPDATE paper SET titlepaper='$_POST[titlepaper]',titleseminar='$_POST[titleseminar]',dateconference='$_POST[dateconference]',venue='$_POST[venue]',level='$_POST[level]',keynote='$_POST[keynote]' where id='$_POST[id]'";
if(mysqli_query($db,$sql)){
header("refresh:1; url=paper_t.php");
echo '<script type="text/javascript">alert(" data updated successfully ")</script>';
                 echo "<script> location.href='paper_t.php'; </script>";
}
else{
echo "not";}
?>
