<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="UPDATE intership SET id='$_POST[id]',c_name='$_POST[c_name]',hr_name='$_POST[hr_name]',p_date='$_POST[p_date]',l_date='$_POST[l_date]',type='$_POST[type]',award='$_POST[award]' where id='$_POST[id]'";
if(mysqli_query($db,$sql)){
header("refresh:1; url=intership_t.php");
echo '<script type="text/javascript">alert(" data updated successfully ")</script>';
                 echo "<script> location.href='intership_t.php'; </script>";
}
else{
echo "not";}
?>
