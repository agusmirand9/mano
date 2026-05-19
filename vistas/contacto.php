<div class="seccion-header">
    <h1>Contacto</h1>
    <p>Dejá tu consulta y nos pondremos en contacto lo más rápido posible!</p>
</div>

<section class="seccion">
    <div class="contenedor">

        <div class="contacto-grid">

            <div class="contacto-info">
                <h2>¿Cómo encontrarnos?</h2>

                <div class="info-item">
                    <div>
                        <strong>Dirección</strong>
                        <p>Av. del Libertador 1234, Buenos Aires</p>
                    </div>
                </div>

                <div class="info-item">
                    <div>
                        <strong>Email</strong>
                        <p>contacto@campomate.com.ar</p>
                    </div>
                </div>

                <div class="info-item">
                    <div>
                        <strong>Teléfono</strong>
                        <p>+54 11 4567-8901</p>
                    </div>
                </div>

                <div class="info-item">
                    <div>
                        <strong>Horario</strong>
                        <p>Lunes a Viernes de 9:00 a 18:00hs</p>
                    </div>
                </div>

                <div class="info-item">
                    <div>
                        <strong>Redes sociales</strong>
                        <p>@campomate.ar</p>
                    </div>
                </div>
            </div>

            <div class="formulario-contacto">
                <h2>Manda tu consulta</h2>

                <form action="index.php?seccion=procesar" method="POST">

                    <div class="form-grupo">
                        <label for="nombre">Nombre completo</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Ej: María González"
                            required
                        >
                    </div>

                    <div class="form-grupo">
                        <label for="email">Correo electrónico</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Ej: maria@gmail.com"
                            required
                        >
                    </div>

                    <div class="form-grupo">
                        <label for="asunto">Asunto</label>
                        <select id="asunto" name="asunto">
                            <option value="consulta">Consulta general</option>
                            <option value="pedido">Seguimiento de pedido</option>
                            <option value="producto">Consulta sobre producto</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div class="form-grupo">
                        <label for="mensaje">Mensaje</label>
                        <textarea
                            id="mensaje"
                            name="mensaje"
                            placeholder="Escribí tu consulta"
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="btn-enviar">Enviar mensaje</button>

                </form>
            </div>

        </div>

    </div>
</section>