<html>
<head>
<title>update records</title>
</head>
<body>
<?php
$db=mysqli_connect('localhost','root','');
mysqli_select_db($db,'multiuserlogin');
$sql="select * from paper";
$records=mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Title Of the Paper</th>
<th>Title of the Seminar</th>
<th>Date of Conference</th>
<th>Venue</th>
<th>Level</th>
<th>Keynote Speaker</th>
</tr>
<?php
while($row=mysqli_fetch_array($records))
{
   echo "<tr><form action=paperupdate.php method=post>";
echo "<td><input type=text name=year value='".$row['titlepaper']."'</td>";
echo "<td><input type=text name=username value='".$row['titleseminar']."'</td>";
echo "<td><input type=text name=qualification value='".$row['dateconference']."'</td>";
echo "<td><input type=text name=designation value='".$row['venue']."'</td>";
echo "<td><input type=text name=appointment value='".$row['level']."'</td>";
echo "<td><input type=text name=category value='".$row['keynote']."'</td>";
echo "<td><input type=hidden name=id value='".$row['id']."'</td>";
echo "<td><input type=submit VALUE=UPDATE >";

echo "</form></tr>";
}
?>
</body>
</html>