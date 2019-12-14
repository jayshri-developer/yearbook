<html>
<head>
<title>update records</title>
</head>
<body>
<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="select * from socialactivities";
$records=mysqli_query($db,$sql);
?>
<table>
<tr>
<th>id</th>
<th>Title</th>
<th>date</th>
<th>venue</th>
<th>level</th>
<th>award</th>
<th></th>
</tr>
<?php
while($row=mysqli_fetch_array($records))
{
   echo "<tr><form action=socialactivitiesupdate.php method=post>";
echo "<td><input type=text name=id value='".$row['id']."'</td>";
echo "<td><input type=text name=title value='".$row['title']."'</td>";
echo "<td><input type=text name=date value='".$row['date']."'</td>";
echo "<td><input type=text name=venue value='".$row['venue']."'</td>";
echo "<td><input type=text name=level value='".$row['level']."'</td>";
echo "<td><input type=text name=award value='".$row['award']."'</td>";
echo "<td><input type=submit VALUE=UPDATE >";


echo "</form></tr>";
}
?>
</body>
</html>