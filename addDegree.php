<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <form action="degree.php" method="POST">
  <div class="container">
    <h1>Degree Form</h1>
    <p>Please fill in this form to add new Degree</p>
    <hr>  
    <label for="Degree_Name"><b>Degree_Name</b></label>
    <input type="text" placeholder="Enter Degree" name="degree_name" id="degree_name" required>
    <label for="courses"><b>Select Degree Courses</b></label><br><br>
    <?php
    // db connect
        require_once 'conn.php';
       $query  = "SELECT * FROM courses";
        $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result) > 0) 
         {
         while($row = mysqli_fetch_assoc($result))
         {?>
          <input type="checkbox" id="courses" name="degree_courses[]" value="<?php echo $row['course_name'];?>">
           <?php echo $row['course_name'];?>
          <?php
         }
        }
      ?>
    <br><br><label for="Degree_Fee"><b>Degree_Fee</b></label>
    <input type="number" placeholder="Enter Degree Fee" name="degree_fee" id="degree_fee" required>
    
    <hr>
    <button type="submit"  name ="addDegree" class="addcoursebtn">Add Degree</button>  
   </div>
 </form>
</body>
</html>
