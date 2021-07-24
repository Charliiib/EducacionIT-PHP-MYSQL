<?php  
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $producto = verProductoPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>


 <main class=" container mb-5">

    <div class="  col-10 mx-auto p-1"  >
        <div class=" row">
            <div class="col-8 my-4"  >
                <img src="productos/<?= $producto['prdImagen'] ?>" class="">
            </div>
                <div class="col text-secondary my-5">
                    <h2><?= $producto['prdNombre'] ?></h2> 
                    <hr>
                    Categoria: <?= $producto['catNombre'] ?> <br>
                    Marca: <?= $producto['mkNombre'] ?> <br>
                    Presentación: <?= $producto['prdPresentacion'] ?><br> 
                    <hr>
                    Precio: <span class="lead">$<?= $producto['prdPrecio'] ?></span>

                    <form action="#.php" method="post">
                        <input type="hidden" name="idProducto" value="<?= $producto['idProducto'] ?>">

                        <button class="btn btn-info btn-block my-2">Añadir al carrito</button>
                   </form>

                </div>
                       <a href="index.php" class="btn btn-outline-secondary mx-auto" style="width: 200px;">Volver a panel</a>
        </div>

                    <div class="share mt-3 ">
                        <h5>Compartir Producto:</h5>
                        <ul class="share_nav">
                            <a href="#" class="pr-3"><i class="fab fa-facebook-f  fa-2x"></i></a>
                            <a href="#" class="pr-3"><i class="far fa-envelope  fa-2x"></i></a>
                            <a href="#" class="pr-3"><i class="fab fa-instagram  fa-2x"></i></a>
                            <a href="#" class="pr-3"><i class="fab fa-whatsapp  fa-2x"></i></a>
                        </ul>
                    </div>
					
    </div>

</main>

<?php
include 'includes/footer.php';
?>