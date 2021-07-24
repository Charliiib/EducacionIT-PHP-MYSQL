<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/autenticar.php';
    autenticar();
    require 'funciones/usuarios.php';
         $usuario = verUsuarioPorID();
	include 'includes/header.html';  
    include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificar Perfil</h1>
        <div class="bg-light border p-4">
            <form action="modificarUsuario.php" method="post">
                Usuario: <br>
                   <input type="text" name="usuNombre" value="<?= $usuario['usuNombre'] ?>" class="form-control"><br>
                Apellido <br>
                 <input type="text" name="usuApellido" value="<?= $usuario['usuApellido'] ?>" class="form-control"><br>
                Email <br>
                    <input type="text" name="usuEmail" value="<?= $usuario['usuEmail'] ?>" class="form-control"><br>
                    <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario'] ?>">
                        <button class="btn btn-dark">Guardar cambios</button>
                        <a href="adminUsuarios.php" class="btn btn-outline-secondary">Volver  a panel</a>
            </form>
        </div>


</main>

<?php
include 'includes/footer.php'; 
?>
