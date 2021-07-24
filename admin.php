<?php
    require 'config/config.php';
    require 'funciones/autenticar.php';
    autenticar();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container mt-5">
        <h1>Dashboard - Panel principal</h1>

        <section class="list-group mt-3">
            <a href="adminMarcas.php" class="list-group-item list-group-item-action">
                Panel de administración de Marcas.
             </a>
             <a href="adminCategorias.php" class="list-group-item list-group-item-action">
                Panel de administración de Categorías.
            </a>
            <a href="adminProductos.php" class="list-group-item list-group-item-action">
                Panel de administración de Productos.
            </a>
             <a href="adminUsuarios.php" class="list-group-item list-group-item-action">
                Panel de administración de Usuarios.
            </a>
        </section>

    </main>

<?php  
include 'includes/footer.php';  
?>