<?php 
 require_once 'conn.php';

  if(isset($_GET['deleteid']))
  {
    $student_id = $_GET['deleteid'];
    $query  = "DELETE FROM `students` WHERE student_id='$student_id'";
    $result = mysqli_query($conn, $query);
  	if ($result)
    {
       header('location:student.php');
    } 
    else{
      echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
    }
  }
?> 
