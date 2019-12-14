<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="UPDATE socialactivities SET id='$_POST[id]',title='$_POST[title]',date='$_POST[date]',venue='$_POST[venue]',level='$_POST[level]',award='$_POST[award]' where id='$_POST[id]'";
if(mysqli_query($db,$sql)){
header("refresh:1; url=personal_t.php");
echo '<script type="text/javascript">alert(" data updated successfully ")</script>';
                 echo "<script> location.href='socialactivities_t.php'; </script>";
}
else{
echo "not";}
?>
