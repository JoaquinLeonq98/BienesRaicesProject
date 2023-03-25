<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BienesRaicesProject/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/BienesRaicesProject/index.php">
                    <img class="logo" src="/BienesRaicesProject/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/BienesRaicesProject/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton"src="/BienesRaicesProject/build/img/dark-mode.svg" alt="dark-mode">
                    <nav class="navegacion">
                        <a href="/BienesRaicesProject/nosotros.php">Nosotros</a>
                        <a href="/BienesRaicesProject/anuncios.php">Anuncios</a>
                        <a href="/BienesRaicesProject/blog.php">Blog</a>
                        <a href="/BienesRaicesProject/contacto.php">Contacto</a>
                    </nav>
                </div>
                

            </div>  <!--.barra-->
            <?php  if ($inicio){ ?>
                <h1>Venta de casas y Departamentos exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>