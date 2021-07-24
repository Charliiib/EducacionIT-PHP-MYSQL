<?php  
        require 'config/config.php';
        require 'funciones/conexion.php';
        require 'funciones/productos.php';
        $productos = listarProductos();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

<main class="container mb-5">
        <h1>Catálogo de productos</h1>
        <section class="row">
<?php
        while ( $producto = mysqli_fetch_assoc($productos) ){
?>
            <div class="card col-lg-3 col-md-6 col-sm-12 ml-5 mb-5 mt-5 text-center">
                <img src="productos/<?= $producto['prdImagen'] ?>" class="card-img-top">
                <hr>
                    <h2><?= $producto['prdNombre'] ?></h2>
                        <?= $producto['catNombre'] ?> - <?= $producto['mkNombre'] ?> 
                        <br>
                        $<?= $producto['prdPrecio'] ?>
                <a href="detalles.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-info mb-1">Ver detalle</a>
            </div>
<?php
}
?>
        </section>
</main>

<?php
include 'includes/footer.php';
?>
