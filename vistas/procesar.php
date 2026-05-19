<?php
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$asunto = $_POST['asunto'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

if(empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)){
    header('Location: index.php?seccion=contacto');
    exit;
}
?>

<section class="seccion">
    <div class="contenedor">
        <div class="mensaje-estado">
            <h1>¡Mensaje enviado!</h1>
            <p>Gracias por escribirnos <strong><?php echo $nombre; ?></strong>. Nos pondremos en contacto lo mas rapido posible.</p>
            
        </div>
    </div>
</section>


<section class="seccion">
    <div class="contenedor">
        <div class="formulario-contacto">
            <h2>Resumen de tu mensaje</h2>

            <div class="form-grupo">
                <label>Nombre</label>
                <input type="text" value="<?php echo $nombre; ?>" disabled>
            </div>

            <div class="form-grupo">
                <label>Correo electrónico</label>
                <input type="text" value="<?php echo $email; ?>" disabled>
            </div>

            <div class="form-grupo">
                <label>Asunto</label>
                <input type="text" value="<?php echo $asunto; ?>" disabled>
            </div>

            <div class="form-grupo">
                <label>Mensaje</label>
                <textarea disabled><?php echo $mensaje; ?></textarea>
            </div>

            <a href="index.php?seccion=inicio" class="btn-enviar" style="display:block; text-align:center;">
                Volver al inicio
            </a>
        </div>
    </div>
</section>