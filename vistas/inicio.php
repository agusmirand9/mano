<?php
$destacados = Producto::obtenerDestacados();
$categorias = Producto::obtenerCategorias();

?>



<section class="hero">
    <div class="hero-contenido">
        <h1>
           Bienvenidos a
            <br>
            <span>Mano a Mano</span>
        </h1>

        <p>Tu tienda de productos materos. <br> <em>Mates, Termos y Accesorios para disfrutar.</em></p>

        <a href="index.php?seccion=tienda" class="btn-hero">Ver Tienda</a>
    </div>

</section>

<div class="banner-imagenes">
    <img src="assets/img/banner/mate1.jpg" alt="Mate argentino">
    <img src="assets/img/banner/mate2.jpg" alt="Retrato del mate">
    <img src="assets/img/banner/mate3.jpg" alt="Oro verde">
</div>


 <section class="seccion">
    <div class="contenedor">

        <h2 class="seccion-titulo">Explorá por Categorias</h2>

        <nav class="categorias-pills" aria-label="Categorías de productos">

            <?php foreach ($categorias as $cat): ?>
                <a href="index.php?seccion=categoria&categoria=<?php echo $cat; ?>" class="pill">
                <?php echo ucfirst($cat); ?>
                </a>
            <?php endforeach; ?>
            

        </nav>
    </div>

</section>

<section class="seccion" style="padding-top:0";>
    <div class="contenedor">
        <h2 class="seccion-titulo">Productos Destacados</h2>

        <div class="productos-grid">

            <?php foreach($destacados as $producto):  ?>
                <article class="card-producto">
                    <img src="<?php echo $producto->getImagenSrc();?>" alt="<?php echo $producto->getNombre();?>">
            
                    <div class="card-cuerpo">

                    <span class="card-categoria"><?php echo $producto->getCategoria();?></span>

                    <h3 class="card-nombre"><?php echo $producto->getNombre(); ?> </h3>

                    <p class="card-precio"><?php echo $producto->getPrecioFormateado(); ?></p>

                    <a href="index.php?seccion=detalle&id=<?php echo $producto->getId(); ?>" class="btn-card">Ver más</a>
                </div>
            
             </article>
            <?php endforeach; ?>
        </div>



    </div>

</section>

<div class="banner-frase">
    <p>"El mate es cultura, es tradición, es encuentro."</p>
</div>



<section class="seccion sobre-seccion">
    <div class="contenedor">

        <div class="sobre-nosotros">
            <div class="sobre-texto">
                <h2 class="seccion-titulo" style="text-align:left;">¿Quiénes somos?</h2>
                <p>
                    <strong>Mano a Mano </strong> nació de una pasión simple y profunda: 
                    <strong>el ritual del mate</strong>. Somos una tienda de productos 
                    materos de calidad, para quienes valoran cada detalle 
                    de su experiencia matera.
                </p>
                <p>
                   Cada 
                    producto de nuestro catálogo fue seleccionado con cuidado para 
                    acompañarte en cada momento del día.
                </p>
                 <div class="sobre-galeria">
                <img src="assets/img/somos/somos1.jpg" alt="Mate y cartas">
                <img src="assets/img/somos/somos2.jpg" alt="Mate en el jardín">
                <img src="assets/img/somos/somos3.jpg" alt="Mate al fuego">
                <img src="assets/img/somos/somos4.jpg" alt="Mate en la playa">
            </div>

            </div>

           

            
        </div>

    </div>
</section>
<div class="franja-stickers">
    <img src="assets/img/stickers/sticker2.jpg" alt="sticker2">
    <img src="assets/img/stickers/sticker.png" alt="sticker">
    <img src="assets/img/stickers/sticker2.jpg" alt="sticker2">
    <img src="assets/img/stickers/sticker.png" alt="sticker">
    <img src="assets/img/stickers/sticker2.jpg" alt="sticker2">
    <img src="assets/img/stickers/sticker.png" alt="sticker">
</div>
