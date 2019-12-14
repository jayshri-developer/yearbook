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
<th>Coauthor</th>
<th>Publisher</th>
<th>Title</th>
<th>Year</th>
<th>Isbn No</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "multiuserlogin");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `coauthor`, `publisher`, `title`, `year`, `isbn` FROM `boook` ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["coauthor"]. "</td><td>" . $row["publisher"] . "</td><td>" . $row["title"]. "</td><td>" . $row["year"] . "</td><td>" . $row["isbn"] . "</td></tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>