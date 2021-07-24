<?php  
    require 'config/config.php';
    require 'funciones/autenticar.php';
    autenticar();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container">
    <h1>Alta de nuevo usuario</h1>

        <div class="bg-light border p-4">

            <form action="agregarUsuario.php" method="post">
                Nombre: <br>
                    <input type="text" name="usuNombre" class="form-control"><br>
                Apellido: <br>
                    <input type="text" name="usuApellido" class="form-control"><br>
                Email: <br>
                    <input type="text" name="usuEmail" class="form-control"><br>
                Password: <br>
                    <input type="password" name="usuPass" class="form-control"><br>
                    <input type="hidden" name="usuEstado" value="1">
                        <button class="btn btn-dark">Agregar Usuario</button>
                            <a href="adminUsuarios.php" class="btn btn-outline-secondary">Volver  a panel</a>
            </form>
        </div>

</main>

<?php
include 'includes/footer.php';
?>