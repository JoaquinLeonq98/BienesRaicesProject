<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa Frente al Bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio"> $3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                    <p>2</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum enim praesentium impedit ab aliquam qui nulla laboriosam tempora mollitia voluptatem voluptas consectetur dolorum optio dolor quas cupiditate animi, quod est voluptate laborum dolore illum reiciendis. Doloribus reprehenderit quia est aliquam quo. Esse iste non officia fugiat. Tempora voluptas adipisci natus? Tenetur quos iusto voluptates error consequatur doloribus in fuga quisquam deserunt. Ipsa sapiente, eveniet odio aliquam accusamus quis corrupti fugit sequi, quos illo laudantium iusto provident ad culpa. Praesentium, veniam? Maxime maiores repellat ullam dolores error modi quia corrupti? Repudiandae modi, neque animi totam eos assumenda vel minus asperiores est quidem, recusandae, pariatur reprehenderit quia esse expedita voluptatem dolor sint. Accusantium, molestias tempore molestiae consectetur, culpa placeat ex vero quis eos quia, sunt eligendi doloremque consequatur fugit nam exercitationem. Modi minus voluptatem sit? Doloribus dicta animi ducimus nihil ipsum sed quasi eveniet hic saepe quas, soluta ratione et illum repellendus laborum itaque voluptatem, reiciendis debitis ut labore amet officiis quam porro! Aspernatur eius laudantium eum, consequatur debitis distinctio accusantium animi necessitatibus, beatae illum, error facilis a mollitia id repellat vero facere sit quidem? Cumque facere molestias possimus. Excepturi minus rem, labore earum fuga, nostrum aut maiores, numquam quisquam ullam est.</p>
        </div>
    </main>

<?php  
    incluirTemplate('footer');   
?>