<?php

###########################
#### CRUD DE PRODUCTOS #####
###########################
function listarProductos(){
        $link = conectar();
        $sql = "SELECT  
                        idProducto,
                        prdNombre, prdPrecio, 
                        p.idMarca, mkNombre,  
                        p.idCategoria, catNombre,
                        prdPresentacion, prdImagen
	              FROM 
						productos p, marcas m, categorias c
                  WHERE 
						p.idMarca = m.idMarca
                    AND p.idCategoria = c.idCategoria";
        $resultado = mysqli_query( $link, $sql )
                        or die( mysqli_error($link) );
        return $resultado;
    }

    
########################## #################
#### subir archivo enviado a directorio productos #####
###########################################

function subirImagen(){
        //imagen predeterminada si no enviaron nada
        $prdImagen = 'noDisponible.jpg';

        // imagen original en MODIFICAR si no enviaron nada
        if( isset( $_POST['prdImagenOriginal'] ) ){
            $prdImagen = $_POST['prdImagenOriginal'];
        }

        // si enviaron algo tanto en agregar como en modificar
        if( $_FILES['prdImagen']['error'] == 0 ){
            $dir = 'productos/';
            $tmp = $_FILES['prdImagen']['tmp_name'];
            $prdImagen = $_FILES['prdImagen']['name'];
            move_uploaded_file( $tmp, $dir.$prdImagen );
        }
        return $prdImagen;
    }

function agregarProducto(){
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdPresentacion = $_POST['prdPresentacion'];
        $prdStock = $_POST['prdStock'];
        $prdImagen = subirImagen();

        $link = conectar();
        $sql = "INSERT INTO productos
                    VALUES 
                        (
                        DEFAULT,
                        '".$prdNombre."',  
                        ".$prdPrecio.",
                        ".$idMarca.",
                        ".$idCategoria.",
                        '".$prdPresentacion."',
                        ".$prdStock.",
                        '".$prdImagen."'
                        )";

        $resultado = mysqli_query( $link, $sql )
                            or die(mysqli_error($link));
        return $resultado;
    }

    /**
     * @return array Array Asociativo con datos de un producto
     */
function verProductoPorID(){
        $idProducto = $_GET['idProducto'];

        $link = conectar();
        $sql = "SELECT  
                        idProducto,
                        prdNombre, prdPrecio, 
                        p.idMarca, mkNombre,  
                        p.idCategoria, catNombre,
                        prdStock,
                        prdPresentacion, prdImagen
	              FROM 
						productos p, marcas m, categorias c
                  WHERE 
						p.idMarca = m.idMarca
                    AND p.idCategoria = c.idCategoria
                    AND idProducto = ".$idProducto;
        $resultado = mysqli_query( $link, $sql )
                        or die( mysqli_error($link) );
        $producto = mysqli_fetch_assoc($resultado);
        return $producto;
    }
function modificarProducto(){
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdPresentacion = $_POST['prdPresentacion'];
        $prdStock = $_POST['prdStock'];
        $prdImagen = subirImagen();
        $idProducto = $_POST['idProducto'];

        $link = conectar();
        $sql = "UPDATE productos
                SET prdNombre =  '".$prdNombre."',
                    prdPrecio = ".$prdPrecio.",
                    idMarca = ".$idMarca.",
                    idCategoria = ".$idCategoria.",
                    prdPresentacion = '".$prdPresentacion."',
                    prdStock = ".$prdStock.",
                    prdImagen =  '".$prdImagen."' 
                WHERE idProducto =".$idProducto;

        $resultado = mysqli_query( $link, $sql )
                        or die(mysqli_error($link));
        return $resultado;
    }

function eliminarProducto(){
        $idProducto = $_POST['idProducto'];

        $link = conectar();
        $sql = "DELETE FROM productos 
                    WHERE idProducto = ".$idProducto;
        $resultado = mysqli_query( $link, $sql )
                            or die(mysqli_error($link));
        return $resultado;
    }
