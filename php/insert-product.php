<?php

include('connection.php');
$con = connection();

$id = null;
$name = $_POST['name'];
$category = $_POST['category'];
$genero = $_POST['genero'];
$description = $_POST['description'];
$img = $_POST['image'];

$sql = "INSERT INTO products VALUES('$id', '$name', '$category', '$description', '$genero', '$img')";
$query = mysqli_query($con, $sql);

if($query) {
    Header("location: ../index.php");
}

?>