<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'course_registration');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$course_id = $_POST['course'];

// Verificar si el estudiante ya existe
$result = $conn->query("SELECT id FROM students WHERE email = '$email'");
if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    $student_id = $student['id'];
} else {
    // Insertar nuevo estudiante
    $conn->query("INSERT INTO students (name, email) VALUES ('$name', '$email')");
    $student_id = $conn->insert_id;
}

// Registrar inscripción
$conn->query("INSERT INTO enrollments (course_id, student_id) VALUES ('$course_id', '$student_id')");

// Redirigir a la página de detalles del curso
header("Location: course_details.php?course_id=$course_id");
exit();
?>
