<?php
    require 'config/config.php';
    
    require 'funciones/autenticar.php';
        autenticar();

    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    $categorias = listarCategorias();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container mb-5">
        <h1>Panel de administración de Categorias</h1>

            <a href="admin.php" class="btn btn-outline-secondary my-3">
            Volver a principal
            </a>

        <table class="table table-bordered table-striped table-hover col-8 mx-auto">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Categoría</th>
                    <th colspan="2"> <a href="formAgregarCategoria.php" class="btn btn-dark">Agregar</a></th>
                </tr>
            </thead>
                <tbody>
<?php
    while ( $categoria = mysqli_fetch_assoc( $categorias ) ){
?>            
                <tr>
                    <td><?= $categoria['idCategoria'] ?></td>
                    <td><?= $categoria['catNombre'] ?></td>
                    <td><a href="formModificarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
                    Modificar</a></td>
                    <td><a href="formEliminarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
                    Eliminar</a></td>
                </tr>
<?php
    }
?>            
                </tbody>
        </table>

<a href="admin.php" class="btn btn-outline-secondary my-3">Volver a principal</a>

</main>

<?php  
include 'includes/footer.php';  
?>