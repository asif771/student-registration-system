
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
     $degree_id= $_GET['updateid'];
     $query  = "SELECT * FROM degree WHERE degree_id ='$degree_id'";
     $result = mysqli_query($conn, $query);
     $row = mysqli_fetch_assoc($result);
 ?>
    <form action="degree.php" method="POST">
    <div class="container">
    <h1>Degree Form</h1>
    <p>Please fill in this form to add new Degree</p>
    <hr>
    <input type="hidden" name="degree_id"  value="<?php echo $degree_id?> " >

    <label for="Degree Name"><b>Degree_Name</b></label>
    <input type="text" placeholder="Enter Degree" name="degree_name" value="<?php echo $row["degree_name"]?> " required>
    <label for="Degree_fee"><b>Degree_Fee</b></label>
    <input type="number" placeholder="Enter degree fee" name="degree_fee" 
    value="<?php echo $row['degree_fee'] ?>" required>

    <label for="courses"><b>Select Degree Courses</b></label><br><br>

    <?php
    // db connect
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
   

       <hr>
    <button type="submit"  name ="updateDegree" class="addcoursebtn">update</button>
   </div>

 </form>

</body>
</html>

  