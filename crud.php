<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C.R.U.D.</title>
</head>
<body>
    <div> 
        <form action="insert-product.php" method="POST"> 
            <h1> Crear Producto </h1>
            <input type="text" name="name">
            <input type="text" name="id">
          <!--  <input type="text" name="colors"> !-->
           <!-- <input type="text" name="tallas"> !-->
            <input type="text" name="category">
            <input type="text" name="description">
            <input type="text" name="image">
            <input type="text" name="genero">
            <input type="submit" value="Agregar producto">
        </form>
    </div>
</body>
</html>