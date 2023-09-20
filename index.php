<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <?php 
 include_once('config.php');
$servername = "127.0.0.1";
$username = "root";
$password= "";
$dbname="gp";
$connection = mysqli_connect($servername,$username,$password, $dbname);


$query = "SELECT * FROM gp ";
$result = mysqli_query($connection, $query);

 if(!$result){
    die("error:" .mysqli_error($connection));
 }
 else if(mysqli_num_rows($result)>0){

 ?>
 <table class="table-tasks">
  <thead>
   <tr>
    <th>task name</th>
    <th>deadline</th>
   
   </tr>
  </thead>
  <tbody>
   <?php 
 
   
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['task']."</td>";
    echo "<td>".$row['deadline']."</td>";
    
    echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."' onclick='return confirmDelete()'>Delete</a></td></tr>";
   }
 
   ?>
  </tbody>
 </table>
 <?php
 }
 ?>
 <a href="add.php">Add New task</a>
 <script>
  function confirmDelete() {
   return confirm("Are you sure you want to delete this task?");
  }
 </script>
</body>
</html>





 








