<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
echo "<a href='logout.php'>Cerrar sesión</a>";
?>