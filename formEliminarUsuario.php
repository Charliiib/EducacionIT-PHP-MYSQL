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
    <h1>Confirmacion de baja de un usuario</h1>

        <div class=" bg-light border col-6 mx-auto p-2">
            <form action="eliminarUsuario.php" method="post" >
                Marca: <br>
                    <input type="text"  name="usuNombre"  value="<?= $usuario['usuNombre'] ?>" class="form-control"><br>
                Apellido <br>
                     <input type="text" name="usuApellido"  value="<?= $usuario['usuApellido'] ?>" class="form-control"><br>
                Email <br>
                    <input type="text"  name="usuEmail"  value="<?= $usuario['usuEmail'] ?>"class="form-control"><br>
                    <input type="hidden"  name="idUsuario" value="<?= $usuario['idUsuario'] ?>">    
                        <button class="btn btn-danger btn-block  my-2">Confirma baja</button>
                        <a href="adminUsuarios.php" class="btn btn-outline-secondary btn-block">Volver al panel</a>
            </form>                   
        </div>


</main>

<?php
include 'includes/footer.php';
?>
