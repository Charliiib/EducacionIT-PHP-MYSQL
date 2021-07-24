<?php
    require 'config/config.php';
    require 'funciones/autenticar.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $marcas = listarMarcas();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container mb-5">
        <h1>Panel de administración de Marcas</h1>

<a href="admin.php" class="btn btn-outline-secondary my-3">Volver a principal</a>

        <table class="table table-bordered table-striped table-hover col-8 mx-auto">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Marca</th>
                    <th colspan="2"><a href="formAgregarMarca.php" class="btn btn-dark">Agregar</a></th>
                </tr>
            </thead>
                <tbody>
<?php
    while ( $marca = mysqli_fetch_assoc( $marcas ) ){
?>            
                <tr>
                    <td><?= $marca['idMarca'] ?></td>
                    <td><?= $marca['mkNombre'] ?></td>
                    <td><a href="formModificarMarca.php?idMarca=<?= $marca['idMarca'] ?>" class="btn btn-outline-secondary">
                    Modificar</a></td>
                    <td><a href="formEliminarMarca.php?idMarca=<?= $marca['idMarca'] ?>" class="btn btn-outline-secondary">
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