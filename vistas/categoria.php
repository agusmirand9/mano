<?php 
$categoria = $_GET['categoria'] ?? '';
if (empty($categoria)) {
    header ('Location: index.php?seccion=tienda');
    exit;
}
$productos = Producto::filtrarPorCategoria($categoria);
$nombreCategoria = ucfirst($categoria);
$orden = $_GET['orden'] ?? '';

if ($orden === 'precio_desc') {
    usort($productos, function($a, $b) {
        return $b->getPrecio() <=> $a->getPrecio();
    });
} elseif ($orden === 'precio_asc') {
    usort($productos, function($a, $b) {
        return $a->getPrecio() <=> $b->getPrecio();
    });
}
?>


<div class="seccion-header">
    <h1>Categoría: <?php echo $nombreCategoria;?> </h1>
    <p><?php echo count($productos); ?> Productos encontrados</p>

</div>

<section class="seccion">
    <div class="contenedor">

        <?php if (empty($productos)): ?>
        <div class="mensaje-estado">
            <h2>No hay productos en esta categoría</h2>
            <p>Probá con otra categoría o volve atras.</p>
            <a href="index.php?seccion=tienda" class="btn-volver">Ver toda la tienda</a>
        </div>

        <?php else: ?>

        <div class="categoria-controles">
            <a href="index.php?seccion=categoria&categoria=<?php echo urlencode($categoria); ?>&orden=precio_asc" class="btn-ordenar <?php echo $orden === 'precio_asc' ? 'activo' : ''; ?>">
                ↑ Menor precio
            </a>
            <a href="index.php?seccion=categoria&categoria=<?php echo urlencode($categoria); ?>&orden=precio_desc" class="btn-ordenar <?php echo $orden === 'precio_desc' ? 'activo' : ''; ?>">
                ↓ Mayor precio
            </a>
        </div>

        <div class="productos-grid">
            <?php foreach ($productos as $producto): ?>

            <article class="card-producto">

                <img src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">

                <div class="card-cuerpo">
                    <span class="card-categoria"><?php echo $producto->getCategoria(); ?></span>
                    <h3 class="card-nombre"><?php echo $producto->getNombre(); ?></h3>
                    <p class="card-descripcion"><?php echo $producto->getDescripcion(); ?></p>
                    <p class="card-precio"><?php echo $producto->getPrecioFormateado(); ?></p>


                    <a href="index.php?seccion=detalle&id=<?php echo $producto->getId(); ?>" class="btn-card">Ver detalle</a>

                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<div class="contenedor" style="padding-bottom: 2rem;">
    <a href="index.php?seccion=tienda" class="btn-volver">Volver a la tienda</a>
</div>
