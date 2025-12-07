<?php
include('connection.php');
$con = connection();

$id=$_GET['id'];

$sql = "SELECT * FROM products WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div> 
        <h1 class="text-black text-4xl font-bold text-center mt-5"> PANEL ADMINISTRATIVO </h1>
        <p class="text-black text-2xl font-semibold text-center mt-3"> Bienvenido al panel administrativo, por favor, rellena los campos para EDITAR productos al mercado. </p>
        <form action="edit-product.php" method="POST" class="bg-slate-800/20 mt-5 w-xl m-auto flex flex-col p-5 gap-5">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="name" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto" value="<?= $row['name'] ?>">
          <!--  <input type="text" name="colors" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto"> !-->
           <!-- <input type="text" name="tallas" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto"> !-->
            <input type="text" name="category" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Categoria del producto" value="<?= $row['category'] ?>">
            <textarea name="description" required class="bg-slate-100 p-2 rounded-md h-25 text-wrap"><?= $row['description'] ?></textarea>
            <textarea name="image" required class="bg-slate-100 p-2 rounded-md h-25 text-wrap"><?= $row['img'] ?></textarea>
            <input type="text" name="genero" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Sexo/Género" value="<?= $row['genero'] ?>">
            <input type="submit" value="Actualizar producto" required class="bg-slate-100 p-5 rounded-xl focus:outline-none outline-none focus:border-r-3">
        </form>
    </div>
</body>
</html>