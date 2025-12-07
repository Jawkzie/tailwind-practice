<?php 

include('connection.php');
$con = connection();

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$genero = $_POST['genero'];
$description = $_POST['description'];
$img = $_POST['image'];

$sql = "UPDATE products SET name='$name', category='$category', genero='$genero', description='$description', img='$img' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query) {
    Header("location: ../index.php");
}
?>