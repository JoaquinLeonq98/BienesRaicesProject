<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="./build/img/Buildings_Skyscrapers_Architecture_2019_HD_Photo_2880x1800.webp" type="image/webp">
                    <source srcset="./build/img/Buildings_Skyscrapers_Architecture_2019_HD_Photo_2880x1800.jpg" type="image/jpeg">
                    <img loading="lazy" src="./build/img/Buildings_Skyscrapers_Architecture_2019_HD_Photo_2880x1800.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, sed! Laboriosam asperiores, aliquam totam dignissimos dolorum nihil facilis qui quam ipsam repellendus, repellat vero sed dolore. Corporis aliquid atque quasi sapiente ipsam repudiandae beatae eum! Porro, cumque! Architecto blanditiis distinctio, eveniet inventore quia ea quisquam temporibus rem. Deleniti doloremque odit unde possimus quia voluptates similique rerum facere temporibus delectus illum, corrupti provident at repudiandae necessitatibus nostrum ratione ipsum mollitia soluta. Iure iusto ea suscipit sequi temporibus, reprehenderit, animi laborum et recusandae ullam vero non cumque impedit officia voluptatum quaerat optio officiis repellat? Molestias doloremque nisi cumque? Ducimus rerum qui enim.</P>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero incidunt sed, non dignissimos aspernatur consequuntur laudantium adipisci neque eveniet mollitia fugiat laboriosam qui fugit! Voluptatibus culpa in explicabo esse porro, quidem alias molestiae tempora, totam error, quia non. Ipsa doloremque consectetur aspernatur corrupti laboriosam facilis voluptatum tempora, rem et ab.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>
        
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
            </div>
        </div>
   
    </section>
<?php  
    incluirTemplate('footer');   
?>
