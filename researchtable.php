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
<th>Type</th>
<th>Title</th>
<th>Funding Agency</th>
<th>Start Date</th>
<th>End Date</th>
<th>Status</th>
<th>Sanction</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `minmaj`, `title`, `agency`, `sdate`, `edate`, `status`, `sanction` FROM `researcher` ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["minmaj"]. "</td><td>" . $row["title"] . "</td><td>" . $row["agency"]. "</td><td>" . $row["sdate"] . "</td><td>" . $row["edate"] . "</td><td>" .$row["status"] ."</td><td>" . $row["sanction"] ."</td></tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>