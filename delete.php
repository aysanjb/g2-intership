<?php
include_once('config.php');
$servername = "127.0.0.1";
$username = "root";
$password= "";
$dbname="gp";
$connection = mysqli_connect($servername,$username,$password, $dbname);


$query ="DELETE  FROM gp ";
$result = mysqli_query($connection, $query);

if(!$result){
    die('error:' . mysqli_error($connection));

}
else{
    echo"<script>alert('successful');</script>";
    echo "<script>window.location='index.php';</script>";
}
?>

