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
<th>Year</th>
<th>Username</th>
<th>Qualification</th>
<th>Designation</th>
<th>Appointment</th>
<th>Category</th>
<th>Nature</th>
<th>Phone Code</th>
<th>Contact-No</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT year,username,qualification,designation,appointment,category,nature,phonecode,phone FROM personal";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["year"]. "</td>
<td>" . $row["username"] . "</td>
<td>" . $row["qualification"]. "</td>
<td>" . $row["designation"] . "</td>
<td>" . $row["appointment"] . "</td>
<td>" .$row["category"] ."</td>
<td>" . $row["nature"] ."</td>
<td>" . $row["phonecode"] ."</td>
<td>". $row["phone"] ."</td>
<td> <a href='personaltable.php'>
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