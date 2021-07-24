<?php  
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/autenticar.php';
    autenticar();
    require 'funciones/marcas.php';
    $cantidad = verProductoPorMarca();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

<main class="container">
        <h1>Confirmación de baja de una marca</h1>
<?php
    if( $cantidad > 0 ){
?>
            <div class="alert bg-light border-danger p-4 col-8 mx-auto">
                No se puede eliminar la marca seleccionada, ya que hay productos relacionados.<br>
                <a href="adminMarcas.php" class="btn btn-outline-secondary">Volver a panel</a>
            </div>
<?php
 }else{
    $marca = verMarcaPorID();
?>
            <div class="card border-danger col-6 mx-auto p-4 text-danger">
                Marca a eliminar:
                    <?= $marca['mkNombre'] ?>
                        <form action="eliminarMarca.php" method="post">
                            <input type="hidden" name="idMarca" value="<?= $marca['idMarca'] ?>">
                                <button class="btn btn-danger btn-block my-2">Confirmar baja</button>
                                <a href="adminMarcas.php" class="btn btn-outline-secondary btn-block">Volver a panel</a>
                        </form>
            </div>

<script>
        Swal.fire({
                        title: '¿Desea eliminar la Marca?',
                        text: "Esta accion no se puede deshacer!",
                       type: 'error',
                        showCancelButton: true,
                        cancelButtonColor: '#8fc87a',
                        cancelButtonText: 'No, no lo quiero eliminar',
                        confirmButtonColor: '#d00',
                        confirmButtonText: 'Si, lo quiero eliminar!'
                        }).then((result) => {
                        if (!result.value) {
                         window.location = 'adminMarcas.php'
                        }
                        }); 
</script>
<?php
    }
?>


</main>

<?php
include 'includes/footer.php';
?>