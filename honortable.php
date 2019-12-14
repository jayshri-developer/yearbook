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
<th>Award</th>
<th>Organization</th>
<th>Purpose</th>
<th>Dates</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `award`, `organization`, `purpose`, `dates` FROM `hono` ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["award"]. "</td><td>" . $row["organization"] . "</td><td>"
. $row["dates"]. "</td><td>" . $row["purpose"] . "</td></tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>