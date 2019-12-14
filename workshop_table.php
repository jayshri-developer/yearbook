<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>id</th>
<th>type</th>
<th>title</th>
<th>date</th>
<th>venue</th>
<th>level</th>
<th>award</th
<th></th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `id`, `type`, `title`, `date`, `venue`, `level`, `award` FROM `workshop`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["type"] . "</td><td>" . $row["title"]. "</td><td>" . $row["date"] . "</td><td>" . $row["venue"] . "</td><td>"  . $row["level"] . "</td><td>"  . $row["award"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>