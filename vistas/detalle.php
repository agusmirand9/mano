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
                <img id="imagen-principal" src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">

                <?php if ($producto->tieneGaleria()): ?>
                <div class="galeria-miniaturas">
                    <?php foreach ($producto->getImagenes() as $img): ?>
                        <img 
                            src="assets/img/productos/<?php echo $img; ?>" 
                            alt="<?php echo $producto->getNombre(); ?>"
                            class="miniatura <?php echo $img === $producto->getImagen() ? 'miniatura-activa' : ''; ?>"
                            onclick="cambiarImagen(this)"
                        >
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
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

<style>
.galeria-miniaturas {
    display: flex;
    gap: 0.5rem;
    margin-top: 0.75rem;
    flex-wrap: wrap;
}

.miniatura {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: var(--radio);
    border: 2px solid transparent;
    cursor: pointer;
    transition: border-color 0.2s, transform 0.2s;
    opacity: 0.75;
}

.miniatura:hover {
    opacity: 1;
    transform: translateY(-2px);
}

.miniatura-activa {
    border-color: var(--naranja);
    opacity: 1;
}
</style>

<script>
function cambiarImagen(miniatura) {
    document.getElementById('imagen-principal').src = miniatura.src;
    document.querySelectorAll('.miniatura').forEach(m => m.classList.remove('miniatura-activa'));
    miniatura.classList.add('miniatura-activa');
}
</script>
