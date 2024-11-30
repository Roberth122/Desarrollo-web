<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Inscríbete en un Curso</h1>
        <form action="process_registration.php" method="POST">
            <!-- Campo de Nombre -->
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" name="name" placeholder="Ingresa tu nombre" required>

            <!-- Campo de Email -->
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>

            <!-- Campo Selección de Curso -->
            <label for="course">Seleccionar Curso:</label>
            <select id="course" name="course" required>
                <option value="">Selecciona un curso</option>
                <?php
                // Conexión a la base de datos y obtención de cursos
                $conn = new mysqli('localhost', 'root', '', 'course_registration');
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }
                $query = "SELECT id, name FROM courses";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                } else {
                    echo "<option value=''>No hay cursos disponibles</option>";
                }
                ?>
            </select>

            <!-- Botón de Enviar -->
            <button type="submit">Inscribirme</button>
        </form>
    </div>
</body>
</html>
