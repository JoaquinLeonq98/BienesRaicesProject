<?php
require 'includes/config/database.php';
$db = conectarDB();
// autenticar usuario
$errores = [];


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo"<pre>";
    var_dump($_POST);
    echo"</pre>";

    $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']) ;

    if(!$email){
        $errores[] = "El email es obligatorio o no es valido";
    }
    if(!$password){
        $errores[] = "El password es obligatorio";
    }

    if(empty($errores)){
        // revisar si el usuario existe
    }
}

// Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <?php foreach($errores as $error): ?>
        <p class="alerta error"><?php echo $error;?></p>
        <?php endforeach;?>


        <form class="formulario" action="login.php" method="POST">
        <fieldset>
                <legend>Email y Password</legend>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" require>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" require>
            </fieldset>
            <input type="submit" value="Inciar Sesion" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>