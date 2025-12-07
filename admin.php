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
        <p class="text-black text-2xl font-semibold text-center mt-3"> Bienvenido al panel administrativo, por favor, rellena los campos para agregar productos al mercado. </p>
        <form action="insert-product.php" method="POST" class="bg-slate-800/20 mt-5 w-xl m-auto flex flex-col p-5 gap-5"> 
            <input type="text" name="name" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto">
          <!--  <input type="text" name="colors" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto"> !-->
           <!-- <input type="text" name="tallas" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Nombre del producto"> !-->
            <input type="text" name="category" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Categoria del producto">
            <textarea name="description" required class="bg-slate-100 p-2 rounded-md h-25 text-wrap focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Descripcion del producto"></textarea>
            <textarea name="image" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="URL Imagen del producto"></textarea>
            <input type="text" name="genero" required class="bg-slate-100 p-2 rounded-md focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3" placeholder="Sexo/Género">
            <input type="submit" value="Agregar producto" required class="bg-slate-100 p-5 rounded-xl focus:outline-none outline-none focus:border-r-3">
        </form>
    </div>
</body>
</html>