<?php 
include('connection.php');

$con = connection();

$sql = "SELECT * FROM products";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C.R.U.D.</title>
</head>
<body>
    <div> 
        <form action=""> 
            <h1> Crear Producto </h1>
            <input type="text" name="name">
            <input type="text" name="id">
            <input type="text" name="colors">
            <input type="text" name="tallas">
            <input type="text" name="category">
            <input type="text" name="description">
            <input type="text" name="image">
            <input type="text" name="genero">
            <input type="submit" value="Agregar producto">
        </form>
    </div>

    <?php while($row = mysqli_fetch_array($query)): ?>
    <div class="card"> 
        <p>
            <?= $row['id'] ?>
        </p> 
        <p>
            <?= $row['name'] ?>
        </p> 
        <p>
            <?= $row['category'] ?>
        </p> 
        <p>
            <?= $row['description'] ?>
        </p> 
        <p>
            <?= $row['genero'] ?>
        </p> 
        <img src="<?= $row['img'] ?>" width="150">
    </div>
        <?php endwhile; ?>
</body>
</html>