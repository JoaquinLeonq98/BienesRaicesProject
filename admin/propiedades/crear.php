<?php
//Base de Datos
    require '../../includes/config/database.php';
    $db = conectardb();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores"; 
    $resultado = mysqli_query($db, $consulta);


    // Arreglo con mensajes de errores
    $errores = [];
        $titulo = '';
        $precio = '';
        $descripcion = '';
        $habitaciones = '';
        $wc = $_POST['wc'];
        $estacionamiento = '';
        $vendedorId = '';
    // Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
        $precio = mysqli_real_escape_string($db,$_POST['precio']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db,$_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db,$_POST['vendedor']);
        $creado = date('Y/m/d');

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "Debes añadir un precio";
        }

        if(strlen ($descripcion) < 50 ){
            $errores[] = "Debes añadir una descripcion y debe te al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "Debes añadir un numero de habitaciones";
        }

        if(!$wc){
            $errores[] = "Debes añadir un numero de baños";
        }

        if(!$estacionamiento){
            $errores[] = "Debes añadir un numero de estacionamientos";
        }

        if(!$vendedorId){
            $errores[] = "Debes añadir un vendedor";
        }

        // Validar por tamaño (1mb maximo)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }


        // Revisar que el arreglo de errores este vacio

        if(empty($errores)){
          // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

            $resultado = mysqli_query($db, $query);
            if ($resultado) {
            //    Redireccionar al usuario
                header('Location: /BienesRaicesProject/admin/index.php');
            }  

        }

        
    }
    // Incluye un template
    require '../../includes/funciones.php';
    
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <form action="/BienesRaicesProject/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo Propiedad" 
                        value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number"
                       id="precio" 
                       name="precio" 
                       placeholder="Precio Propiedad" 
                       value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>
            <!-- Termina Información General -->

            <fieldset>
                <legend>Información Propiedad</legend>
                    
                    <label for="habitaciones">Habitaciones:</label>
                    <input type="number" 
                            id="habitaciones" 
                            name="habitaciones" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9"
                            value="<?php echo $habitaciones; ?>">
    
                    <label for="wc">Baños:</label>
                    <input type="number" 
                            id="wc" 
                            name="wc" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9" 
                            value="<?php echo $wc; ?>">
    
                    <label for="estacionamiento">Estacionamiento:</label>
                    <input type="number" 
                            id="estacionamiento" 
                            name="estacionamiento" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9"
                            value="<?php echo $estacionamiento; ?>">
            </fieldset>
            <!-- Termina Informacion Propiedad -->

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option 
                            <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> 
                            value="<?php echo $vendedor['id']; ?>">
                            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php  
    incluirTemplate('footer');   
?>
