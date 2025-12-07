<?php 

include_once('connection.php');
$con = connection();


if (!empty($_POST["iniciar-sesion"])) {
    if(!empty($_POST['username']) and !empty($_POST['password'])) {
        $usuario=$_POST['username'];
        $password=$_POST['password'];
        $sql=$con->query("SELECT * from usuario WHERE user='$usuario' AND pass='$password'");

        if ($datos=$sql->fetch_object()) {
            session_start();
            $_SESSION['user']=$datos->user;
            $_SESSION['role']=$datos->role;
            Header("location: index.php");
        } else {
            echo "<script>alert('Acceso denegado.');</script>";
        }
    } else {
        echo "<script>alert('Rellene los campos.'); window.location='index.php';</script>";
        exit;
    }
}

?>