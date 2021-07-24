<?php  
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/autenticar.php';
    autenticar();
    require 'funciones/usuarios.php';
        $chequeo = modificarUsuario();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de un usuario</h1>

<?php
    $class = 'danger';
    $mensaje = 'No se pudo modificar el usuario';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Usuario modificado correctamente';
    }
?>
            <div class="alert alert-<?= $class ?>">
                <?= $mensaje ?><br>
                <a href="adminUsuarios.php" class="btn btn-outline-secondary">Volver a panel</a>
            </div>

</main>

<?php
include 'includes/footer.php';
?>
