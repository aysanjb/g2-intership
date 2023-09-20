<!DOCTYPE html>
<html>
<head>
 <title>Add task</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <?php
 if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include_once('index.php');

  
  $task = $_POST['task'];
  $deadline = $_POST['deadline'];
 
  $query ="INSERT INTO gp (task, deadline) VALUES ('$task','$deadline' )";
  if (mysqli_query($connection,$query)){
    echo"<script>alert(added susseccffully);</script>";
    echo"<script>window.location='index.php'</script>";
  }
  else{
    echo"error".mysqli_error($connection);
  }
  mysqli_close($connection);
 }
 ?>
 <form action="add.php" method="post">
  <label>task</label>
  <input type="text" name="task" required>
  <label>deadline</label>
  <input type="date" name="deadline" required>
  
  <input type="submit" name="Submit" value="Add task">
 </form>
</body>
</html>