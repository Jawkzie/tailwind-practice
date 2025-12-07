<?php 
include('php/connection.php');
include('php/controlador.php');
session_start();
$con = connection();

$sql = "SELECT * FROM products";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCADITO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-200/80">

    <!-- MODAL LOG IN -->
    <div class="w-full h-full bg-black/30 backdrop-blur-sm absolute z-100 flex hidden modal">
        <div class="w-sm h-85 bg-slate-700/80 flex flex-col m-auto items-center rounded-xl shadow-2xl relative modal">
            <p class="absolute bottom-12 text-sky-50">No tienes cuenta? <a href="#" class="text-sky-500 font-bold underline" id="register-btn">Regístrate</a></p>
            <p class="absolute bottom-5 text-sky-50 close-modal underline">Para salir presiona aquí</p>
            <h2 class="text-sky-50 text-2xl font-bold p-10">Formulario LOGIN</h2>
            <form class="w-80 flex flex-col gap-5" method="POST"> 
                <input type="text" name="username" class="bg-slate-100 h-8 focus:outline-none focus:border-sky-500 focus:border-r-4 p-3" placeholder="Usuario">
                <input type="password" name="password" class="bg-slate-100 h-8 focus:outline-none focus:border-sky-500 focus:border-r-4 p-3" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesion" name="iniciar-sesion" class="bg-slate-100 h-8 focus:outline-none focus:bg-sky-500 font-bold">
            </form>
        </div>
    </div>

    <!-- MODAL REGISTRO -->
    <div class="w-full h-full absolute z-100 flex hidden register-modal">
        <div class="w-sm h-85 bg-slate-700 flex flex-col m-auto items-center rounded-xl shadow-2xl relative modal">
            <h2 class="text-sky-50 text-2xl font-bold p-10">Formulario REGISTRO</h2>
            <form class="w-80 flex flex-col gap-5" method="POST" action="php/register.php"> 
                <input type="text" name="username" required class="bg-slate-100 h-8 focus:outline-none focus:border-sky-500 focus:border-r-4 p-3" placeholder="Usuario">
                <input type="password" name="password" required class="bg-slate-100 h-8 focus:outline-none focus:border-sky-500 focus:border-r-4 p-3" placeholder="Contraseña">
                <input type="submit" value="Registrate" name="register" class="bg-slate-100 h-8 focus:outline-none focus:bg-sky-500 font-bold">
            </form>
        </div>
    </div>

    <!-- HEADER -->
    <header class="w-full h-18 relative">
        <nav class="flex items-center justify-around z-10 w-full h-18 fixed bg-gray-300">
            <h1 class="text-4xl weight-bold font-sans font-bold"> 
                <span class="text-sky-600 underline">M</span>arket
            </h1>
            <ul class="flex gap-10">
                <li class="flex items-center flex-wrap w-25">
                    <i class="fa-solid fa-user text-2xl mr-2 text-sky-600"></i>
                    <?php if(!empty($_SESSION['user'])): ?>
                        <span class="flex font-semibold underline"><?= htmlspecialchars($_SESSION['user']) ?></span>
                        <a href="php/logout.php" class="text-red-500 underline -mb-8 -mr-5 -ml-11 mt-2">Salir</a>
                    <?php else: ?>
                        <a href="#" class="flex font-semibold underline" id="login">Sign in</a>
                    <?php endif; ?>
                </li>
                <li class="flex items-center">
                    <i class="fa-solid fa-cart-shopping mr-2 text-sky-600 text-2xl"></i>
                    <a href="#" class="flex font-semibold underline">Cart</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- BANNER -->
    <div class="bg-[url(resources/foto-montana.jpeg)] w-200 h-lg bg-contain m-auto mt-12 bg-repeat-x bg-bottom relative rounded-xl">
        <div class="bg-white/10 backdrop-blur-xs w-full h-full rounded-xl">
            <h1 class="text-4xl font-semibold text-pretty w-lg p-10 opacity-50">
                Donde la <span class="font-bold">MODA</span> encuentra su <span class="font-bold">cima.</span>
            </h1>
        </div>
    </div>
    
    <!-- BARRA DE BUSQUEDA -->
    <div class="w-full mt-5"> 
        <div class="relative w-100 m-auto flex items-center"> 
            <i class="fa-solid fa-magnifying-glass absolute left-3 bottom-2.01 text-xl text-black/50"></i>
            <input type="text" placeholder="¿Qué buscas el día de hoy?" class="bg-slate-800/20 m-auto rounded-4xl w-100 h-10 pl-10 focus:outline-none outline-none focus:border-r-3 focus:border-slate-600 focus:border-b-3">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="bg-slate-800/20 absolute -right-20 w-10 h-10 rounded-xl">
                    <a href="php/admin.php">
                        <i class="fa-solid fa-plus text-2xl p-2"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- PRODUCTOS -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 m-auto">
            <?php while($row = mysqli_fetch_array($query)): ?>
                <div class="card flex flex-col bg-neutral-100 shadow-sm mt-10 p-5 rounded min-h-[280px] relative">
                    <div>
                        <?php 
                        $role = $_SESSION['role'] ?? null;
                        if($role === 'user' || $role === 'admin'): 
                        ?>
                            <a href="#" class="absolute bg-black w-8 h-8 right-5 rounded-xl">
                                <i class="fa-solid fa-eye text-indigo-50 text-lg p-1.5"></i>
                            </a>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                            <div class="bg-slate-800/20 absolute w-8 h-8 right-5 top-15 rounded-xl"> 
                                <a href="php/editar.php?id=<?= $row['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square text-lg p-1.5"></i>
                                </a>
                            </div>
                            <div class="bg-slate-800/20 absolute w-8 h-8 right-5 top-25 rounded-xl"> 
                                <a href="php/eliminar.php?id=<?= $row['id'] ?>">
                                    <i class="fa-solid fa-trash text-lg p-1.5"></i>
                                </a>
                            </div>
                        <?php endif; ?>

                        <p class="font-bold text-lg mb-1"><?= $row['name'] ?></p> 
                        <p class="font-semibold text-md mb-4 text-black/60"><?= $row['genero'] ?></p> 
                        <img src="<?= $row['img'] ?>" width="150" class="mx-auto mb-4 object-contain h-48" alt="<?= $row['name'] ?>">
                        <p class="text-sm font-semibold text-pretty text-center mb-4 line-clamp-4"><?= $row['description'] ?></p> 
                    </div>
                    <div class="flex justify-between text-black/40 font-bold border-t border-black/10 pt-3 mt-auto">
                        <p><?= $row['category'] ?></p>
                        <p><?= $row['id'] ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>