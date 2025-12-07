<?php

include('connection.php');
$con = connection();

$id = null;
$name = $_POST['name'];
$category = $_POST['category'];
$genero = $_POST['description'];
$description = $_POST['genero'];
$img = $_POST['img'];

$sql = "INSERT into products VALUES('$id', '$name', '$category', '$description', '$genero', '$img')";
$query = mysqli_querry($con, $sql);

?>