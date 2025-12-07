<?php
require_once('connection.php');
$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = NULL;
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = 'user';

    $sql = "INSERT INTO usuario VALUES('$id', '$user', '$pass', '$role')";
    $query = mysqli_query($con, $sql);

    if($query) {
    Header("location: ../index.php");
    }
}

?>