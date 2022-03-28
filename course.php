
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
 require_once 'sidebar.php';
?>
<div class="main">

<table>
<tr>
    <th>
    <a href="addcourse.php">Add New Course</a>
  </th>
<tr>
  <th>Course_id</th>
  <th>Course_Name</th>
  <th>Credit_Hours</th>
  <th>operations</th>

</tr>
<?php
 // db connect
 require_once 'conn.php';

 // delete code

 if(isset($_GET['deleteid']))
  {
    $course_id = $_GET['deleteid'];
    $query  = "DELETE FROM `courses` WHERE course_id='$course_id'";
    $result = mysqli_query($conn, $query);
  	if ($result)
    {
       header('location:course.php');
    } 
    else{
      echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
    }
  }


  // update course 
if(isset($_POST['update']))
{
  $course_id = $_POST['course_id'];

$course_name   =$_POST['course_name'];
$credit_hours = $_POST['credit_hours'];
$query  = "UPDATE `courses` SET course_name='$course_name', credit_hours='$credit_hours' WHERE course_id='$course_id'";
$result = mysqli_query($conn, $query);


if (!$result) echo "INSERT failed: $query<br>" .  
$conn->error . "<br><br>";
}

 // add course

if(isset($_POST['addcourse']))
{
$course_name   =$_POST['course_name'];
$credit_hours = $_POST['credit_hours'];
$query = "INSERT INTO courses (course_name,credit_hours) VALUES ('$course_name', '$credit_hours')";
$result = mysqli_query($conn, $query);

if (!$result) echo "INSERT failed: $query<br>" .  
$conn->error . "<br><br>";
}

$query  = "SELECT * FROM courses";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{

while($row = mysqli_fetch_assoc($result))
{
  ?>
<tr>
             <td><?php echo $row["course_id"]?></td>
             <td> <?php echo $row["course_name"]?></td>
             <td><?php echo $row["credit_hours"]?></td>
            <td><a href="updateCourse.php?updateid=<?php echo $row["course_id"] ?>" class="button"><input type="submit" value="update"></a>
            <a href="course.php?deleteid=<?php echo $row["course_id"]?>" class="button"><input type="submit" value="delete"></a></td>


</tr>
<?php 

}

}
?>
</table>

</div>

</body>
</html> 