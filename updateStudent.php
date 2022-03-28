
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <?php 
     require_once 'conn.php';
     $student_id= $_GET['updateid'];
     $query  = "SELECT * FROM students WHERE student_id ='$student_id'";
     $result = mysqli_query($conn, $query);
     $row = mysqli_fetch_assoc($result);
 ?>
    <form action="student.php" method="POST">
    <div class="container">
    <h1>Student Form</h1>
    <p>Please fill in this form to add new Course</p>
    <hr>
    <input type="hidden" name="student_id"  value="<?php echo $student_id?> " >

    <label for="Student Name"><b></b></label>
    <input type="text" placeholder="Enter student" name="student_name" value="<?php echo $row["student_name"]?> " required>
    <label for="Student Degree"><b></b></label>

    <input type="number" placeholder="Enter Student Degree" name="degree_id" 
            value="<?php echo $row['degree_id'] ?>" />
    <hr>

    <button type="submit"  name ="updateStudent" class="addcoursebtn">update</button>
   </div>

 </form>
</body>
</html>

  