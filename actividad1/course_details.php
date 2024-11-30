<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'course_registration');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del curso de la URL
$course_id = $_GET['course_id'];

// Consultar detalles del curso
$query = "SELECT name, description, start_date, end_date FROM courses WHERE id = $course_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
} else {
    echo "Curso no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Detalles del Curso</h1>
        <h2><?php echo $course['name']; ?></h2>
        <p><strong>Descripción:</strong> <?php echo $course['description']; ?></p>
        <p><strong>Fecha de Inicio:</strong> <?php echo $course['start_date']; ?></p>
        <p><strong>Fecha de Finalización:</strong> <?php echo $course['end_date']; ?></p>
        <a href="index.html" class="button">Volver a Inicio</a>
    </div>
</body>
</html>
