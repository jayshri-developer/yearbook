<?php
$host="localhost";
$user="root";
$password="";
$database="college";
$id="";
$fname="";
$lname="";
$age="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
            $connect=mysqli_connect($host,$user,$password,$database);
}
catch(Exception $ex){
          echo 'Error';
}
function getPosts()
{
$posts=array();
$posts[0]=$_POST['id'];
$posts[1]=$_POST['fname'];
$posts[2]=$_POST['lname'];
$posts[3]=$_POST['age'];
return $posts;
}
if(isset($_POST['search']))
{
$data=getPosts();
$searchQuery="SELECT * FROM users WHERE id=$data[0]";
$search_Result=mysqli_query($connect,$searchQuery);
if($search_Result)
{
  if(mysqli_num_rows($search_Result))
{
   while($row=mysqli_fetch_array($search_Result))
{
$id=$row['id'];
$fname=$row['fname'];
$lname=$row['lname'];
$age=$row['age'];
}
}
else{
echo 'no data found for this id';
}
}else{
echo 'Result Error';
}
}

if(isset($_POST['insert']))
{
$data=getPosts();
$insert_Query="INSERT INTO `users`(`fname`, `lname`, `age`) VALUES ('$data[1]','$data[2]','$data[3]')";
try{
         $insert_Result=mysqli_query($connect,$insert_Query);
         if($insert_Result)
         {
           if(mysqli_affected_rows($connect)>0)
            {
                echo 'data inserted';
            }
              else{
                  echo 'data not inserted';
               }
           }
}   catch(Exception $ex){
echo 'Error Insert'.$ex->getMessage();
}
}
if(isset($_POST['delete']))
{
$data=getPosts();
$delete_Query="DELETE FROM `users` where `id`=$data[0]";
try{
$delete_Result=mysqli_query($connect,$delete_Query);
if($delete_Result)
{
if(mysqli_affected_rows($connect)>0)
{
echo 'data deleted';
}
else{
echo 'data not deleted';
}
}
}catch(Exception $ex){
echo 'Error Delete'.$ex->getMessage();
}
}

if(isset($_POST['update']))
{
$data=getPosts();
$update_Query="UPDATE `users` SET `fname`='$data[1]',`lname`='$data[2]',`age`='$data[3]' WHERE `id`=$data[0]";
try{
$update_Result=mysqli_query($connect,$update_Query);
if($update_Result)
{
if(mysqli_affected_rows($connect)>0)
{
echo 'data updated';
}
else{
echo 'data not updated';
}
}
}catch(Exception $ex){
echo 'Error Delete'.$ex->getMessage();
}
}
?>
<html>
<body>
<form action="insdelsearch.php" method="post">
<input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
<input type="text" name="fname" placeholder="First Name"  value="<?php echo $fname;?>"><br><br>
<input type="text" name="lname" placeholder="Last Name"  value="<?php echo $lname;?>"><br><br>
<input type="number" name="age" placeholder="Age"  value="<?php echo $age;?>"><br><br>
<div>
<input type="submit" name="insert" value="Add">
<input type="submit" name="update" value="Update">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="search" value="Search">
</div>
</form>
</body>
</html>
