<html>
<head>
<title>update records</title>
</head>
<body>
<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="select * from personal";
$records=mysqli_query($db,$sql);
?>
<table>
<tr>
<th>YEAR</TH>
<th>username</th>
<th>qualification</th>
<th>designation</th>
<th>appointment</th>
<th>category</th>
<th>nature</th>
<TH>PHONE CODE</TH>
<th>phone</th>
</tr>
<?php
while($row=mysqli_fetch_array($records))
{
   echo "<tr><form action=personalupdate.php method=post>";
echo "<td><input type=text name=year value='".$row['year']."'</td>";
echo "<td><input type=text name=username value='".$row['username']."'</td>";
echo "<td><input type=text name=qualification value='".$row['qualification']."'</td>";
echo "<td><input type=text name=designation value='".$row['designation']."'</td>";
echo "<td><input type=text name=appointment value='".$row['appointment']."'</td>";
echo "<td><input type=text name=category value='".$row['category']."'</td>";
echo "<td><input type=text name=nature value='".$row['nature']."'</td>";
echo "<td><input type=text name=phonecode value='".$row['phonecode']."'</td>";
echo "<td><input type=text name=phone value='".$row['phone']."'</td>";
echo "<td><input type=hidden name=id value='".$row['id']."'</td>";
echo "<td><input type=submit VALUE=UPDATE >";

echo "</form></tr>";
}
?>
</body>
</html>