<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

</head>
<body>

 <form action="course.php" method="POST">
  <div class="container">
    <h1>Course Form</h1>
    <p>Please fill in this form to add new Course</p>
    <hr>
   
    <label for="course Name"><b></b></label>
    <input type="text" placeholder="Enter Course" name="course_name" id="course_name" required>
    <label for="credit_hours"><b></b></label>
    <input type="number" placeholder="Enter course credit hours" name="credit_hours" id="credit_hours" required>
    <hr>

    <button type="submit"  name ="addcourse" class="addcoursebtn">add course</button>
   </div>
 </form>
</body>
</html>
