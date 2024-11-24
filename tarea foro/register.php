<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare('INSERT INTO usuarios (username, password) VALUES (:username, :password)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo 'Usuario registrado con éxito. <a href="login.html">Iniciar sesión</a>';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo 'El usuario ya existe.';
        } else {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
