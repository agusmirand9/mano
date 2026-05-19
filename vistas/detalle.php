<?php
$id = isset($_GET['id'])? (int)$_GET['id'] : 0;

$producto = Producto::buscarPorId($id);

if($producto == null){
    header ('Location: index.php?seccion=404');
    exit;
}

?>

<div class="seccion-header">
    <h1><?php echo $producto->getNombre(); ?></h1>
    <p>Categoría:<?php echo $producto->getCategoria(); ?></p>

</div>

<section class="seccion">
    <div class="contenedor">

        <div class="detalle-grid">
            <div class="detalle-imagen">
                <img src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">

            </div>

            <div class="detalle-info">
                <p class="detalle-categoria"><?php echo ucfirst($producto->getCategoria());?> </p>

                <h1><?php echo $producto->getNombre();?></h1>

                <p class="detalle-descripcion">
                    <?php echo $producto->getDescripcion(); ?>
                </p>

                <p class="detalle-precio">
                    <?php echo $producto->getPrecioFormateado(); ?>
                </p>
                       
                <p class="consulta-texto">¿Te interesa? ¡Consultanos por WhatsApp!</p>
                <div class="botones-whatsapp">
                    <a href="https://wa.link/my3q9t" class="btn-volver btn-whatsapp" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> Agustina</a>
                    <a href="https://wa.link/8sd9vi" class="btn-volver btn-whatsapp" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> Martina</a>
                </div>
                <a href="index.php?seccion=tienda" class="btn-volver">Volver a la tienda</a>
            
            </div>


        </div>

    </div>

</section>
