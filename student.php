<?php
 // db connect
 require_once 'conn.php';

 if(isset($_POST['updateStudent']))
{
  $student_id = $_POST['student_id'];
 $student_name = $_POST['student_name'];
 $degree_id = $_POST['degree_id'];
 $query  = "UPDATE students SET student_name = '$student_name', degree_id ='$degree_id' WHERE student_id='$student_id'";
 $result = mysqli_query($conn, $query);
   if (!$result) echo "INSERT failed: $query<br>" .  
     $conn->error . "<br><br>";

}
if(isset($_POST['addStudent']))
{
 $student_name = $_POST['student_name'];
 $degree_id = $_POST['degree_id'];
$query = "INSERT INTO students (student_name,degree_id) VALUES ('$student_name', '$degree_id')";
$result = mysqli_query($conn, $query);

if (!$result) echo "INSERT failed: $query<br>" .  
$conn->error . "<br><br>";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

</head>
<body>
<?php 
 include_once 'sidebar.php';
?>
<div class="main">

<table>
  <tr>
    <th>
    <a href="addStudent.php">Add New Student</a>
  </th>
  </tr>
<tr>
  <th>Student_ID</th>
  <th>Student_Name</th>
  <th>Student_Degree</th>
  <th>operations</th>

</tr>
<?php
$query  = "SELECT * FROM  students";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{

while($row = mysqli_fetch_assoc($result))
{
  ?>
  
<tr>
             <td><?php echo $row["student_id"]?></td>
             <td> <?php echo $row["student_name"]?></td>
             <td><?php echo $row["degree_id"]?></td>
            <td><a href="updateStudent.php?updateid=<?php echo $row["student_id"] ?>" class="button"><input type="submit" value="update"></a>
            <a href="delete.php?deleteid=<?php echo $row["student_id"]?>" class="button"><input type="submit" value="delete"></a></td>


</tr>
<?php 

}

}
?>
</table>

</div>

</body>
</html> 