<?php
    require 'config/config.php';
    require 'funciones/autenticar.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $marca = verMarcaPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de una marca</h1>

        <div class="bg-light border p-4">
            <form action="modificarMarca.php" method="post">
                Marca: <br>
                    <input type="text" name="mkNombre" value="<?= $marca['mkNombre'] ?>" class="form-control">
                    <input type="hidden" name="idMarca" value="<?= $marca['idMarca'] ?>"><br>
                        <button class="btn btn-dark">Modificar marca</button>
                            <a href="adminMarcas.php" class="btn btn-outline-secondary">Volver a panel</a>
            </form>
        </div>

</main>

<?php
include 'includes/footer.php';
?>