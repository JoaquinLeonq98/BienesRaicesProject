<?php
// Importar conexión
require 'includes/config/database.php';
$db = conectarDB();

// crear un email y un password
$email = 'joaquinleonquero00@gmail.com';
$password = 'leon98';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";
echo $query;

// Agregarlo a la base de datos
mysqli_query($db,$query);