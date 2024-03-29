<?php
//  Validar Url con id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ../index.php');
    }
//Base de Datos
    require '../../includes/config/database.php';
    $db = conectardb();

    // Consulta para los datos de la propiedad
   
    $consulta = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);


    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    // Arreglo con mensajes de errores
    $errores = [];
        $titulo = $propiedad['titulo'];
        $precio = $propiedad['precio'];
        $descripcion = $propiedad['descripcion'];
        $habitaciones = $propiedad['habitaciones'];
        $wc = $propiedad['wc'];
        $estacionamiento = $propiedad['estacionamiento'];
        $vendedorId = $propiedad['vendedorId'];
        $imagenPropiedad = $propiedad['imagen'];

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
    

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];
     

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

        // Validar por tipo y tamaño de archivo (1000kb maximo)

        $medida = 1000 * 1000;

        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }


        // Revisar que el arreglo de errores este vacio

        if(empty($errores)){
            $directorioActual = __DIR__;
            // Crear carpeta
            $carpetaImagenes =  $directorioActual . '/imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            $nombreImagen= '';
            // eliminar la imagen previa
           if($imagen['name']){
               unlink($carpetaImagenes . $propiedad['imagen']);

            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen = $propiedad['imagen'];
        }
        // Insertar en la base de datos
        $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = '$habitaciones', wc = '$wc', estacionamiento = '$estacionamiento', vendedorId = '$vendedorId' WHERE id = $id";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
        //    Redireccionar al usuario
            header('Location: ../../admin/index.php?resultado=2');
        }
        
    }
}
    // Incluye un template
    require '../../includes/funciones.php';
    
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <form class="formulario" method="POST" enctype="multipart/form-data">
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
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="" class="imagen-small">

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

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php
    incluirTemplate('footer');   ?>