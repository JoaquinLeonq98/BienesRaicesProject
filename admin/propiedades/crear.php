<?php
//Base de Datos
    require '../../includes/config/database.php';
    $db = conectardb();

    var_dump($db);
    require '../../includes/funciones.php';
    
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde"> Volver</a>
        <form action="" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion"></textarea>
            </fieldset>
            <!-- Termina Información General -->

            <fieldset>
                <legend>Información Propiedad</legend>
                    
                    <label for="habitaciones">Habitaciones:</label>
                    <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9">
    
                    <label for="wc">Baños:</label>
                    <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9">
    
                    <label for="estacionamiento">Estacionamiento:</label>
                    <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>
            <!-- Termina Informacion Propiedad -->

            <fieldset>
                <legend>Vendedor</legend>
                <select name="" id="">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="1">Juan</option>
                    <option value="2">Karen</option>
                    <option value="3">Alejandro</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php  
    incluirTemplate('footer');   
?>