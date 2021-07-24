<?php


###########################
#### CRUD DE USUARIOS #####
###########################

function listarUsuarios(){
    $link = conectar();
    $sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail, usuPass
                                FROM usuarios";
    $resultado = mysqli_query( $link, $sql )    
                        or die( mysqli_error($link) );
return $resultado;
}

function verUsuarioPorID(){
    $idUsuario = $_GET['idUsuario'];
    $link = conectar();
    $sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail
                FROM usuarios
                WHERE idUsuario = ".$idUsuario;
    $resultado = mysqli_query($link, $sql)
                        or die( mysqli_error($link) );
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}





function  agregarUsuario(){
    $usuNombre = $_POST[ 'usuNombre'];
    $usuApellido = $_POST[ 'usuApellido'];
    $usuEmail = $_POST[ 'usuEmail'];
    $usuPass = $_POST['usuPass'];
    $usuEstado = $_POST['usuEstado'];
   $link = conectar();
    $sql = "INSERT INTO usuarios
                        ( usuNombre, usuApellido, usuEmail, usuPass, usuEstado  )
             VALUES
                        ( '".$usuNombre."','".$usuApellido."','".$usuEmail."','".$usuPass."','".$usuEstado."') ";
     $resultado = mysqli_query( $link, $sql );
     return $resultado;
}

function modificarUsuario(){
    $idUsuario = $_POST['idUsuario'];
    $usuNombre = $_POST['usuNombre'];
    $usuApellido = $_POST['usuApellido'];
    $usuEmail = $_POST['usuEmail'];
    $link = conectar();
    $sql = "UPDATE usuarios
                SET usuNombre = '".$usuNombre."',
                        usuApellido = '".$usuApellido."',
                        usuEmail = '".$usuEmail."'
              WHERE idUsuario = ".$idUsuario;
    $resultado = mysqli_query( $link, $sql )
                    or die( mysqli_error($link) );
    return $resultado;
}

function modificarPassword(){
    $idUsuario = $_POST['idUsuario'];
    $usuPass = $_POST['usuPass1'];
    $link = conectar();
    $sql = "UPDATE usuarios
                SET usuPass = '".$usuPass."'
              WHERE idUsuario = ".$idUsuario;
    $resultado = mysqli_query( $link, $sql )
                    or die( mysqli_error($link) );
    return $resultado;
}



function eliminarUsuario(){ 
    $idUsuario = $_POST['idUsuario'];
    $link = conectar();
    $sql = "DELETE FROM usuarios
                    WHERE idUsuario = ".$idUsuario;
    $resultado = mysqli_query( $link, $sql )  or die( mysqli_error($link) );
    return $resultado;
}