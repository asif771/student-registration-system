
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

<style>

</style>
</head>
<body>
<?php  
 include_once 'sidebar.php';
?>
<div class="main">

<table>
  <tr>
    <th>
    <a href="addDegree.php">AddNewDegree</a>
  </th>
  </tr>
<tr>
  <th>Degree_ID</th>
  <th>Degree_Name</th>
  <th>Degree_Fee</th>
  <th>Degree_courses</th>
  <th>operations</th>

</tr>
<?php
 // db connect
 require_once 'conn.php';
// delete code


if(isset($_GET['deleteid']))
{
  $degree_id = $_GET['deleteid'];
  $query  = "DELETE FROM `degree` WHERE degree_id='$degree_id'";
  $result = mysqli_query($conn, $query);
  if ($result)
  {
     header('location:degree.php');
  } 
  else{
    echo "DELETE failed: $query<br>" .
    $conn->error . "<br><br>";
  }
}
//update code
 if(isset($_POST['updateDegree']))
{
  $degree_id = $_POST['degree_id'];
 $degree_name = $_POST['degree_name'];
 $degree_fee = $_POST['degree_fee'];
 $degree_courses   = $_POST['degree_courses'];
$courses=implode(",",$degree_courses);
 $query  = "UPDATE degree SET degree_name = '$degree_name', degree_fee ='$degree_fee',degree_courses='$courses' WHERE degree_id='$degree_id'";
 $result = mysqli_query($conn, $query);
   if (!$result) echo "INSERT failed: $query<br>" .  
     $conn->error . "<br><br>";

}
if(isset($_POST['addDegree']))
{
 $degree_name   = $_POST['degree_name'];
$degree_fee = $_POST['degree_fee'];
$degree_courses   = $_POST['degree_courses'];
$courses=implode(",",$degree_courses);
$query = "INSERT INTO `degree`( `degree_name`, `degree_fee`, `degree_courses`) VALUES ('$degree_name','$degree_fee','$courses ')"; 

$result = mysqli_query($conn, $query);  

if (!$result) echo "INSERT failed: $query<br>" .  
$conn->error . "<br><br>";
}

$query  = "SELECT * FROM degree";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{

while($row = mysqli_fetch_assoc($result))
{
  ?>
<tr>
             <td><?php echo $row["degree_id"]?></td>
             <td> <?php echo $row["degree_name"]?></td>
             <td><?php echo $row["degree_fee"]?></td>
             <td><?php echo $row["degree_courses"]?></td>


            <td><a href="updateDegree.php?updateid=<?php echo $row["degree_id"] ?>" class="button"><input type="submit" value="update"></a>
            <a href="degree.php?deleteid=<?php echo $row["degree_id"]?>" class="button"><input type="submit" value="delete"></a></td>


</tr>
<?php 

}

}
?>
</table>

</div>

</body>
</html> 