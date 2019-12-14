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
<th>Title Of the Paper</th>
<th>Title of the Seminar</th>
<th>Date of Conference</th>
<th>Venue</th>
<th>Level</th>
<th>Keynote Speaker</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `titlepaper`, `titleseminar`, `dateconference`, `venue`, `level`, `keynote` FROM `paper`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["titlepaper"]. "</td>
<td>" . $row["titleseminar"] . "</td>
<td>" . $row["dateconference"]. "</td>
<td>" . $row["venue"] . "</td>
<td>" . $row["level"] . "</td>
<td>" .$row["keynote"] ."</td>
<td> <a href='papertable.php'>
<button>Edit</button>
</a></td>
</tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table><ul>
</body>
</html>