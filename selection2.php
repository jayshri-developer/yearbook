<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT `year`, `username`, `qualification`, `designation`, `appointment`, `category`, `nature`, `phonecode`, `phone`, `id` FROM `personal` WHERE CONCAT(`year`, `username`, `qualification`, `designation`, `appointment`, `category`, `nature`, `phonecode`, `phone`, `id`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
   
}
 else {
    $query = "SELECT `year`, `username`, `qualification`, `designation`, `appointment`, `category`, `nature`, `phonecode`, `phone`, `id` FROM `personal`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "multiuserlogin");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
		body {
 margin: 0;
 padding: 0;
 font-family: sans-serif;

background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)) ,url(#.jpg);
	height: 100vh;
	background-size: cover;
	background-color: #111;
	background-position: center;
}
            table,tr,th,td
            {
                border: 1px solid white;
				color: white;
            }
        </style>
    </head>
    <body>
       
        <form action="selection1.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter the year"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
           
            <table>
                <tr>
                    <th>year</th>
                    <th>username</th>
                    <th>qualification</th>
                    <th>designation</th>
					<th>appointment</th>
				
					<th>category</th>
					<th>nature</th>
                    <th>phonecode</th>
                    <th>phone</th>
					<th>id</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['year'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['qualification'];?></td>
                    <td><?php echo $row['designation'];?></td>
					<td><?php echo $row['appointment'];?></td>
					<td><?php echo $row['category'];?></td>
					<td><?php echo $row['nature'];?></td>
					<td><?php echo $row['phonecode'];?></td>
					<td><?php echo $row['phone'];?></td>
					<td><?php echo $row['id'];?></td>
				
                </tr>
                <?php endwhile;?>
            </table>
        </form>
       
    </body>
</html>
