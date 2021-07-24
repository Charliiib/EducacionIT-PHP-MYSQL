  
<?php

########################################
#### AUTH: rutinas de autenticación ############
########################################

function login()
{
    $usuEmail = $_POST['usuEmail'];
    $usuPass = $_POST['usuPass'];
    $link = conectar();

    $sql = "SELECT usuNombre, usuApellido, idUsuario
                FROM usuarios
                WHERE usuEmail = '".$usuEmail."'
                  AND usuPass = '".$usuPass."'";

    $resultado = mysqli_query( $link, $sql )
                    or die(mysqli_error($link));
    $cantidad = mysqli_num_rows($resultado);

    if( $cantidad == 0 ){
        //redirección a formLogin
        header('location: formLogin.php?error=1');
    }
    else{
        // token de autenticación
        $_SESSION['login'] = 1;
        //obtenemos datos de usuario
        $datosUsuario = mysqli_fetch_assoc($resultado);
        //registramos en una variable de sesión los datos del usuario
        $_SESSION['datosUsuario'] = $datosUsuario['idUsuario'];
        $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
        $_SESSION['datosUsuario'] = $datosUsuario['usuNombre'] . ' ' . $datosUsuario['usuApellido'];
        $_SESSION['usuNombre'] = $datosUsuario['usuNombre'];
        $_SESSION['usuApellido'] = $datosUsuario['usuApellido'];
        //redirección a admin 
        header('location: admin.php');
    }
}

function logout()
{
   // session_unset(); // (innecesario) elimina todas las variables de sesión
    session_destroy();

    // redirección con delay
    header('refresh:3; url=index.php');
}
function autenticar()
{
    if( !isset( $_SESSION['login'] ) ){
        header('location: formLogin.php?error=2');
    }
}