

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <form action="student.php" method="POST">
  <div class="container">
    <h1>Student Form</h1>
    <p>Please fill in this form to add new Student</p>
    <hr>  
   
    <label for="Student Name"><b>Student Name</b></label>
    <input type="text" placeholder="Enter Student Name" name="student_name" id="student_name" required>
    <?php
    // db connect
        require_once 'conn.php';
       $query  = "SELECT * FROM degree";
        $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result) > 0) 
         {
         while($row = mysqli_fetch_assoc($result))
         {?>
        <input type="checkbox" name="degree_name" value="" disabled/>
        <?php echo $row["degree_id"]?>:<?php echo $row['degree_name'];?>
          <?php
         }
        }
      ?>
    <br><br><label for="student_degree"><b>Student_degree</b></label>
    <input type="number" placeholder="Enter Degree_ID" name="degree_id" id="degree_id" required>
    <hr>

    <button type="submit"  name ="addStudent" class="addcoursebtn">Add Student</button>
   </div>
 </form>
</body>
</html>
