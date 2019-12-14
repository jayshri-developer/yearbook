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
<th>company name</th>
<th>hr name</th>
<th>date</th>
<th>date</th>
<th>type</th>
<th>award</th>
<th></th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `id`, `c_name`, `hr_name`, `p_date`, `l_date`, `type`, `award` FROM `intership`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["id"]. "</td>
<td>" . $row["c_name"] . "</td>
<td>" . $row["hr_name"]. "</td>
<td>" . $row["p_date"] . "</td>
<td>" . $row["l_date"] . "</td>
<td>" . $row["type"] . "</td>
<td>" . $row["award"] ."</td>
<td> <a href='intership_table.php'>
<button>Edit</button>
</a></td>
</tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>