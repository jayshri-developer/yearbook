<html>
<head>
<title>update records</title>
</head>
<body>
<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="select * from intership";
$records=mysqli_query($db,$sql);
?>
<table>
<tr>
<th>id</th>
<th>company name</th>
<th>hr name</th>
<th>date</th>
<th>date</th>
<th>type</th>
<th>award</th>
<th></th>
</tr>
<?php
while($row=mysqli_fetch_array($records))
{
   echo "<tr><form action=intershipupdate.php method=post>";
echo "<td><input type=text name=id value='".$row['id']."'</td>";
echo "<td><input type=text name=c_name value='".$row['c_name']."'</td>";
echo "<td><input type=text name=hr_name value='".$row['hr_name']."'</td>";
echo "<td><input type=text name=p_date value='".$row['p_date']."'</td>";
echo "<td><input type=text name=l_date value='".$row['l_date']."'</td>";
echo "<td><input type=text name=type value='".$row['type']."'</td>";
echo "<td><input type=text name=award value='".$row['award']."'</td>";
echo "<td><input type=submit VALUE=UPDATE >";


echo "</form></tr>";
}
?>
</body>
</html>