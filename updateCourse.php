
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php 
     require_once 'conn.php';
     $course_id= $_GET['updateid'];
     $query  = "SELECT * FROM courses WHERE course_id ='$course_id'";
     $result = mysqli_query($conn, $query);
     $row = mysqli_fetch_assoc($result);
 ?>
    <form action="course.php" method="POST">
    <div class="container">
    <h1>Course Form</h1>
    <p>Please fill in this form to add new Course</p>
    <hr>
    <input type="hidden" name="course_id"  value="<?php echo $course_id?> " >

    <label for="course Name"><b></b></label>
    <input type="text" placeholder="Enter Course" name="course_name" value="<?php echo $row["course_name"]?> " required>
    <label for="credit_hours"><b></b></label>

    <input type="text" placeholder="Enter course credit hours" name="credit_hours" 
    value="<?php echo $row['credit_hours'] ?>" required>
    <hr>

    <button type="submit"  name ="update" class="addcoursebtn">update</button>
   </div>

 </form>

</body>
</html>

  