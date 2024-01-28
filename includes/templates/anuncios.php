<?php 
    // Importar la conexión
    require __DIR__ . '/../config/database.php';
    $db = conectardb();
    // Consultar la BD
    $query = "SELECT * FROM propiedades LIMIT $limite";
    // obtener los resultados
    $resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <div class="anuncio">
                <div class="img-heigth">
                <img class="img-altura" loading="lazy" src="./imagenes/<?php echo $propiedad['imagen']?>" alt="anuncio">
                </div>
                
               
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']?></h3>
                    <?php
                    // Generamos un resumen de la descripción para no sobrecargar el contenedor del anuncio  
                    $resumenDescripcion = substr($propiedad['descripcion'], 0, 90); ?>
                    <p class="descripcion"><?php echo $resumenDescripcion .   "  ..."; ?></p>
                    <p class="precio">$ <?php echo $propiedad['precio']?></p>
                    
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc']?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad['estacionamiento']?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitacion">
                            <p><?php echo $propiedad['habitaciones']?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad['id']?>" class="boton boton-amarillo-block"> Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.anuncio-->

        <?php endwhile; ?>

        </div> <!--.contenedor-anuncios-->

<?php 
    // Cerrar la conexión
    mysqli_close($db);
    
    ?>