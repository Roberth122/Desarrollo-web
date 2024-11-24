<?php
// config.php
$host = 'localhost';
$dbname = 'sistema_login';
$username = 'root'; // Cambiar si tienes una contraseña para tu MySQL
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>