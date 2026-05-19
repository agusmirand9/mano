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
                <?php 
                $colores = [
                    'lata-materoblanca.jpg'  => ['color' => '#f0f0f0', 'label' => 'Blanco'],
                    'lata-materogris.jpg'    => ['color' => '#888888', 'label' => 'Gris'],
                    'lata-materorosas.jpg'   => ['color' => '#f4a0b0', 'label' => 'Rosa'],
                    'lata-materoverde.jpg'   => ['color' => '#6abf6a', 'label' => 'Verde'],
                    'lata-materovioleta.jpg' => ['color' => '#9b6abf', 'label' => 'Violeta'],
                    'latas-materonegro.jpg'  => ['color' => '#222222', 'label' => 'Negro'],
                ];
                ?>
                <div class="galeria-colores">
                    <?php foreach ($producto->getImagenes() as $img): 
                        $color = $colores[$img]['color'] ?? '#ccc';
                        $label = $colores[$img]['label'] ?? $img;
                    ?>
                        <div
                            class="color-swatch <?php echo $img === $producto->getImagen() ? 'swatch-activo' : ''; ?>"
                            style="background-color: <?php echo $color; ?>;"
                            data-src="assets/img/productos/<?php echo htmlspecialchars($img); ?>"
                            title="<?php echo $label; ?>"
                            onclick="cambiarColor(this)"
                        ></div>
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
.galeria-colores {
    display: flex;
    gap: 0.5rem;
    margin-top: 0.75rem;
    flex-wrap: wrap;
}

.color-swatch {
    width: 36px;
    height: 36px;
    border-radius: var(--radio);
    border: 2px solid transparent;
    cursor: pointer;
    transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 1px 4px rgba(0,0,0,0.15);
}

.color-swatch:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.swatch-activo {
    border-color: var(--naranja);
    transform: translateY(-2px);
}
</style>

<script>
function cambiarColor(swatch) {
    document.getElementById('imagen-principal').src = swatch.dataset.src;
    document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('swatch-activo'));
    swatch.classList.add('swatch-activo');
}
</script>
