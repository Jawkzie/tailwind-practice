<?php
include('connection.php');
$con = connection();

$id=$_GET['id'];

$sql = "DELETE FROM products WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query) {
    Header("location: ../index.php");
}
?>