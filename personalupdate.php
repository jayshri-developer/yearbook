<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="UPDATE personal SET year='$_POST[year]',username='$_POST[username]',qualification='$_POST[qualification]',designation='$_POST[designation]',appointment='$_POST[appointment]',category='$_POST[category]',nature='$_POST[nature]',phonecode='$_POST[phonecode]',phone='$_POST[phone]' where id='$_POST[id]'";
if(mysqli_query($db,$sql)){
header("refresh:1; url=personal_t.php");
echo '<script type="text/javascript">alert(" data updated successfully ")</script>';
                 echo "<script> location.href='personal_t.php'; </script>";
}
else{
echo "not";}
?>
