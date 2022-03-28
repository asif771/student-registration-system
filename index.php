<?php
require_once 'conn.php';
include_once 'sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
  <body>
  <div class="main">
<?php
       $query  = "SELECT * FROM degree";
       $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) 
  {
     ?>
        <form action="index.php" method="post">
        <select name="valueToSearch"> 
          <option value="" disabled selected>Choose option</option>
          <?php 
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
          <option name="valueToSearch" value="<?php echo $row["degree_name"]?>"> <?php echo $row["degree_name"]?></option>
      <?php 
        }
    }
  ?>
        </select>
       <input type="submit" name="search" value="SearchByDegree">
  
       <!-- dropdown  for fee  -->   
       <?php
       $query  = "SELECT * FROM degree ";
       $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) 
  {
     ?>
        <form action="index.php" method="post">
        <select name="valueToSearch"> 
          <option value="" disabled selected>Choose option</option>
          <?php 
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
          <option name="valueToSearch" value="<?php echo $row["degree_fee"]?>"> <?php echo $row["degree_fee"]?></option>
      <?php 
        }
    }
  ?>
        </select>
        
       <input type="submit" name="search" value="SearchByFee">

       <!-- dropdown  for fee  -->   

       <?php
       $query  = "SELECT * FROM courses";
       $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) 
  {
     ?>
        <form action="index.php" method="post">
        <select name="valueToSearch"> 
          <option value="" disabled selected>Choose option</option>
          <?php 
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
          <option name="valueToSearch" value="<?php echo $row["course_name"]?>"> <?php echo $row["course_name"]?></option>
      <?php 
        }
    }
  ?>
        </select>
       <input type="submit" name="search" value="SearchByCourse"><br><br>
  
    
 <?php
if(isset($_POST['search']) && isset($_POST['valueToSearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns using concat mysql function
    $query = "SELECT * FROM students
    INNER JOIN degree
    ON students.degree_id = degree.degree_id WHERE CONCAT(`student_id`, `student_name`, `degree_name`, `degree_fee`, `degree_courses`) LIKE '%".$valueToSearch."%'";
        $result = mysqli_query($conn, $query);
}
else 
 {
  $query  = "SELECT * FROM students
  INNER JOIN degree
  ON students.degree_id = degree.degree_id ";
    // $search_result = filterTable($query);
    $result = mysqli_query($conn, $query);

}?>
            <table>
                <tr>
                <th>Student_id</th>
                 <th>Student_Name</th>
                 <th>Degree_name</th>
                 <th>Degree_courses</th>
                 <th>Degree_fee</th>
                </tr>

      <!-- populate table from mysql database -->
            <?php
             if (mysqli_num_rows($result) > 0) 
             {
              while($row = mysqli_fetch_assoc($result)):?>
              <tr>
                <td> <?php echo $row["student_id"]?></td>
                 <td> <?php echo $row["student_name"]?></td>
                 <td><?php echo $row["degree_name"]?></td>
                 <td><?php echo $row["degree_courses"]?></td>
                 <td><?php echo $row["degree_fee"]?></td>
             </tr>
           <?php endwhile;?>
           <?php
            }?>
          </table>
        </form>
    </div> 
    </body>
</html>

