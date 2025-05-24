<?php
include_once 'db.php';
$database = new Database();
$db = $database->getConnection();
$persona = new Persona($db);

$message = "";
$row = null;

// Si es GET y tiene DNI, cargamos la persona
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['dni'])) {
    $persona->dni = $_GET['dni'];
    $result = $persona->read($_GET['dni'], 0, 1);
    $row = $result->fetch_assoc();
}

// Si es POST y enviaron el formulario, actualizamos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $persona->dni = $_POST['dni'];
    $persona->nombres = $_POST['nombres'];
    $persona->apellidopa = $_POST['apellidopa'];
    $persona->apellidoma = $_POST['apellidoma'];

    if ($persona->update()) {
        // Redirigimos para evitar reenvío y mostrar mensaje
        header("Location: index.php?message=updated");
        exit();
    } else {
        $message = "<div class='mt-4 p-2 bg-red-500 text-white rounded'>No se pudo actualizar la persona.</div>";
        // Para mostrar datos en el formulario
        $row = [
            'dni' => $persona->dni,
            'nombres' => $persona->nombres,
            'apellidopa' => $persona->apellidopa,
            'apellidoma' => $persona->apellidoma
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Actualizar Persona</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4 max-w-md">
<h1 class="text-2xl font-bold mb-4">Actualizar Persona</h1>

<?= $message ?>

<?php if ($row): ?>
<form action="update.php" method="post" class="bg-white p-6 rounded shadow-md">
    <input type="hidden" id="dni" name="dni" value="<?= htmlspecialchars($row['dni']) ?>" class="border p-2 w-full mb-4" />
    <label for="nombres" class="block mb-1 font-semibold">Nombres:</label>
    <input type="text" id="nombres" name="nombres" value="<?= htmlspecialchars($row['nombres']) ?>" class="border p-2 w-full mb-4" required />

    <label for="apellidopa" class="block mb-1 font-semibold">Apellido Paterno:</label>
    <input type="text" id="apellidopa" name="apellidopa" value="<?= htmlspecialchars($row['apellidopa']) ?>" class="border p-2 w-full mb-4" required />

    <label for="apellidoma" class="block mb-1 font-semibold">Apellido Materno:</label>
    <input type="text" id="apellidoma" name="apellidoma" value="<?= htmlspecialchars($row['apellidoma']) ?>" class="border p-2 w-full mb-4" required />

    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Actualizar</button>
</form>
<?php else: ?>
<p class="bg-yellow-200 p-3 rounded">No se encontró la persona para actualizar.</p>
<a href="index.php" class="text-blue-600 hover:underline mt-4 inline-block">&laquo; Volver al listado</a>
<?php endif; ?>

</div>
</body>
</html>
