<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    
</head>
<body>
<?php
include_once('config.php');
$servername = "127.0.0.1";
$username = "root";
$password = "";
$connection = mysqli_connect($servername, $username, $password);
$result = mysqli_query($connection, "SELECT * FROM tasks");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];

    $stmt = mysqli_prepare($connection, "UPDATE gp SET task=?, deadline=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $task, $deadline, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "Updated successfully. <a href='index.php'>View All Tasks</a>";
    mysqli_close($connection);
} else {
    $id = $_GET['id'];
    $result = mysqli_query($connection, "SELECT * FROM tasks WHERE id=$id");

    while ($row = mysqli_fetch_assoc($result)) {
        $task = $row['task'];
        $deadline = $row['deadline'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Task:</label>
    <input type="text" name="task" value="<?php echo $task; ?>" required>
   
    <label>Deadline:</label>
    <input type="date" name="deadline" value="<?php echo $deadline; ?>" required>
    <input type="submit" name="update" value="Update Task">
</form>
</body>
</html>
